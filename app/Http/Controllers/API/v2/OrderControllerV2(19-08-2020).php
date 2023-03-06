<?php

namespace App\Http\Controllers\API\v2;

use DB;
// use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\User;
use App\dgmodel\Store;
use App\Mail\SendMail;
use App\dgmodel\Driver;
use App\OrderTypeModel;
use App\PromoCodeModel;
use App\dgmodel\Customer;
use App\SendingItemModel;
use App\UserDeviceDetail;
use App\OrderAddressModel;
use App\dgmodel\EmailModel;
use App\Mail\OrderSaveMail;
use Illuminate\Http\Request;
use App\DoubleGoogleOrderModel;
use App\Mail\AdminOrderSaveMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\dgmodel\DoubleGoogleOrderItems;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\OrderControllerRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\DeleteOrderControllerRequest;
use App\Http\Requests\OrderAddressListControllerRequest;
use App\Http\Requests\MobileNumberValidationControllerRequest;
use App\Http\Requests\API\v1\order\OrderDriverDetailsControllerRequest;

class OrderControllerV2 extends Controller
{
    use AuthenticatesUsers,ConsumesExternalServices;

    protected $redirectTo = '/home';

   	public function __construct() {
        $this->middleware('guest')->except('logout');
    }


    public function saveV2( OrderControllerRequest $request ) {
		// dd($request->all());
	    DB::beginTransaction();
    	try {
    		$returnPromoCode = PromoCodeModel::where('code',$request->get('promo_code'))->first();
	    	$returnOrderType = OrderTypeModel::where('id',$request->get('order_type_id'))->first();
	    	$returnSendingItem = SendingItemModel::where('id',$request->get('sending_item_id'))->first();
			
			// $password = mt_rand(10000000,99999999);
			$otp = mt_rand(100000,999999);

			$customer_available_flag=Customer::where('sender_mobile',$request->get('pickup_phone'))->first();
			if(!$customer_available_flag){
				$customer_available=0;
			}
			else{
				$customer_available=1;
			}

			if($request->get('order_type')=="Store" && $request->get('user_id')==null ){
				$store_data = Store::where('id',$request->get('store_id'))->first();
				$sender_name = $store_data->name;

				// $cust_phone=$request->get('pickup_phone',null);
				foreach( $request->get('delivery') as $key => $value ) {
					$cust_name=$value['delivery_receiver_name'];
					$cust_phone=$value['delivery_phone'];
				}
				$cust_address=$request->get('delivery_address',null);

			} else if($request->get('order_type')=="Anything else" && $request->get('user_id')==null ){
				$sender_name = $request->get('sender_name',null);
				foreach( $request->get('delivery') as $key => $value ) {
					$cust_name=$value['delivery_receiver_name'];
					$cust_phone=$value['delivery_phone'];
				}
				$cust_address=$request->get('delivery_address',null);
			} else if($request->get('order_type')=="Pick up" && $request->get('user_id')==null ) {
				$cust_name = $request->get('sender_name',null);
				$cust_phone=$request->get('pickup_phone',null);
				$cust_address=$request->get('pickup_address','');
			}

			if($request->get('user_id')!=null){

				$customer=Customer::where('id',$request->get('user_id'))->first();
				

			} else {
					if($cust_phone){
						$newUser = Customer::where('sender_mobile',$cust_phone)->first() ? 'no' : 'yes';
					}
				$customer = Customer::firstOrCreate([
					'sender_mobile' => $cust_phone,
				],[
					'sender_name' =>  $cust_name,
					'sender_address_1' => $cust_address,
					// 'sender_mobile' => $cust_phone,
					// 'password' => null,
					/* 'device_id' => $request->get('device_id'),
					'fcm_key' => $request->get('fcm_key'),
					'device_type' => $request->get('device_type'),
					'device_version' => $request->get('device_version'), */
				]);

				$device_detail = UserDeviceDetail::updateOrCreate([
                    'user_id' => $customer->id,
                ],[
                    'user_id' => $customer->id,
                    'mobile_number' => $cust_phone,
                    'device_id' => $request->get('device_id',''),
                    'fcm_key' => $request->get('fcm_key',''),
                    'device_type' => $request->get('device_type',''),
                    'device_version' => $request->get('device_version',''),
                    'manfacturer' => $request->get('manfacturer',''),
                    'created_by' => $customer->id,
                    'updated_by' => $customer->id,
                ]);
			}


			

	    	$returnDoubleGoogleOrder = DoubleGoogleOrderModel::updateOrCreate([
	    		'id' => $request->get('order_id'),
	    	],[
				
				'promo_code_id' => !empty($returnPromoCode) ? $returnPromoCode->id : null,
	    		'promo_code' => !empty($returnPromoCode) ? $returnPromoCode->code : '',
				'promo_code_value' => $request->get('promo_code_value',null),
				'order_type_id' => !empty($returnOrderType) ? $returnOrderType->id : null,
				'order_type_name' => !empty($returnOrderType) ? $returnOrderType->name : '',
				'sending_item_id' => !empty($returnSendingItem) ? $returnSendingItem->id : null,
	    		'sending_item_name' => !empty($returnSendingItem) ? $returnSendingItem->name : $request->get('sending_item_name',''),
				'parcel_value' => $request->get('parcel_value'),
				'notify_me_by_sms' => $request->get('notify_me_by_sms','No'),
				'notify_recipients_by_sms' => $request->get('notify_recipients_by_sms','No'),
				'payment_type' => $request->get('payment_type'),
				'is_delivery_free' => $request->get('is_delivery_free','No'),
				'delivery_fee' => $request->get('delivery_fee'),
				'order_status' => $request->get('order_status','pending'),
				'flag' => $request->get('order_status')=='completed'? '0' : 1,
				'order_status_reason' => $request->get('order_status_reason'),
				'order_type' => $request->get('order_type',''),
				'user_id' => $customer->id,
				'store_id' => $request->get('store_id',null),
                'created_by' => 1,
                'updated_by' => 1,
	    	]);
				
	    	if( $returnDoubleGoogleOrder ) {

	    		OrderAddressModel::where('double_google_order_id',$returnDoubleGoogleOrder->id)->delete();

	    		foreach( $request->get('delivery') as $key => $value ) {
	    			$returnOrderAddress = OrderAddressModel::create([
						'sender_name' => $request->get('sender_name',null),
		    			'pickup_address' => $request->get('pickup_address',null),
						'pickup_phone' => $request->get('pickup_phone',null),
						'pickup_date' => date('Y-m-d',strtotime($request->get('pickup_date',null))),
						'pickup_time' => date('H:i:s',strtotime($request->get('pickup_time',null))),
						'pickup_distance' => isset($value['pickup_distance']) ? $value['pickup_distance'] : '0.00',
						'delivery_receiver_name' => isset($value['delivery_receiver_name']) ? $value['delivery_receiver_name'] : null,
						'pickup_comment' => $request->get('pickup_comment',null),
						'pickup_lat'=> $request->get('pickup_lat','0.00'),
						'pickup_long'=> $request->get('pickup_long','0.00'),
						'delivery_address' => isset($value['delivery_address']) ? $value['delivery_address'] : null,
						'delivery_phone' => isset($value['delivery_phone']) ? $value['delivery_phone'] : null,
						'delivery_date' => isset($value['delivery_date']) ? date('Y-m-d',strtotime($value['delivery_date'])) : null,
						'delivery_time' => isset($value['delivery_time']) ? date('H:i:s',strtotime($value['delivery_time'])) : null,
                        'delivery_distance' => isset($value['delivery_distance']) ? $value['delivery_distance'] : '0.00',
						'delivery_comment' => isset($value['delivery_comment']) ? $value['delivery_comment'] : null,
						'delivery_lat'=> isset($value['delivery_lat']) ? $value['delivery_lat'] : '0.00',
						'delivery_long'=> isset($value['delivery_long']) ? $value['delivery_long'] : '0.00',
						'double_google_order_id' => $returnDoubleGoogleOrder->id,
						'payment_status_id' => $request->payment_status_id,
						
                        'created_by' => 1,
						'updated_by' => 1,
						
					]);
				}
				
				if($request->has('item')){

					foreach( $request->get('item') as $key => $value ) {
						$returnDoubleGoogleOrderItem = DoubleGoogleOrderItems::create([
							'item_name' => $value['item_name'],
							'item_quantity' => $value['item_quantity'],
							'double_google_order_id' => $returnDoubleGoogleOrder->id,
						]);
					}
				}

			}
			
			DB::commit();

			$emailModel=EmailModel::select('*')->where('id',3)->first();
			$adminEmailModel=EmailModel::select('*')->where('id',4)->first();
			// dd($adminEmailModel->decription);
	
			$subject = $emailModel->subject;
			$decription = $emailModel->decription;
	
			$admin_subject = $adminEmailModel->subject;
			$admin_decription = $adminEmailModel->decription;
			// dd($admin_decription);
			$details = [
				'subject' => $subject,
				'decription' => $decription,
			];
			$admin_email= User::where('id',1)->first();

			$admin_details = [
				'phone'	=> $admin_email->mobile,
				'email' => $admin_email->email,
				'subject' => $admin_subject,
				'decription' => $admin_decription,
			];

			// dd($returnDoubleGoogleOrder);
			$customer_details=Customer::where('id',$returnDoubleGoogleOrder->user_id)->first();
			$user_name=$customer_details->sender_name;
			$order_number=$returnDoubleGoogleOrder->order_number;
	
			$details['decription'] = str_replace("##USERNAME##",$user_name,$details['decription']);
			$details['decription'] = str_replace("##ORDERNUMBER##",$order_number,$details['decription']);
			
			$admin_details['decription'] = str_replace("##USERNAME##",$user_name,$admin_details['decription']);
			$admin_details['decription'] = str_replace("##ORDERNUMBER##",$order_number,$admin_details['decription']);
			
			// send sms if new user is created
			if($request->get('user_id')==null && $newUser=='yes'){
				$register_user='Thank you for register with Callat7.While login use your registered mobile number as username. Your OTP is: '.$otp.'.\n Thanks\n Callat7';
				$message = urlencode($register_user);
				$output = $this->send_sms($customer->sender_mobile,$message);

				$admin_message='Dear Admin,\nNew user has been registered at Callat7.\nKindly acknowledge.\nThanks\nCall at 7\n';
				$message = urlencode($admin_message);
				$output = $this->send_sms($admin_details['phone'],$message);
			}

			if(!empty($returnDoubleGoogleOrderItem)){

				$user_message="Thank you for your order ".$order_number." on callat7, We will update you after your order is delivered from our end.";
				$message = urlencode($user_message);
				$output = $this->send_sms($customer->sender_mobile,$message);
				
				$admin_message="Dear Admin, New order ".$order_number." has been placed on callat7.";
				$message = urlencode($admin_message);
				$output = $this->send_sms($admin_details['phone'],$message);

				// $details['decription'] = str_replace("##USERNAME##",$customer->sender_name,$details['decription']);
				// $details['decription'] = str_replace("##ORDERNUMBER##",$order_number,$details['decription']);

				// if(!empty($customer_details->sender_email)){
					// \Mail::to( $customer_details->sender_email )->send(new \App\Mail\SendMail($details));
				// }
				// $admin_details['decription'] = str_replace("##USERNAME##",$user_name,$admin_details['decription']);
				// $admin_details['decription'] = str_replace("##ORDERNUMBER##",$order_number,$admin_details['decription']);
				// \Mail::to($admin_details['email'])->send(new \App\Mail\SendMail($admin_details));
				
			} else {

				if(!empty($customer_details->sender_email)){
					\Mail::to( $customer_details->sender_email )->send(new \App\Mail\SendMail($details));
				}
				
				\Mail::to($admin_details['email'])->send(new \App\Mail\SendMail($admin_details));
				
				
				
				$user_message="Thank you for your order ".$order_number." on callat7, We will update you after your order is delivered from our end.";
				$message = urlencode($user_message);
				$output = $this->send_sms($customer->sender_mobile,$message);
				
				
				
				$admin_message="Dear Admin, New order ".$order_number." has been placed on callat7.";
				$message = urlencode($admin_message);
				$output = $this->send_sms($admin_details['phone'],$message);
				
			}
			

	    	return $this->successJson('Order created successfully.',[
				'order' => $returnDoubleGoogleOrder,
				'user_details' => $customer->toArray(),
				// 'order_address' =>$returnDoubleGoogleOrder->orderAddress,
				// 'item' => $returnDoubleGoogleOrder->doubleGoogleOrderItems,
            ]);
    	} catch( Exception $e ) {
            DB::rollback();
    		return $this->errorJson( $e->getMessage() );
    	}
    	
	}


