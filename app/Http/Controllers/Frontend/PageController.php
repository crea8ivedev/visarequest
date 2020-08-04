<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\ContactUs;

class PageController extends Controller
{
    public function getAboutUs(Request $request)
    {   
        $aboutUs = Page::where('slug','about-us')->first();
        $page_title       = 'About Us';
        return view('frontend.pages.about-us', compact('aboutUs','page_title'));
    }

    public function getTermsAndConditions(Request $request)
    {
        $termsAndConditions = Page::where('slug','terms-and-conditions')->first();
        $page_title       = 'Term And Conditions';
        return view('frontend.pages.terms-and-conditions', compact('termsAndConditions','page_title'));
    }

    public function getContactUs(Request $request)
    {
        $address_list = ContactUs::get();
        $page_title       = 'Contact Us';
        return view('frontend.pages.contact-us', compact('address_list','page_title'));
    }
}