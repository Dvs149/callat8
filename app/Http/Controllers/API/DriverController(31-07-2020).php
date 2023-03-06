<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\dgmodel\Driver;
use Illuminate\Http\Request;
use App\DoubleGoogleOrderModel;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\DriverControllerlerRequest;
use App\Http\Requests\DriverOrderStatusControllerRequest;

class DriverController extends Controller
{
    use ConsumesExternalServices;
    public function driver_register(DriverControllerlerRequest $request)
    {
        $current_time = Carbon::now();
        $mobile = $request->get('mobile_number','');
        $driver_data = Driver::where('phone',$mobile)->first();
        $otp = mt_rand(100000,999999);
        if( empty($driver_data) ){
            // if driver is new then create new driver
            $driver_data = Driver::create([
                        'phone' => $mobile,
                        'otp' => $otp,
                        'otp_expire_time' => $current_time->isoFormat('Y-MM-DD HH:mm:ss'),
                    ]);
            $driver_data->save();
        } else if( Carbon::parse($driver_data->otp_expire_time)->diffInMinutes( $current_time->isoFormat('Y-MM-DD HH:mm:ss')) > config('custom.OTP_5')){
                    // if otp field is expired then create new otp
                    $driver_data->otp = $otp;
                    $driver_data->otp_expire_time = $current_time->isoFormat('Y-MM-DD HH:mm:ss');
                    $driver_data->save();
        } 

        if($driver_data->status == "Y"){
            $register_user='Thank you for login with Callat7.\nWhile login use your registered mobile number as username. Your OTP is: '.$driver_data->otp.'.\n Thanks\n Callat7';
            $message = urlencode($register_user);
            $output = $this->send_sms($driver_data->phone,$message);
    
            return $this->successJson('OTP send successfully.',[
                'OTP' => $driver_data->otp,
                'driver_details' => [$driver_data],
            ]);
        } else {
            unset($driver_data->otp);
            $register_user='You won\'t be able to login to Call at 7 delivery app as your account is currently inactive. Please contact support';
            $message = urlencode($register_user);
            $output = $this->send_sms($driver_data->phone,$message);
    
            return $this->successJson('Driver OTP failed.',[
                'driver_details' => [$driver_data],
            ]);
        }
        
    }

    public function driverOrderList(DriverControllerlerRequest $request)
    {
        // $driver_data = Driver::select('*')->where('id',$request->get('driver_id'))->first();
        $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->where('driver_id',$request->get('driver_id'))/* ->where('order_type','Pick up') */;
        
        return $this->successJson('Sending item list created successfully.',[
            'driver_order_list' => $doubleGoogleOrderData->get()->toArray(),
        ]);
    }

    public function driverOrderStatus(DriverOrderStatusControllerRequest $request)
    {
        $orderlist = DoubleGoogleOrderModel::where('id',$request->get('order_id'))->first();
        $orderlist->order_status = $request->get('order_status');
        $orderlist->save();
        // dd($orderlist->order_status,$orderlist->id);

        $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with(['driver'])->where('id',$orderlist->id)->first();
        return $this->successJson('Order status updated successfully.',[
            'order' => $doubleGoogleOrderData,
        ]);

    }

    public function orderStatusList()
    {
        // dd('d');
        return $this->successJson('Order status fetch successfully.',[
            'order_status' => ['Pending','Completed','Canceled','Out for delivery','Delivered','Deleted','Return'],
        ]);
    }

    
}