	public function listOrdertemp( Request $request ) {

		 $search = $request->get('search',''); 
		 $filter = $request->get('filter',[]);

		$doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress']);

		if( isset( $filter['delivery_status'] )  && !empty($filter['delivery_status']) ) {
			$doubleGoogleOrderData->whereHas('orderAddress', function( $query ) use ($search,$filter) {
				$query->where('delivery_status',$filter['delivery_status']);
			});
		}

		if( isset( $filter['order_status'] )  && !empty($filter['order_status']) ) {
			$doubleGoogleOrderData->where('order_status', $filter['order_status']);
		}

		$doubleGoogleOrderData = $doubleGoogleOrderData->get();

		return $this->successJson('Sending item list created successfully.',[
			'list' => $doubleGoogleOrderData,
		]);
	}

	public function listOrder( Request $request ) {

		$user_id = $request->get('user_id',''); 
		$order_status_active =['Pending','Canceled','Out for delivery','Delivered','Deleted','Return'];
		$order_status_comleted =['Completed'];
	   $doubleGoogleOrderData_active = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with(['driver'])->where('user_id',$user_id)->whereNotIn('order_status',['Completed','Delivered']);
	   $doubleGoogleOrderData_completed = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->with(['driver'])->where('user_id',$user_id)->where('order_status','Completed')->orWhere('order_status','Delivered');
		// dd($doubleGoogleOrderData_completed->toArray());
	   return $this->successJson('Sending item list created successfully.',[
			   
			'list_active' => $doubleGoogleOrderData_active->orderBy('id', 'DESC')->get()->toArray(),
			'list_completed' => $doubleGoogleOrderData_completed->orderBy('id', 'DESC')->get()->toArray(),
		 				
	   ]);
   }

