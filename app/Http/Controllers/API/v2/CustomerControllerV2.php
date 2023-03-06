<?php

namespace App\Http\Controllers\API\v2;

use App\dgmodel\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\Controller;
use App\Http\Requests\API\v2\UpdateProfileV2ControllerRequest;

class CustomerControllerV2 extends Controller
{
    public function updateProfileV2( UpdateProfileV2ControllerRequest $request )
    {
        // dd($request->all());
        
        DB::beginTransaction();
    	try {
            
            $customer= Customer::where('id',$request->get('user_id',''))
                                ->where('sender_mobile',$request->get('mobile_number',''))
                                ->first();
            $customer->sender_name=$request->get('name','');
            $customer->sender_email=$request->get('email','');
            $customer->save();


            DB::commit();
	    	
            return $this->successJson('Your profile has been updated successfully.',[
                'user_details' => Customer::where('id',$customer->id)->first()->toArray(),
                //'user_details' => $this->replace_null_with_empty_string($customer->toArray()),
            ]);
    	} catch( Exception $e ) {
            DB::rollback();
    		return $this->errorJson( $e->getMessage() );
    	}

    }
}
