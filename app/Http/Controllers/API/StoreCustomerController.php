<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\dgmodel\Feedback;
use Illuminate\Http\Request;
use App\dgmodel\GuestCustumer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\Controller;
use App\Http\Requests\API\v1\customer\AddMobileNumberControllerRequest;
use App\Http\Requests\API\v1\customer\AddRatingDriverControllerRequest;

class StoreCustomerController extends Controller
{
    public function addMobileNumber(AddMobileNumberControllerRequest $request)
    {
        // $request->mobile_number;
        /* $user = new GuestCustumer;
        $user->mobile = $request->mobile_number;
        $user->save(); */
        $mytime = Carbon::now();
        
        $user = GuestCustumer::updateOrCreate([
            'mobile' => $request->mobile_number,
        ],[
            'mobile' => $request->mobile_number,
            'updated_at' => $mytime->toDateTimeString(), 
        ]);

        return $this->successJson('Mobile number stored successfully.', [
            'mobile_number' => $user->toArray(),
        ]);
    }
    public function addRatingDriver(/* Request */ AddRatingDriverControllerRequest  $request)
    {
        try {
            
        $mytime = Carbon::now();
            // dd($request->all());
            $feddback = new Feedback;
            $feddback->user_id = $request->get('user_id', null);
            $feddback->driver_id = $request->get('driver_id', null);
            $feddback->double_google_order_id = $request->get('double_google_order_id', null);
            $feddback->rate = $request->get('rating',null);
            $feddback->comments =  $request->get('comments',null);
            $feddback->created_date =  $mytime->toDateTimeString();
            $feddback->save();
			DB::commit();
            return $this->successJson('Thank you for your feedback.', [
                'feedback' => $feddback,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }  
    }
}