   public function deleteOrder(DeleteOrderControllerRequest $request)
	{	
		
		try{

			$customer=Customer::where('id',$request->get('user_id'))->first();
			
			
			$orderlist = DoubleGoogleOrderModel::where('user_id',$request->get('user_id'))->where('id',$request->get('order_id'))->first();
			$orderlist->order_status = 'Deleted';
			$orderlist->flag = '1';
			$orderlist->save();
			
			$user_message="Dear ".$customer->sender_name.",\nYour order ".$orderlist->order_number." on callat7 is deleted.";
			$message = urlencode($user_message);
			$output = $this->send_sms($customer->sender_mobile,$message);
			// dd($orderlist);

					// dd($request->get('user_id'),$request->get('order_id'));
			return $this->successJson('Order has been deleted.',[
				'user_id' => $orderlist->user_id,
				'order_id' => $orderlist->id,
				'order_status' => $orderlist->order_status,
				'flag' => $orderlist->flag,
				// 'order_address' =>$returnDoubleGoogleOrder->orderAddress,
				// 'item' => $returnDoubleGoogleOrder->doubleGoogleOrderItems,
			]);
			
		} catch( Exception $e ) {
			DB::rollback();
			return $this->errorJson( $e->getMessage() );
		}   
   }

   public function orderAddressList(OrderAddressListControllerRequest $request)
	{	
		// dd($request->all());
		$customer_id = $request->get('user_id');
		$order_id = DB::table('double_google_order')->select('id')->where('user_id',$customer_id)->pluck('id')->toArray();
		// dd($order_id);
		$pickup_address = DB::table('order_address')->select('pickup_address')->whereIN('double_google_order_id',$order_id)->distinct()->pluck('pickup_address');
		$delivery_address = DB::table('order_address')->select('delivery_address')->whereIN('double_google_order_id',$order_id)->distinct()->pluck('delivery_address');

		
		try{
			return $this->successJson('Order address fetch successfully.',[
				'pickup_address' => $pickup_address,
				'delivery_address' => $delivery_address,
				]);
			
		} catch( Exception $e ) {
			DB::rollback();
			return $this->errorJson( $e->getMessage() );
		}   
   }

