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
        return view('frontend.pages.about-us', compact('aboutUs'));
    }

    public function getTermsAndConditions(Request $request)
    {
        $termsAndConditions = Page::where('slug','terms-and-conditions')->first();
        return view('frontend.pages.terms-and-conditions', compact('termsAndConditions'));
    }

    public function getContactUs(Request $request)
    {
        $contactUs = ContactUs::first();
        return view('frontend.pages.contact-us', compact('contactUs'));
    }
}
