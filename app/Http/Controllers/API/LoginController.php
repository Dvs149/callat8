<?php

namespace App\Http\Controllers\API;

use App\User;
use App\CategoryItem;
use App\dgmodel\City;
use App\dgmodel\Price;
use App\Mail\SendMail;
use App\OrderTypeModel;
use App\PromoCodeModel;
use App\dgmodel\Customer;
use App\SendingItemModel;
use App\UserDeviceDetail;
use App\OrderAddressModel;
use App\dgmodel\EmailModel;
use App\dgmodel\BannerModel;
use Illuminate\Http\Request;
use App\Mail\AdminInfoNewUser;
use App\DoubleGoogleOrderModel;
use Illuminate\Support\Facades\DB;
use App\dgmodel\GlobalSettingModel;
use App\Mail\SendPaswordToCustomer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\LoginControllerRequest;
use App\Http\Requests\RegisterControllerRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\CheckUserLoginControllerRequest;
use App\Http\Requests\ForgotPasswordControllerRequest;

class LoginController extends Controller
{
    use AuthenticatesUsers,ConsumesExternalServices;

   	public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function test() {
    	return $this->successJson('this is test function ');
    }

    public function register( RegisterControllerRequest $request ) {
        
        DB::beginTransaction();
    	try {

            $customer = Customer::updateOrCreate([
	    		'sender_mobile' => $request->get('mobile_number'),
	    	],[
                'sender_name' => $request->get('name',''),
                'sender_email' => $request->get('email',''),
                'sender_mobile' => $request->get('mobile_number',''),
                'password' => Hash::make($request->get('password','')),
            ]);
                
            if( $customer ) {

                $customer->user_token = Hash::make($request->get('mobile_number','').'-'.date('Y-m-d h:i:s'));
                $customer->save();

                $device_detail = UserDeviceDetail::updateOrCreate([
                    'user_id' => $customer->id,
                ],[
                    'user_id' => $customer->id,
                    'mobile_number' => $request->get('sender_mobile',''),
                    'device_id' => $request->get('device_id',''),
                    'fcm_key' => $request->get('fcm_key',''),
                    'device_type' => $request->get('device_type',''),
                    'device_version' => $request->get('device_version',''),
                    'manfacturer' => $request->get('manfacturer',''),
                    'created_by' => $customer->id,
                    'updated_by' => $customer->id,
                ]);
            }

            DB::commit();
            
            $emailModel=EmailModel::select('*')->where('id',1)->get();
            $adminEmailModel=EmailModel::select('*')->where('id',2)->get();
                 
            $subject = $emailModel[0]->subject;
            $decription = $emailModel[0]->decription;
            
            $admin_subject = $adminEmailModel[0]->subject;
            $admin_decription = $adminEmailModel[0]->decription;

            $details = [
                'sender_email' => $request->get('email',''),
                'password' => $request->get('password',''),
                'subject' => $subject,
                'decription' => $decription,
            ];

            $admin_email= User::where('id',1)->first();
            $admin_details = [
                'phone' => $admin_email->mobile,
                'email' => $admin_email->email,
                'subject' => $admin_subject,
                'decription' => $admin_decription,
            ];

            // dd($admin_details);

            $details['decription']=str_replace("##USERNAME##",$request->get('name',''),$details['decription']);
            $details['decription']=str_replace("##PASSWORD##",$request->get('password',''),$details['decription']);

            
        //    dd($details,$admin_details);
        if(!empty($customer->sender_email)){
            
            \Mail::to($request->get('email',''))->send(new \App\Mail\SendMail($details));
        }

            \Mail::to($admin_details['email'])->send(new \App\Mail\SendMail($admin_details));
            
            $register_user='Dear '.$request->get('name','').',\nThank you for register with Callat7.\nWhile login use your registered mobile number as username. Your password is: '.$request->get('password','').'\nThanks\nCallat7';
			$message = urlencode($register_user);
            
            $output = $this->send_sms($request->get('mobile_number',''),$message);

            $admin_message='Dear Admin,\nNew user has been registered at Callat7.\nKindly acknowledge.\nThanks\nCall at 7\n';
            $message = urlencode($admin_message);
            
            $output = $this->send_sms($admin_details['phone'],$message);
			
	    	return $this->successJson('Thank you for your registration.',[
                'user_details' => $this->replace_null_with_empty_string(Customer::where('id',$customer->id)->first()->toArray()),
                //'user_details' => $this->replace_null_with_empty_string($customer->toArray()),
            ]);

    	} catch( Exception $e ) {
            DB::rollback();
    		return $this->errorJson( $e->getMessage() );
    	}
    }

    public function forgotPassword( ForgotPasswordControllerRequest $request )
    {
        

        $customer=Customer::where('sender_mobile',$request->get('mobile_number',''))->first();
        // dd($customer->sender_mobile);
        $password = mt_rand(10000000,99999999);
        $customer->password = Hash::make($password);
        $customer->save();

        $emailModel=EmailModel::select('*')->where('id',5)->first();

        $subject = $emailModel->subject;
        $decription = $emailModel->decription;
        
        $details = [
            'subject' => $subject,
            'decription' => $decription,
        ];

        $details['decription'] = str_replace("##USERNAME##",$customer->sender_name,$details['decription']);
        $details['decription'] = str_replace("##PASSWORD##",$password,$details['decription']);
        // dd($details);
        if(!empty($customer->sender_email)){
            \Mail::to($customer->sender_email)->send(new \App\Mail\SendMail($details));
		}
            $user_forgotten_password='Dear '.$customer->sender_name.',\nHere is your password '.$password.'\nThanks\nCall at 7';

			$message = urlencode($user_forgotten_password);
            
            $output = $this->send_sms($customer->sender_mobile,$message);
            
            

        return $this->successJson('Password has been sent to your registered mobile.',[
            'email' => 'Email send successfully.',
        ]);

    }

