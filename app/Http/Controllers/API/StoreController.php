<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\dgmodel\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;

class StoreController extends Controller
{
    public function storeList()
    {
       
        return $this->successJson('Store retrive successfully.',[
            'store_list' => [
                'store' => Store::select('*')->where('type','store')/* ->where('status','Y') */->get(),
                'medical' => Store::select('*')->where('type','medical')/* ->where('status','Y') */->get(),
                'restaurant' => Store::select('*')->where('type','restaurant')/* ->where('status','Y') */->get(),
                'vegetable' => Store::select('*')->where('type','vegetable')/* ->where('status','Y') */->get(),
            ]
            
		]);
    }

    
    
}
