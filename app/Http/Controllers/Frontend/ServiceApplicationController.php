<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceElement;
use App\Models\ServiceApplication;
use App\Models\Service;

class ServiceApplicationController extends Controller
{
    public function index(request $request){
        $serviceId = Service::findorfails($request->id);

        return view('service.application', compact(''));
    }
}
