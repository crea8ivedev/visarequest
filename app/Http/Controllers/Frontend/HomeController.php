<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Country;
use App\Models\ServiceCategory;
use App\Models\ContactUs;
use App\Models\MetaPage;
use App\Models\VisaQuestion;
use App\Models\Slider;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $member_list = TeamMember::get();
        $service_category_list = ServiceCategory::get();
        $country_list = Country::get();
        $address = ContactUs::get();
        $metaData = MetaPage::first();
        $sliders = Slider::get();
        $visaQuestion = VisaQuestion::get();
        return view('frontend.home', compact(['member_list', 'service_category_list', 'country_list','address','metaData','sliders','visaQuestion']));
    }

    public function country(Request $request)
    {
        $country = Country::where('slug',$request->country)->first();
        return response()->json(['success' =>($country)?true:false]);
    }

    

}