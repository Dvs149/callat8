<?php

namespace App\Http\Controllers\API\v2;

use App\User;
use Carbon\Carbon;
use App\dgmodel\Customer;
use App\UserDeviceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/* use App\Http\Controllers\Controller; */
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\API\v2\LoginV2ControllerRequest;
use App\Http\Requests\API\v2\RegisterV2ControllerRequest;

class LoginControllerV2 extends Controller
{
    use AuthenticatesUsers, ConsumesExternalServices;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function registerV2(RegisterV2ControllerRequest $request)
    {

        DB::beginTransaction();
        try {

            $otp = mt_rand(100000, 999999);
            $current_time = Carbon::now();
            // $old_date = Customer::where('sender_mobile', $request->get('mobile_number'))->first();
            $customer = Customer::updateOrCreate([
                'sender_mobile' => $request->get('mobile_number'),
            ], [
                'sender_name' => $request->get('name', ''),
                'sender_email' => $request->get('email', ''),
                'sender_mobile' => $request->get('mobile_number', ''),
                'otp' => $otp,
                'otp_expire_time' => $current_time->isoFormat('Y-MM-DD HH:mm:ss'),
            ]);

            if ($customer) {

                $customer->user_token = Hash::make($request->get('mobile_number', '') . '-' . date('Y-m-d h:i:s'));
                $customer->save();

                $device_detail = UserDeviceDetail::updateOrCreate([
                    'user_id' => $customer->id,
                ], [
                    'user_id' => $customer->id,
                    'mobile_number' => $customer->sender_mobile,
                    'device_id' => $request->get('device_id', ''),
                    'fcm_key' => $request->get('fcm_key', ''),
                    'device_type' => $request->get('device_type', ''),
                    'device_version' => $request->get('device_version', ''),
                    'manfacturer' => $request->get('manfacturer', ''),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);
            }

            DB::commit();
            $admin = User::where('id', 1)->first();

            // $register_user='Your OTP for login is '.$customer->otp.' Team~Callat7';
            $register_user = 'Dear ' . $request->get('name') . ',\nThank you for register with Callat7.\nWhile login use your registered mobile number as username. Your OTP is: ' . $customer->otp . '\nThanks\nCallat7';
            $message = urlencode($register_user);

            $output = $this->send_sms($request->get('mobile_number', ''), $message);

            $admin_message = 'Dear Admin,\nNew user has been registered at Callat7.\nKindly acknowledge.\nThanks\nCall at 7\n';
            $message = urlencode($admin_message);

            $output = $this->send_sms($admin->mobile, $message);

            return $this->successJson('Thank you for your registration.', [
                'user_details' => Customer::where('id', $customer->id)->first()->toArray(),
                //'user_details' => $this->replace_null_with_empty_string($customer->toArray()),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }
    public function loginV2(LoginV2ControllerRequest $request)
    {
        $otp = mt_rand(100000, 999999);
        $current_time = Carbon::now();

        DB::beginTransaction();
        try {

            $customer = Customer::where('sender_mobile', $request->get('mobile_number'))->first();
            if ($customer) {

                $customer->otp = $otp;
                $customer->otp_expire_time = $current_time->isoFormat('Y-MM-DD HH:mm:ss');
                $customer->user_token = Hash::make($request->get('mobile_number', '') . '-' . date('Y-m-d h:i:s'));
                $customer->save();

                $device_detail = UserDeviceDetail::updateOrCreate([
                    'user_id' => $customer->id,
                ], [
                    'user_id' => $customer->id,
                    'mobile_number' => $customer->sender_mobile,
                    'device_id' => $request->get('device_id', ''),
                    'fcm_key' => $request->get('fcm_key', ''),
                    'device_type' => $request->get('device_type', ''),
                    'device_version' => $request->get('device_version', ''),
                    'manfacturer' => $request->get('manfacturer', ''),
                    'created_by' => 1,
                    'updated_by' => 1,
                ]);

                DB::commit();
            }

            $otp_msg = 'Your OTP for login is ' . $otp . ' Team~Callat7';

            $message = urlencode($otp_msg);

            $output = $this->send_sms($customer->sender_mobile, $message);



            return $this->successJson('Login successfully.', [
                'user_details' => $customer->toArray(),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }
}
