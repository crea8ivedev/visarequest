<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceElement;
use App\Models\ServiceApplication;
use App\Models\Service;

class ServiceApplicationController extends Controller
{
    public function index(request $request)
    {
        $service = Service::where('id', $request->id)->with(['serviceInputs'])->first();
        return view('frontend.service.application', compact('service'));
    }
}
