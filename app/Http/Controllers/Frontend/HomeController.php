<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Country;
use App\Models\ServiceCategory;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $member_list = TeamMember::get();
        $service_category_list = ServiceCategory::get();
        $country_list = Country::get();
        return view('frontend.home', compact(['member_list', 'service_category_list', 'country_list']));
    }

    public function country(Request $request)
    {
        $country = Country::where('slug',$request->country)->first();
        return response()->json(['success' =>($country)?true:false]);
    }
}
