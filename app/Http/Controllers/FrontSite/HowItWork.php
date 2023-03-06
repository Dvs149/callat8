<?php

namespace App\Http\Controllers\FrontSite;

use App\dgmodel\CmsPages;
use App\dgmodel\HowItWorks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HowItWork extends Controller
{
    public function howItWorks()
    {
        $data =CmsPages::select('*')->where('page_name', 'HOW IT WORKS')->first()->toArray();
        return view('front-end.howItWorks', compact('data'));
    }
}


