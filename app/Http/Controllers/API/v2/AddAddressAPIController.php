<?php

namespace App\Http\Controllers\API\v2;

use DB;
use Illuminate\Http\Request;
use App\dgmodel\AddAddressModel;
use App\Http\Controllers\API\Controller;
use App\Http\Requests\API\v2\AddAddressControllerRequest;
use App\Http\Requests\API\v2\DeleteAddressControllerRequest;
use App\Http\Requests\API\v2\UpdateAddressControllerRequest;
use App\Http\Requests\API\v2\CheckAddressTypeControllerRequest;
use App\Http\Requests\API\v2\ChangeDefaultAddressControllerRequest;
use App\Http\Requests\API\v2\GetAddressByCustomerControllerRequest;

class AddAddressAPIController extends Controller
{
    public function addAddress(AddAddressControllerRequest $request)
    {
        DB::beginTransaction();
        try {
            
            
            $addAddress = new AddAddressModel;
            
            $addAddress->other_name = $request->get('other_name',null);
            $addAddress->address = $request->get('address', null);
            $addAddress->landmark = $request->get('landmark',null);
            $addAddress->address_type = $request->get('address_type',null);
            $addAddress->address_lat = $request->get('address_lat',null);
            $addAddress->address_long = $request->get('address_long',null);
            $addAddress->default_address = $request->get('default_address','N');
            $addAddress->user_id = $request->get('user_id',null);
                
            $addAddress->save();
            DB::commit();
            // dd($addAddress);
            return $this->successJson('Your address has been added successfully.', [
                'addAddress' => $addAddress->toArray(),
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }

    }
    public function getAddressByCustomer(GetAddressByCustomerControllerRequest $request)
    {
        try {
            // $address_list = AddAddressModel::where('user_id',$request->user_id)->get()->toArray();
            $address_list = AddAddressModel::where('user_id',$request->user_id)
                ->orderByRaw("FIELD (address_type,'Home','Work','Other') ASC")
                ->get();
            return $this->successJson('Your address has been fetch successfully.', [
                'address_list' => $address_list,
            ]);
        } catch (Exception $e) {
            return $this->errorJson($e->getMessage());
        }
    }
    public function deleteAddress(DeleteAddressControllerRequest $request)
    {   

        DB::beginTransaction();
        try {
            $delete_address = AddAddressModel::where('user_id',$request->user_id)->where('id',$request->address_id)->first();
            $delete_address->delete();
            $address_list = AddAddressModel::where('user_id',$request->user_id)->get()->toArray();
            DB::commit();
            return $this->successJson('Address deleted successfully.', [
                'new_address_list' => $address_list,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }

    public function updateAddress(UpdateAddressControllerRequest $request)
    {
        // API/v2/UpdateAddressControllerRequest
        DB::beginTransaction();
        try {
            $check_address_type_allready_exist='';
            $meassage_if_address_type_exist = '';
            if($request->get('address_type')=='Home'){
                $check_address_type_allready_exist = AddAddressModel::where('user_id',$request->user_id)->where('id','<>',$request->address_id)->where('address_type','Home')->first() ? 1 : 0;
                $meassage_if_address_type_exist = 'Home address allready exist';
            }

            if($request->get('address_type')=='Work'){
                $check_address_type_allready_exist = AddAddressModel::where('user_id',$request->user_id)->where('id','<>',$request->address_id)->where('address_type','Work')->first() ? 1 : 0;
                $meassage_if_address_type_exist = 'Work address allready exist';
            }

            if($check_address_type_allready_exist){
                return $this->errorJson('Validation Errors', [
                    'address' => [$meassage_if_address_type_exist],
                ]);
            }


            $update_address = AddAddressModel::where('user_id',$request->user_id)->where('id',$request->address_id)->first();
            
            $update_address->other_name = $request->get('other_name',null);
            $update_address->address =$request->get('address',null);
            $update_address->landmark =$request->get('landmark',null);
            $update_address->address_type =$request->get('address_type',null);
            $update_address->address_lat =$request->get('address_lat',null);
            $update_address->address_long =$request->get('address_long',null);
            $update_address->user_id =$request->get('user_id');
            
            // save dat into database seccurely
            $update_address->save();
            DB::commit();
            $address_list = AddAddressModel::where('user_id',$request->user_id)->get()->toArray();
            return $this->successJson('Address updated successfully.', [
                'address_updated' => 'Yes',
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }

    public function checkAddressType(CheckAddressTypeControllerRequest $request)
    {
        // API/v2/CheckAddressTypeControllerRequest
        try {
            $address_type_home = AddAddressModel::where('user_id',$request->user_id)->where('address_type','Home')->first() ? 'Y' : 'N';
            $address_type_work = AddAddressModel::where('user_id',$request->user_id)->where('address_type','Work')->first() ? 'Y' : 'N';

            return $this->successJson('Address updated successfully.', [
                'address_type_home' => $address_type_home,
                'address_type_work' => $address_type_work,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }

    public function changeDefaultAddress(ChangeDefaultAddressControllerRequest $request)
    {
        // API/v2/changeDefaultAddressControllerRequest
        DB::beginTransaction();
        try {

            $address_deafault = AddAddressModel::where('user_id',$request->user_id)->get();
            foreach( $address_deafault as $key => $value ) {
                if($value['id']==$request->address_id)
                {
                    $address_deafault[$key]->default_address = 'Y';
                    $update_default_address = AddAddressModel::where(['id' => $value['id'] ])->first();
                    $update_default_address->default_address = 'Y';
                    $update_default_address->save();
                } else {
                    $address_deafault[$key]->default_address = 'N';
                    $update_default_address = AddAddressModel::where(['id' => $value['id'] ])->first();
                    $update_default_address->default_address = 'N';
                    $update_default_address->save();
                }
            }
            DB::commit();
            return $this->successJson('Default address has been updated successfully.', [
                'address_list' => $address_deafault->toArray(), 
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return $this->errorJson($e->getMessage());
        }
    }
    
}
