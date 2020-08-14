<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceElement;
use App\Models\ServiceApplication;
use App\Models\Service;
use App\Models\ServiceInputAnswer;
use Auth;
use Config;


class ServiceApplicationController extends Controller
{
    public function index(request $request)
    {
        $service = Service::where('id', $request->id)->with(['serviceInputs'])->first();
        return view('frontend.service.application', compact('service'));
    }

    public function applyUpdate(request $request)
    {
        $service = Service::findorfail($request->service);
        $data = [];
        $k = 0;
        $user = Auth::user();
        $serviceApplication = new ServiceApplication;
        $serviceApplication->service_id = $service->id;
        $serviceApplication->user_id = $user->id;
        $serviceApplication->assign_id = $service->processor_id;
        $serviceApplication->amount = $service->normal_price;
        $serviceApplication->discount_amount = $service->discount_price;
        $serviceApplication->application_applied_date = date('Y-m-d h:i:s');
        $serviceApplication->status =  Config::get('constants.SERVICE_APPLICATION_STATUS.PROCESSING');
        if ($serviceApplication->save()) {
            foreach ($request->element as $key => $value) {
                $type_value = explode("-**-", $key);
                $data[$k]['service_id'] = $service->id;
                $data[$k]['application_id'] = $serviceApplication->id;
                $data[$k]['client_id'] = $request->service;
                $data[$k]['type'] =  $type_value[0];
                $data[$k]['label'] = $type_value[1];
                $data[$k]['value'] = $value;
                $k++;
            }
            foreach ($request->file('file') as $key => $file) {
                $save_name =  date("Y-m-d h:i:s") . rand(5, 15) . '.' . $file->getClientOriginalExtension();
                $file->storeAs(Config::get('constants.DOCUMENTS.APPLICATION_DOCUMENT'), $save_name);
                $type_value = explode("-**-", $key);
                $data[$k]['service_id'] = $service->id;
                $data[$k]['application_id'] = $serviceApplication->id;
                $data[$k]['client_id'] = $request->service;
                $data[$k]['type'] =  $type_value[0];
                $data[$k]['label'] = $type_value[1];
                $data[$k]['value'] = $save_name;
            }
            $application_answer = new ServiceInputAnswer;
            $application_answer->insert($data);
            return redirect()->back()->with('success', 'Service Application applied successfully.');
        } else {
            return redirect()->back()->with('error', 'Service Application does not applied successfully.');
        }
    }
}
