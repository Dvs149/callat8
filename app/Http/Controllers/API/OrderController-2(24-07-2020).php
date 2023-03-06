<?php
namespace App\Http\Controllers\API;

use DB;
// use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\User;
use App\dgmodel\Store;
use App\Mail\SendMail;
use App\OrderTypeModel;
use App\PromoCodeModel;
use App\dgmodel\Customer;
use App\SendingItemModel;
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

class OrderController extends Controller
{
    use AuthenticatesUsers,ConsumesExternalServices;

    protected $redirectTo = '/home';

   	public function __construct() {
        $this->middleware('guest')->except('logout');
    }


    public function save( OrderControllerRequest $request ) {
	    DB::beginTransaction();
    	try {
    		$returnPromoCode = PromoCodeModel::where('code',$request->get('promo_code'))->first();
	    	$returnOrderType = OrderTypeModel::where('id',$request->get('order_type_id'))->first();
	    	$returnSendingItem = SendingItemModel::where('id',$request->get('sending_item_id'))->first();
			
			$password = mt_rand(10000000,99999999);

			$customer_available=Customer::where('sender_mobile',$request->get('pickup_phone'))->first();
			if(!$customer_available){
				$customer_available=0;
			}
			else{
				$customer_available=1;
			}
			
			$customer = Customer::updateOrCreate([
				'sender_mobile' => $request->get('pickup_phone'),
			],[
				'sender_address_1' => $request->get('pickup_address',''),
				'sender_mobile' => $request->get('pickup_phone',''),
				'password' => Hash::make($password),
			]);

			if(!empty($request->get('store_id'))){
				$store_data = Store::where('id',$request->get('store_id'))->first();
				$sender_name = $store_data->name;
			} else {
				$sender_name = $request->get('sender_name',null);
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
						'sender_name' => $sender_name,
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
			
			if(!empty($returnDoubleGoogleOrderItem)){

				$user_message="Thank you for your order ".$order_number." on callat7, We will update you after your order is delivered from our end.";
				$message = urlencode($user_message);
				$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$request->get('pickup_phone','')."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				$output = curl_exec($ch);      
				curl_close($ch);
				
				$admin_message="Dear Admin, New order ".$order_number." has been placed on callat7.";

				$message = urlencode($admin_message);

				$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$admin_details['phone']."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				$output = curl_exec($ch);      
				curl_close($ch);
			} else{

				if(!empty($customer_details->sender_email)){
					\Mail::to( $customer_details->sender_email )->send(new \App\Mail\SendMail($details));
				}

				\Mail::to($admin_details['email'])->send(new \App\Mail\SendMail($admin_details));
				
				
				if(!$customer_available){
					$register_user='Thank you for register with Callat7.While login use your registered mobile number as username. Your password is: '.$password.'.\n Thanks\n Callat7';
					$message = urlencode($register_user);

					$output = $this->send_sms($request->get('pickup_phone',''),$message);

					$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$request->get('pickup_phone','')."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
					curl_setopt($ch, CURLOPT_HEADER, 0);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
					$output = curl_exec($ch);  
					curl_close($ch);
				}
				
				$user_message="Thank you for your order ".$order_number." on callat7, We will update you after your order is delivered from our end.";
				$message = urlencode($user_message);
				$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$request->get('pickup_phone','')."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				$output = curl_exec($ch);      
				curl_close($ch);

				$admin_message="Dear Admin, New order ".$order_number." has been placed on callat7.";

				$message = urlencode($admin_message);

				$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".env('USER_NAME_API')."&apikey=".env('API_KEY')."&mobile=".$admin_details['phone']."&message=".$message."&senderid=".env('SENDER_ID')."&type=".env('TYPE_KEY').""); 
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				$output = curl_exec($ch);      
				curl_close($ch);
			}

	    	return $this->successJson('Order created successfully.',[
				'order' => $returnDoubleGoogleOrder,
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
		
	   $doubleGoogleOrderData = DoubleGoogleOrderModel::with(['orderAddress'])->with(['doubleGoogleOrderItems'])->where('user_id',$user_id)/* ->where('order_type','Pick up') */;
	
	   return $this->successJson('Sending item list created successfully.',[
		   	'list' => $doubleGoogleOrderData->get()->toArray(),
	   ]);
   }
}