    public function login( LoginControllerRequest $request ) {
        DB::beginTransaction();
    	try {

            $customer= Customer::where('sender_mobile',$request->get('mobile_number'))->first();

            if($customer){

                $customer->user_token = Hash::make($request->get('mobile_number','').'-'.date('Y-m-d h:i:s'));
                $customer->save();
                DB::commit();

            }

	    	return $this->successJson('Login successfully.',[
                'user_details' => $this->replace_null_with_empty_string($customer->toArray()),
                // 'device_details' => $device_detail->toArray(),
            ]);
    	} catch( Exception $e ) {
            DB::rollback();
    		return $this->errorJson( $e->getMessage() );
    	}
    }




    public function globalSetting() {

        $banner_images = [];

        $time = GlobalSettingModel::where('setting_key','OPENTIME')->first();
        $admin_data = User::where('id','1')->first();
        
        $slider_images = BannerModel::where('bnr_status','y')->where('type','slider')->get(['bnr_title','bnr_description','bnr_image']);
        $banner_images = BannerModel::where('bnr_status','y')->where('type','banner')->get(['bnr_title','bnr_description','bnr_image']);
        $restaurant_images = BannerModel::where('bnr_status','y')->where('type','restaurant')->get(['bnr_title','bnr_description','bnr_image']);
        $groceries_images = BannerModel::where('bnr_status','y')->where('type','groceries')->get(['bnr_title','bnr_description','bnr_image']);
        $vegetable_images = BannerModel::where('bnr_status','y')->where('type','vegetable')->get(['bnr_title','bnr_description','bnr_image']);

        return $this->successJson('Login successfully.',[
            'order_type' => OrderTypeModel::select('id','name', 'default_price')->get(),
            'sending_item' => SendingItemModel::select('name','id','status')->get(),
            'category_item' => CategoryItem::select('name','id')->get(),
            'cities' => City::select('city_name','id')->get(),
            'price' => Price::select('*')->get(),
            'open_time' => !empty( $time ) ? $time->setting_value['open'] : '',
            'close_time' => !empty( $time ) ? $time->setting_value['close'] : '',
            'whatsapp' => $admin_data->whatsapp_mobile,
            'mobile_number' => $admin_data->mobile,
            'total_slider' => BannerModel::where('bnr_status','Y')->where('type','slider')->count(),
            'total_banner' => BannerModel::where('bnr_status','Y')->where('type','banner')->count(),
            'total_restaurant' => BannerModel::where('bnr_status','Y')->where('type','restaurant')->count(),
            'total_groceries' => BannerModel::where('bnr_status','Y')->where('type','groceries')->count(),
            'total_vegetable' => BannerModel::where('bnr_status','Y')->where('type','vegetable')->count(),
            'slider_images'=> ( $slider_images->count() > 0 ) ? $slider_images->toArray() : [],
            'banner_image' => ( $banner_images->count() > 0 ) ? $banner_images->toArray() : [],
            'restaurant_image' => ( $restaurant_images->count() > 0 ) ? $restaurant_images->toArray() : [],
            'groceries_image' => ( $groceries_images->count() > 0 ) ? $groceries_images->toArray() : [],
            'vegetable_image' => ( $vegetable_images->count() > 0 ) ? $vegetable_images->toArray() : [],
            'privacy_policy' => config('custom.PRIVACY_POLICY'),
            'terms_condition' => config('custom.TERMS_CONDITION'),
            'how_it_works' => config('custom.HOW_IT_WORKS'),
            'contact_us' => config('custom.CONTACT_US'),
            'app_version' => "1",
            'app_version_text' => 'We have an exciting update available for you with bug fixes and new features. Please update to latest version',
            'delivery_fee' => 49,
            'extra_delivery_fee' => 40,
            'driver_message_null' => 'Waiting for driver to accept your order.',
            'offer_avail' => 0,
            'delivery_address_count' => 10,
            'Forcefully_update' => 'Y',
            'live_tracking' => 'Y',
		]);
    }

    public function checkUserStatus(CheckUserLoginControllerRequest $request)
    {
        $customer = Customer::select('*')->where('id',$request->get('user_id'))->first();
        // dd($customer->status); 
        $status = null;
        $message = '';
        if((!empty($customer))){
            if($customer->status == 'Y'){
                $status = 'Y';
                $message = "";
            } else {
                $status = 'N';
                $message = "Your profile is deleted";
            }
        } else {
            $status = null;
            $message = "Your account has been blocked";
        }

        return $this->successJson('Customer details',[
            'user_status' => $status,
            'msg' => $message,
            // 'device_details' => $device_detail->toArray(),
        ]);
    }

    
}
