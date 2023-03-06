<?php

namespace App\Http\Controllers\FrontSite;

use App\dgmodel\CmsPages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsCondition extends Controller
{
    public function termsCondition()
    {
        $data = CmsPages::select('*')->where('page_name', 'TERMS AND CONDITIONS')->first()->toArray();
        // dd($data);
        return view('front-end.termsCondition',compact('data'));
    }
}
