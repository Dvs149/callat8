<?php

namespace App\Http\Controllers\FrontSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUs extends Controller
{
    
    public function ContactUs()
    {
        return view('front-end.contactUs');
    }
}
