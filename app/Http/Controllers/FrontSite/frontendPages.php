<?php

namespace App\Http\Controllers\FrontSite;

use App\User;
use App\dgmodel\CmsPages;
use App\dgmodel\HowItWorks;
use App\dgmodel\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class frontendPages extends Controller
{
    public function homePage()
    {
        $social_link = User::select('facebook','instagram','twitter')->first();
        $testimonial = Testimonial::select('user_name', 'message','date')->where('status','Y')->limit(3)->get();
        // dd($testimonial);
        return view('front-end.home',compact('social_link', 'testimonial'));
    }
    public function howItWorks()
    {
        // $data = HowItWorks::select('*')->where('status','Y')->get()->toArray();
        // $social_link = User::select('facebook','instagram','twitter')->first();
        $data = CmsPages::select('*')->where('page_name', 'HOW IT WORKS')->first()->toArray();
        $social_link = User::select('facebook', 'instagram', 'twitter')->first();
        // dd($data);
        return view('front-end.howItWorks.how-it-works-for-website',compact('social_link','data'));
    }
    public function termsAndCondition()
    {
        $data = CmsPages::select('*')->where('page_name', 'TERMS AND CONDITIONS')->first()->toArray();
        $social_link = User::select('facebook','instagram','twitter')->first();
        return view('front-end.termsAndCondition.terms-and-condition-for-website',compact('social_link','data')); 
    }
    public function privacyPolicy()
    {
        $data = CmsPages::select('*')->where('page_name', 'PRIVACY POLICY')->first()->toArray();
        $social_link = User::select('facebook','instagram','twitter')->first();
        return view('front-end.privacyPolicy.privacy-policy-for-website',compact('social_link','data'));
    }
    public function aboutUs()
    {
        $data = CmsPages::select('*')->where('page_name', 'ABOUT US')->first()->toArray();
        $social_link = User::select('facebook','instagram','twitter')->first();
        return view('front-end.aboutUs.about-us',compact('social_link','data'));
    }
    public function contact()
    {
        $data = CmsPages::select('*')->where('page_name', 'CONTACT US')->first()->toArray();
        $social_link = User::select('facebook','instagram','twitter')->first();
        return view('front-end.contact.contact',compact('social_link','data'));
    }
    public function customersFeedback()
    {
        $testimonial = Testimonial::select('user_name', 'message', 'date')->where('status', 'Y')->get();
        $social_link = User::select('facebook', 'instagram', 'twitter')->first();
        // dd($testimonial);
        return view('front-end.testimonial.testimonial', compact('testimonial', 'social_link'));

    }
}
