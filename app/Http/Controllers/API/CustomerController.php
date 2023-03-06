<?php

namespace App\Http\Controllers\API;

use App\dgmodel\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\Controller;
use App\Http\Requests\UpdateProfileControllerRequest;
use App\Http\Requests\API\v2\GetAddressByCustomerControllerRequest;

class CustomerController extends Controller
{
    
    public function updateProfile( UpdateProfileControllerRequest $request )
    {
        // dd($request->all());
        
        DB::beginTransaction();
    	try {
            
            $customer= Customer::where('sender_mobile',$request->get('mobile_number',''))->first();
            $customer->sender_name=$request->get('name','');
            $customer->sender_email=$request->get('email','');
            if($request->get('password')){
                $customer->password=Hash::make($request->get('password'));
            }
            $customer->save();
            DB::commit();
	    	
            return $this->successJson('Your profile has been updated successfully.',[
                'user_details' => $this->replace_null_with_empty_string(Customer::where('id',$customer->id)->first()->toArray()),
                //'user_details' => $this->replace_null_with_empty_string($customer->toArray()),
            ]);
    	} catch( Exception $e ) {
            DB::rollback();
    		return $this->errorJson( $e->getMessage() );
    	}

    }

    public function custumerDetail(GetAddressByCustomerControllerRequest $request)
    {
        // dd($request->all());
        $customer = Customer::with('addAddress')->where('id', $request->user_id)->first();
            return $this->successJson('Your profile has been updated successfully.', [
                'customer' => $customer ? $customer :null ,
            ]);
    }

    
}