   public function orderCountAccordingMobile(MobileNumberValidationControllerRequest $request)
   {
	   	$if_order_count_zero = "Get your free order.";
		   
		   if($request->get('user_id')!=null){
				$customer=Customer::where('id',$request->get('user_id'))->first();
		   	} else {
			   $customer=Customer::where('sender_mobile',$request->get('mobile_number'))->first();
			}

			if(!empty($customer->id)){
				// if user exist in  customer table
				$count = DoubleGoogleOrderModel::where('user_id',$customer->id)->count();
				// dd($count);
				if(!empty($customer->id) && $count > 0){
					// if order count is greter than  zero
					return $this->successJson('Free delivery offer is not available for you as you already opt in once.',[
						'mobile_number' => !empty($customer->sender_mobile) ? $customer->sender_mobile : null,
						'count_of_order' => $count,
					]);	
				} else if(!empty($customer->id) && $count == 0){
					// if order count is zero
					return $this->successJson($if_order_count_zero,[
						'mobile_number' => !empty($customer->sender_mobile) ? $customer->sender_mobile : null,
						'count_of_order' => $count,
					]);	
				}
			}

			return $this->successJson($if_order_count_zero,[
				'mobile_number' => $request->get('mobile_number'),
				'count_of_order' => null,
			]);
   }

   public function checkDriverDetails(OrderDriverDetailsControllerRequest $request)
   {
		$order = DoubleGoogleOrderModel::where('id',$request->get('order_id'))->where('user_id',$request->get('user_id'))->first();
		$driver_details = Driver::where('id',$order->driver_id)->first();
		return $this->successJson('Driver fetch succesfully',[
			'driver_details' => empty($driver_details) ? null : $driver_details,
		]);
   }
}
