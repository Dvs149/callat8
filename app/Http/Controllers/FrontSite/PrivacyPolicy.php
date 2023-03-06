<?php

namespace App\Http\Controllers\FrontSite;

use App\dgmodel\CmsPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyPolicy extends Controller
{
    public function privacyPolicy()
    {
        $data = CmsPages::select('*')->where('page_name', 'PRIVACY POLICY')->first()->toArray();
        // dd($data);
        return view('front-end.privacyPolicy',compact('data'));
    }
}
