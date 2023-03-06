<?php

namespace App\Http\Controllers\FrontSite;

use App\User;
use App\OrderTypeModel;
use App\PromoCodeModel;
use App\SendingItemModel;
use App\OrderAddressModel;
use Illuminate\Http\Request;
use App\DoubleGoogleOrderModel;
use App\Http\Controllers\Controller;
use App\Traits\ConsumesExternalServices;
use App\Http\Requests\OrderControllerRequest;

class OrderController extends Controller {
    
    use ConsumesExternalServices;

    public function __construct(){

    }
    
    public function addOrder() {
        $data = [];

        $data['order_type'] = OrderTypeModel::where('status','Enable')->get();
        $data['sending_item'] = SendingItemModel::get();
        $social_link = User::select('facebook', 'instagram', 'twitter')->first();

        return view('front-end.order.order-create',compact('data', 'social_link'));
    }

    public function save( OrderControllerRequest $request ) {
        $return = $this->PostApi('api/order/save', $request->all());
        dd($return);
    }

}
