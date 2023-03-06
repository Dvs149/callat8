<?php

namespace App\Http\Controllers\AdminControl;

use App\dgmodel\Store;
use App\OrderTypeModel;
use App\dgmodel\Customer;
use App\SendingItemModel;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
// use App\Http\Controllers\Controller;
use App\dgmodel\AddAddressModel;
use App\Http\Controllers\API\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\OrderControllerRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\BreadcrumbPageHeaderthings;

class AddOrderController extends Controller
{
    use AuthenticatesUsers, ConsumesExternalServices;
    public function __construct()
    {
        $this->_fetch_data = new DGDatabase();
        $this->_breadCrumPageHeader = new BreadcrumbPageHeaderthings();
    }
    public function addOrder(Request $request)
    {
        // dd($request->all());
        $order_type = $request->order_type;
        $user_data = Customer::select('*')->with('addAddress')->where('status','Y')->get();
        $order_type_id = OrderTypeModel::select('id','name','default_price')->get();
        $address_list = AddAddressModel::select('*')->get();
        // $address_list = '';
        // dd($order_type_id);
        // dd($user_data);
        if($request->order_type == 'Pick up' ){
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_pickup();
            $sending_item_id = SendingItemModel::select('*')->where('status','Y')->get();
            return view("admin.order.addOrder.add-pick-up", compact('BreadCrumbPageHeader', 'order_type', 'user_data', 'order_type_id','address_list','sending_item_id'));
        } else {
            $store_details = Store::select('*')->where('type',$order_type)->get();
            // dd($store_details);
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_non_pickup(ucfirst($order_type));
            return view("admin.order.addOrder.add-non-pick-up", compact('BreadCrumbPageHeader','order_type', 'user_data', 'order_type_id', 'store_details', 'address_list'));
            // return view("admin.order.addOrder.add-non-pick-up", compact('BreadCrumbPageHeader','order_type', 'user_data', 'order_type_id', 'store_details'));
        }

        
    }
    public function addingOrder(Request $request)
    {
        dd($request->all());
        //  store roder by calling API
        $response = $this->PostApi(url('api/order/save_v2'), $request->all());
        $order_status = '';
        if($response["status"]==200){
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_successfully();
            $order_status ="<span class='alert alert-success'>Order created successfully</span>";
            return view("admin.order.addOrder.successfully",compact('BreadCrumbPageHeader','order_status'));
        } else{
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_successfully();
            $order_status ="<span class='alert alert-error'>Oops, Somehing went wrong. Please try again later</span>";
            return view("admin.order.addOrder.successfully",compact('BreadCrumbPageHeader','order_status'));
        }
        return $d;
    }
    
    public function addingOrderForPickup(OrderControllerRequest $request)
    {
        // dd($request->all());

        //  store roder by calling API
        $response = $this->PostApi(url('api/order/save_v2'), $request->all());
        $order_status = '';
        if($response["status"]==200){
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_successfully();
            $order_status ="<span class='alert alert-success'>Order created successfully</span>";
            return view("admin.order.addOrder.successfully",compact('BreadCrumbPageHeader','order_status'));
        } else{
            $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_successfully();
            $order_status ="<span class='alert alert-error'>Oops, Somehing went wrong. Please try again later</span>";
            return view("admin.order.addOrder.successfully",compact('BreadCrumbPageHeader','order_status'));
        }
        return Redirect::back()->withErrors(['msg', 'The Message']);
    }
    public function orderAddedSuccessfully()
    {
        $BreadCrumbPageHeader = $this->_breadCrumPageHeader->add_order_successfully();
        $order_status ="<span class='alert alert-success'>Oops, Somehing went wrong. Please try again later</span>";
        return view("admin.order.addOrder.successfully",compact('BreadCrumbPageHeader','order_status'));


    }
}
