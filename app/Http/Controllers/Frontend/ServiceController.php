<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $service_category_list = ServiceCategory::latest()->get();
        return view('frontend.service.service', compact('service_category_list'));
    }

    public function getServices(Request $request, $id)
    {
        if ($request->ajax()) {
            $service_list = Service::where('category_id', $id);
            return response()->json(['success' => true, 'data' => $service_list]);
        }
    }

    public function applyService(Request $request)
    {
        $service_data  =  Service::findOrFail($request->service_id);
        if ($service_data) {
            $service_data->service_id = $service_data->id;
            $service_data->user_id = $service_data->user_id;
        }
    }
}
