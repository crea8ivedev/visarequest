<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\ServiceElement;
use Config;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $slug = ($request->slug) ? $request->slug : 'courier';
        $category = ServiceCategory::where('slug', $slug)->first();
        if (!$category) {
            return redirect()->intended(route('home'));
        }
        $service_category_list = ServiceCategory::get();
        $service_list = Service::where('category_id', $category->id)->get();
        return view('frontend.service.index', compact('service_category_list', 'service_list', 'category'));
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

    public function getServices(Request $request, $id)
    {
        if ($request->ajax()) {
            $service_list = Service::where('category_id', $id);
            return response()->json(['success' => true, 'data' => $service_list]);
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
