<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Country;
use App\Models\ServiceCategory;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $member_list = TeamMember::get();
        $service_category_list = ServiceCategory::get();
        $country_list = Country::get();
        $country = session('country');
        return view('frontend.home', compact(['member_list', 'country', 'service_category_list', 'country_list']));
    }

    public function makeDefaultCountry(Request $request)
    {
        $request->session()->put('country', $request->country);
    }
}
