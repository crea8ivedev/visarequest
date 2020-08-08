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
use App\Models\VisaClient;
use App\Models\Slider;
use Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $member_list = TeamMember::get();
        $service_category_list = ServiceCategory::get();
        $address = ContactUs::get();
        $sliders = Slider::get();
        $visaQuestion = VisaQuestion::get();
        $visaClients = VisaClient::get();
        $page_title       = 'Home';
        return view('frontend.home', compact(['member_list', 'page_title', 'service_category_list',  'address', 'sliders', 'visaQuestion', 'visaClients']));
    }
}
