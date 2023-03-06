<?php

namespace App\Http\Controllers\API\v2;

use Carbon\Carbon;
use App\dgmodel\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\API\Controller;

class StoreControllerV2 extends Controller
{
    public function storeListV2()
    {
        $weekMap = [
            0 => 'Sun',
            1 => 'Mon',
            2 => 'Tue',
            3 => 'Wed',
            4 => 'Thu',
            5 => 'Fri',
            6 => 'Sat',
        ];

         
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        return $this->successJson('Store retrive successfully.', [
            'store_list' => [
                'store' => Store::select('*')->where('type', 'store')->where('status', 'Y')->whereNotIn('close_day',[$weekday])->get(),
                'medical' => Store::select('*')->where('type', 'medical')->where('status', 'Y')->whereNotIn('close_day',[$weekday])->get(),
                'restaurant' => Store::select('*')->where('type', 'restaurant')->where('status', 'Y')->whereNotIn('close_day',[$weekday])->get(),
                'vegetable' => Store::select('*')->where('type', 'vegetable')->where('status', 'Y')->whereNotIn('close_day',[$weekday])->get(),
            ]
        ]);
    }
    public function getActiveStoreCount()
    {
        return $this->successJson('Active store retrive successfully.', [
            'active_store_list' => [
                'store' => Store::select('*')->where('type', 'store')->where('status', 'Y')->count(),
                'medical' => Store::select('*')->where('type', 'medical')->where('status', 'Y')->count(),
                'restaurant' => Store::select('*')->where('type', 'restaurant')->where('status', 'Y')->count(),
                'vegetable' => Store::select('*')->where('type', 'vegetable')->where('status', 'Y')->count(),
            ]
        ]);
    }
}
