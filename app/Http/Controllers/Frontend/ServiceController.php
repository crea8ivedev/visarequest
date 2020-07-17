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
        $country = Country::where('slug',$request->country)->first();
        if (!$country) {
            return redirect()->intended(route('home'));
        }
        $service_category_list = ServiceCategory::where('status',Config::get('constants.STATUS.ACTIVE'))->get();
        $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
            ->where('category_id',$service_category_list->first()->id)
            ->whereHas('countrys', function ($q) use ($country) {
                $q->where('country_id', $country->id);
            })->get();
        return view('frontend.service.index', compact( 'service_category_list', 'service_list','country'));
    }

    public function getServices(Request $request)
    {
        if ($request->ajax()) {
            $country = Country::where('slug',$request->country)->first();
            $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
                ->where('category_id', $request->category)
                ->whereHas('countrys', function ($q) use ($country) {
                    $q->where('country_id', $country->id);
                })->get();
            $service =  ($request->service)?$service_list->find($request->service): $service_list->first();
            $returnHTML = view('frontend.service.ajax-service')->with(['service_list' => $service_list,'service'=>$service])->render();
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
