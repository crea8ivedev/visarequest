<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use DataTables;
use Toastr;
use Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class SliderController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {   
             $page_title        = 'Sliders';
             $page_description  = '';
             $page_breadcrumbs  = '';
             if($request->ajax())
             {
                 $slider = Slider::query();
                 if ($request->has('search') && ! is_null($request->get('search'))) {
                     $search = $request->get('search');
                     $slider->where(function($query) use ($search) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%');
                     });
                 }
                 $data = $slider->latest()->get();
                 return DataTables::of($data)
                     ->addColumn('action', function($data) {
                         $button = '<a href="/admin/slider/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                         $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                         $button .= '<input data-switch="true" id="'.$data->id.'" type="checkbox" checked="checked"  />';
                         return $button;
                     })
                     ->rawColumns(['action'])
                     ->make(true);
             }
             return view('backend.admin.slider.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     public function create(Request $request)
     {   
         $page_title         = 'Slider';
         $page_description   = '';
         $page_breadcrumbs   = array (['page' => 'admin/slider', 'title' => 'sliders'], ['page' => 'admin/slider/add', 'title' =>'Add']);
         return view('backend.admin.slider.add', compact('page_title', 'page_description', 'page_breadcrumbs'));
 
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(SliderRequest $request)
     {   
         $slider             = new Slider;
         $slider->name        = $request->name;
         $slider->text       = $request->text;

         if ($request->hasFile('image')) {
            $image = $request->file('image');
            $save_name =$slider->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.SLIDER_IMAGE'), $save_name);
            $slider->image = $save_name;
        }
        
        if($slider->save()) {
         Toastr::success('Slider added successfully!','', Config::get('constants.toster'));
         return redirect('/admin/slider');
        } else {
         Toastr::success('Slider dose not added!','', Config::get('constants.toster'));
         return redirect('/admin/slider/add');
        }
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\slider  $slider
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $data               = Slider::findOrFail($id);
         $page_title         = 'Slider';
         $page_description   = '';
         $page_breadcrumbs   = array (['page' => 'admin/slider', 'title' => 'sliders'], ['page' => 'admin/slider/edit/'.$id.'', 'title' =>'Edit']);
         return view('backend.admin.slider.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Slider  $slider
      * @return \Illuminate\Http\Response
      */
     public function update(SliderRequest $request)
     {
        
         $slider             = Slider::findOrFail($request->hidden_id);
         $slider->id         = $request->hidden_id;
         $slider->name       = $request->name;
         $slider->text       = $request->text;


         if ($request->hasFile('image')) {
            $old_path = Storage::disk()->path(Config::get('constants.IMAGES.SLIDER_IMAGE').'/'. $slider->image);
            if(File::exists($old_path)) {
                File::delete($old_path);
            }
            $image = $request->file('image');
            $save_name = $slider->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.SLIDER_IMAGE'), $save_name);
            $slider->image = $save_name;
        }
        if($slider->save()) {
             Toastr::success('Slider updated successfully!','', Config::get('constants.toster'));
             return redirect('/admin/slider');
        } else {
             Toastr::error('Slider  dose not updated!','', Config::get('constants.toster'));
             return redirect('/admin/slider/edit');
        }
     }
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Slider  $slider
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $slider = Slider::findOrFail($id);
       $old_path = Storage::disk()->path(Config::get('constants.IMAGES.SLIDER_IMAGE').'/'.$slider->image);
        if(File::exists($old_path)) {
            File::delete($old_path);
        }
        if($slider->delete()) {
          return response()->json(['success' => 'Slider deleted successfully!']);
        } else {
          return response()->json(['success' => 'Slider dose not delete!']);
        }
     }
}