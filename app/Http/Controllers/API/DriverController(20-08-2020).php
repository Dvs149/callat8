<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\dgmodel\Driver;
use Illuminate\Http\Request;
use App\dgmodel\DriverLocation;
use App\DoubleGoogleOrderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\DriverControllerlerRequest;
use App\Http\Requests\DriverOrderListControllerRequest;
use App\Http\Requests\DriverOrderStatusControllerRequest;
use App\Http\Requests\API\v1\driver\DriverUpdateProfileControllerRequest;
use App\Http\Requests\API\v1\driver\UploadPassportPhotoControllerRequest;
use App\Http\Requests\API\v1\driver\SubmitDriverLocationControllerRequest;

class DriverController extends Controller
{
    use ConsumesExternalServices;
    public function driver_register(DriverControllerlerRequest $request)
    {
        $current_time = Carbon::now();
        $mobile = $request->get('mobile_number', '');
        $driver_data = Driver::where('phone', $mobile)->first();
        $otp = mt_rand(100000, 999999);
        if (empty($driver_data)) {
            // if driver is not registered in callat7 then it will not allow him to login
            return $this->successJson('Driver not registered.', [
                'driver_details' => [],
            ]);
        } else if (Carbon::parse($driver_data->otp_expire_time)->diffInMinutes($current_time->isoFormat('Y-MM-DD HH:mm:ss')) > config('custom.OTP_5')) {
            // if otp field is expired then create new otp
            $driver_data->otp = $otp;
            $driver_data->otp_expire_time = $current_time->isoFormat('Y-MM-DD HH:mm:ss');
            $driver_data->save();
        }

        if ($driver_data->status == "Y") {
            // if driver is active then send sms or else dont send sms
            $register_user = 'Thank you for login with Callat7.\nWhile login use your registered mobile number as username. Your OTP is: ' . $driver_data->otp . '.\n Thanks\n Callat7';
            $message = urlencode($register_user);
            $output = $this->send_sms($driver_data->phone, $message);

            return $this->successJson('OTP send successfully.', [
                'OTP' => $driver_data->otp,
                'driver_details' => [$driver_data],
            ]);
        } else {
            unset($driver_data->otp);
            $register_user = 'You won\'t be able to login to Call at 7 delivery app as your account is currently inactive. Please contact support';
            $message = urlencode($register_user);
            $output = $this->send_sms($driver_data->phone, $message);

            return $this->successJson('Driver OTP failed.', [
                'driver_details' => [$driver_data],
            ]);
        }
    }

    public function driverOrderList(DriverOrderListControllerRequest $request)
    {
        $doubleGoogleOrderData_active       = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with('customer')->where('driver_id', $request->get('driver_id'))->whereNotIn('order_status', ['Completed', 'Delivered', 'Deleted']);
        $doubleGoogleOrderData_completed    = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with('customer')->where('driver_id', $request->get('driver_id'))->whereIn('order_status', ['Completed', 'Delivered']);
        return $this->successJson('Sending item list created successfully.', [
            'list_active' => $doubleGoogleOrderData_active->orderBy('id', 'DESC')->get()->toArray(),
            'list_completed' => $doubleGoogleOrderData_completed->orderBy('id', 'DESC')->get()->toArray(),
        ]);
    }

    public function driverLast7DayOrderList(DriverOrderListControllerRequest $request)
    {
        $doubleGoogleOrderData_active       = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with('customer')->where('driver_id', $request->get('driver_id'))->where('created_at','>=',Carbon::now()->subdays(6))->whereNotIn('order_status', ['Completed', 'Delivered', 'Deleted']);
        $doubleGoogleOrderData_completed    = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with('customer')->where('driver_id', $request->get('driver_id'))->where('created_at','>=',Carbon::now()->subdays(6))->whereIn('order_status', ['Completed', 'Delivered']);
        return $this->successJson('Sending item list created successfully.', [
            'list_active' => $doubleGoogleOrderData_active->orderBy('id', 'DESC')->get()->toArray(),
            'list_completed' => $doubleGoogleOrderData_completed->orderBy('id', 'DESC')->get()->toArray(),
        ]);
    }

    public function driverOrderStatus(DriverOrderStatusControllerRequest $request)
    {
        $orderlist = DoubleGoogleOrderModel::where('id', $request->get('order_id'))->first();
        $orderlist->order_status = $request->get('order_status');
        $orderlist->save();

        $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with(['driver'])->where('id', $orderlist->id)->first();
        return $this->successJson('Order status updated successfully.', [
            'order' => $doubleGoogleOrderData,
        ]);
    }

    public function orderStatusList()
    {
        return $this->successJson('Order status fetch successfully.', [
            'order_status' => ['Pending', 'Completed', 'Canceled', 'Out for delivery', 'Delivered', 'Deleted', 'Return'],
        ]);
    }
    // public function driverProfileUpdate(Request $request)
    public function driverProfileUpdate(DriverUpdateProfileControllerRequest $request)
    {
        $driver_details = Driver::where('id', $request->get('driver_id', ''))->first();
        $driver_details->name = $request->get('name', '');
        $driver_details->address1 = $request->get('address1');
        $driver_details->address2 = $request->get('address2', null);
        $driver_details->address3 = $request->get('address3', null);
        $driver_details->email = $request->get('email', '');
        $driver_details->postcode = $request->get('postcode', '');


        $driver_details->save();

        return $this->successJson('Profile has been updated successfully', [
            'driver_details' => $driver_details,
        ]);
    }

    public function uploadPassportPhoto(UploadPassportPhotoControllerRequest $request)
    {
        $driver_details = Driver::where('id', $request->get('driver_id', ''))->first();
        //store the image if requested
        if (request()->hasFile('passport_photo')) {
            //check wether image is stored or not, if stored then removed old image
            if (!empty($driver_details->passport_photo)) {
                $file = $driver_details->passport_photo;
                @unlink(config('custom.PASSPORT_PATH') . $file);
            }
            $file = request()->file('passport_photo');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move(config('custom.PASSPORT_PATH'), $fileName);
            $driver_details->passport_photo = $fileName;
        }
        $driver_details->save();

        return $this->successJson('Profile photo update successfully.', [
            'image_url' => $driver_details->passport_photo_url,
        ]);
    }

    public function submitDriverLocation(SubmitDriverLocationControllerRequest $request)
    {
        // dd($request->all());

        DB::beginTransaction();
        try {
            $driver_location = DriverLocation::updateOrCreate([
                'driver_id' => $request->get('driver_id'),
                'double_google_order_id' => $request->get('order_id'),
            ], [
                'driver_lat' => $request->get('driver_lat'),
                'driver_long' => $request->get('driver_long'),
            ]);

            DB::commit();
            return $this->successJson('Driver Location set successfully.', []);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }
}
