<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Country;
use App\Models\ServiceElement;
use App\Models\MetaPage;
use Config;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $country = Country::where('slug',$request->country)->first();
        $service_category_list = ServiceCategory::where('status',Config::get('constants.STATUS.ACTIVE'))->get();
        $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
            ->where('category_id',$service_category_list->first()->id)
            ->whereHas('countries', function ($q) use ($country) {
                $q->where('country_id', $country->id);
            })
            ->with('category')
            ->get();
        $country_list = Country::get();
        $page_title       = 'Service-'. $country->name;
        return view('frontend.service.index', compact( 'service_category_list', 'service_list','country','country_list','page_title'));
    }

    public function getServices(Request $request)
    {
        if ($request->ajax()) {
            $country = Country::where('slug',$request->country)->first();
            $category = ServiceCategory::where('id',$request->category)
            ->where('status',Config::get('constants.STATUS.ACTIVE'))
            ->first();
            $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
                ->where('category_id', $request->category)
                ->whereHas('countries', function ($q) use ($country) {
                    $q->where('country_id', $country->id);
                })
                 ->with('category')
                ->get();
            $returnHTML = view('frontend.service.ajax-service')->with(['service_list' => $service_list,'country'=>$country,'category'=>$category])->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function serviceDetails(Request $request){
        $country = Country::where('slug',$request->country)
        ->first();
        $service = Service::where('slug',$request->service)        
        ->where('status',Config::get('constants.STATUS.ACTIVE'))
        ->first();
        $category = ServiceCategory::where('slug',$request->category)
        ->where('status',Config::get('constants.STATUS.ACTIVE'))
        ->first();
        $categories = ServiceCategory::where('status',Config::get('constants.STATUS.ACTIVE'))
        ->get();
        $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
            ->where('category_id',$category->id)
            ->whereHas('countries', function ($q) use ($country) {
                $q->where('country_id', $country->id);
            })->get();
        $page_title       = 'Service-'. $country->name.'-'.$category->name;
        return view('frontend.service.details', compact( 'service_list','category','country','service','categories'));
    }

    
    public function getServiceDetails(Request $request)
    {
        if ($request->ajax()) {
            $country = Country::where('id',$request->country)->first();
            $service_list = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
            ->where('category_id',$request->id)
            ->whereHas('countries', function ($q) use ($country) {
                $q->where('country_id', $country->id);
            })->get();
            $category = ServiceCategory::where('id',$request->id)
            ->where('status',Config::get('constants.STATUS.ACTIVE'))
            ->first();
            if($request->service){
                $service = Service::where('status',Config::get('constants.STATUS.ACTIVE'))
                ->where('id', $request->service)
                ->first();
            }else{
                $service = $service_list->first();
            }
            $returnHTML = view('frontend.service.ajax-service-details')->with(['service' => $service,'service_list'=>$service_list,'category'=>$category,'country'=>$country])->render();
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