<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Country;
use App\Models\ServiceElement;
use Config;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        
        $slug = ($request->slug) ? $request->slug : 'courier';
        $country = session('country');
        $category = ServiceCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->intended(route('home'));
        }
        $service_category_list = ServiceCategory::get();
        $service_list = Service::where('category_id', $category->id)
            ->whereHas('countrys', function ($q) use ($country) {
                $q->where('country_id', $country);
            })->get();
        $country_list = Country::get();
        return view('frontend.service.index', compact('country_list', 'country', 'service_category_list', 'service_list', 'category'));
    }

    public function getServiceDetails(Request $request)
    {
        $slug = $request->slug;
        $service = Service::where('slug', $slug)->first();
        if (!$service) {
            return redirect()->intended(route('home'));
        }
        return view('frontend.service.details', compact('service'));
    }

    public function getServices(Request $request)
    {
        if ($request->ajax()) {
            $country = session('country');
            $service_list = Service::where('category_id',  $request->category)
                ->whereHas('countrys', function ($q) use ($country) {
                    $q->where('country_id', $country);
                })->get();
            $category = ServiceCategory::where('id', $request->category)->first();
            $returnHTML = view('frontend.service.ajax-service')->with(['service_list' => $service_list, 'category' => $category])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function getServiceInput(Request $request, $id)
    {
        $service_input  =  ServiceElement::findOrFail($id);
        return response()->json(['success' => true, 'data' => $service_input]);
    }

    public function saveServiceInput(Request $request)
    {
    }

    public function applyService(Request $request)
    {
        $service_data  =  Service::findOrFail($request->service_id);
        if ($service_data) {
            $service_data->service_id = $service_data->id;
            $service_data->user_id = $service_data->user_id;
            $service_data->staff_id = $service_data->staff_id;
            $service_data->status = Config::get('constants.SERVICE_STATUS.PENDING');
        }
    }
}
