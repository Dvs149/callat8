<?php

namespace App\Http\Controllers\API\v2;

use DB;
use App\User;
use App\dgmodel\Customer;
use Illuminate\Http\Request;
use App\dgmodel\DriverLocation;
use App\DoubleGoogleOrderModel;
use App\dgmodel\DoubleGoogleOrderPhotos;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\API\v2\DriverGetLocationV2RequestController;
use App\Http\Requests\API\v2\DriverOrderStatusV2RequestController;

class DriverV2Controller extends Controller
{
    use ConsumesExternalServices;

    public function driverOrderStatusV2(DriverOrderStatusV2RequestController $request)
    {
        DB::beginTransaction();
        try{
            $order = DoubleGoogleOrderModel::where('id', $request->get('order_id'))->first();

            if($request->order_status=='Out for delivery'){
                $orderPhotos = new DoubleGoogleOrderPhotos;
                $orderPhotos->double_google_order_id = $order->id;
                //store the image if requested
                if (request()->hasFile('pickup_location_photo')) {
                    //check wether image is stored or not, if stored then removed old image
                    /* if (!empty($driver_details->pickup_location_photo)) {
                        $file = $driver_details->pickup_location_photo;
                        @unlink(config('custom.PICKUP_MATERIAL_IMAGE_PATH') . $file);
                    } */
                    $file = request()->file('pickup_location_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.PICKUP_LOCATION_IMAGE_PATH'), $fileName);
                    $orderPhotos->pickup_location_photo = $fileName;
                }
        
                //store the image if requested
                if (request()->hasFile('pickup_material_photo')) {
                    $file = request()->file('pickup_material_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.PICKUP_MATERIAL_IMAGE_PATH'), $fileName);
                    $orderPhotos->pickup_material_photo = $fileName;
                }
        
                //store the image if requested
                if (request()->hasFile('pickup_challan_photo')) {
                    $file = request()->file('pickup_challan_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.PICKUP_CHALAN_IMAGE_PATH'), $fileName);
                    $orderPhotos->pickup_challan_photo = $fileName;
                }
                $data = [
                'pickup_location_photo' => $orderPhotos->pickup_location_photo ? $orderPhotos->pickup_location_photo : null,
                'pickup_material_photo' => $orderPhotos->pickup_material_photo ? $orderPhotos->pickup_material_photo : null,
                'pickup_challan_photo' => $orderPhotos->pickup_challan_photo ? $orderPhotos->pickup_challan_photo : null,
                ];
                $order_status = 'Out for delivery';
            } else if($request->order_status=='Delivered'){
                // $orderPhotos = DoubleGoogleOrderPhotos::where('double_google_order_id',$request->get('order_id'))->first();
                $orderPhotos = new DoubleGoogleOrderPhotos;
                //store the image if requested
                if (request()->hasFile('delivered_location_photo')) {
                    $file = request()->file('delivered_location_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.DELEIVERED_LOCATION_IMAGE_PATH'), $fileName);
                    $orderPhotos->delivered_location_photo = $fileName;
                }
                //store the image if requested
                if (request()->hasFile('delivered_material_photo')) {
                    $file = request()->file('delivered_material_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.DELEIVERED_MATERIAL_IMAGE_PATH'), $fileName);
                    $orderPhotos->delivered_material_photo = $fileName;
                }
                //store the image if requested
                if (request()->hasFile('delivered_challan_photo')) {

                    $file = request()->file('delivered_challan_photo');
                    $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                    $file->move(config('custom.DELEIVERED_CHALAN_IMAGE_PATH'), $fileName);
                    $orderPhotos->delivered_challan_photo = $fileName;
                }
                $data = [
                    'delivered_location_photo' => $orderPhotos->delivered_location_photo ? $orderPhotos->delivered_location_photo : null,
                    'delivered_material_photo' => $orderPhotos->delivered_material_photo ? $orderPhotos->delivered_material_photo : null,
                    'delivered_challan_photo' => $orderPhotos->delivered_challan_photo ? $orderPhotos->delivered_challan_photo : null,
                ];
                $order_status = 'Delivered';
            }

            $order->order_status = $request->order_status;
            $order_photos = DoubleGoogleOrderPhotos::updateOrCreate(
                ['double_google_order_id' => $request->get('order_id')],
                $data
            );
            // $orderPhotos->save();
            $order->save();

            // log for order entry starts here
            $orderTrackingLog_body['order_id'] = $order->id;
            $orderTrackingLog_body['order_status'] = $order->order_status;
            // $orderTrackingLog_body['created_at'] = $order->created_at;
            $orderTrackingLog_body['driver_id'] = $request->get('driver_id',null);
            $orderTrackingLog_body['created_on'] = 'App';

            $log_response = $this->orderTrackingLog($orderTrackingLog_body);
            
			// log for order entry ends here 
            DB::commit();
            $admin_email= User::where('id',1)->first();
            $customer =Customer::where('id',$order->user_id)->first();
            
            if( $order_status == 'Out for delivery'){
                $register_user = 'Your order:' . $order->order_number .',\nIs out for delivery.\n Thanks\n Callat7';
                $message = urlencode($register_user);
                $output = $this->send_sms($customer->sender_mobile, $message);

                $admin_message = 'Dear Admin,\nOrder:'.$order->order_number.'.\nIs out for delivery.\nKindly acknowledge.\nThanks\nCall at 7\n';
                $message = urlencode($admin_message);
                $output = $this->send_sms($admin_email->mobile, $message);
            } else if( $order_status == 'Delivered'){
                $register_user = 'Your order:' . $order->order_number .',\nIs Delivered.\n Thanks\n Callat7';
                $message = urlencode($register_user);
                $output = $this->send_sms($customer->sender_mobile, $message);

                $admin_message = 'Dear Admin,\nOrder:'.$order->order_number.'.\nIs delivered.\nKindly acknowledge.\nThanks\nCall at 7\n';
                $message = urlencode($admin_message);
                $output = $this->send_sms($admin_email->mobile, $message);
            }
            return $this->successJson('Order status updated successfully.', [
                'order' => 'Updated successfully',
                ]);
                
        } catch( Exception $e ) {
			DB::rollback();
			return $this->errorJson( $e->getMessage() );
		} 
    }

    public function driverGetLocation(DriverGetLocationV2RequestController $request)
    {
        $driver_location = DriverLocation::where('driver_id',$request->get('driver_id'))
                                            ->where('double_google_order_id',$request->get('order_id'))->get();
        return $this->successJson('Driver location fetch successfully.', [
            'driver_location' => $driver_location,
            ]);
    }
    
}
