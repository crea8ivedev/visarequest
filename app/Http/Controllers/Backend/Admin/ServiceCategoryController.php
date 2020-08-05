<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use App\Models\Icons;
use Illuminate\Support\Str;
use Toastr;
use Config;
use DataTables;


class ServiceCategoryController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Categories';
        $page_description  = '';
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = ServiceCategory::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('name', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/service-category/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/> ';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.service-category.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Category';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/service-category', 'title' => 'Categories'],['page' => 'admin/service-category/add', 'title' =>'Add']);
        $icons = Icons::get();
        return view('backend.admin.service-category.add', compact('page_title', 'page_description', 'page_breadcrumbs','icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCategoryRequest $request)
    {   
        $serviceCategory             = new ServiceCategory;
        $serviceCategory->name = $request->name;
        $serviceCategory->description = $request->description;
        $serviceCategory->slug =  Str::slug($request->name, '-');
        if ($serviceCategory->save()) {
            Toastr::success('Category added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service-category');
        } else {
            Toastr::error('Category  dose not added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service-category/add');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = ServiceCategory::findOrFail($id);
        $page_title         = 'Category';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/service-category', 'title' => 'Categories'],['page' => 'admin/service-category/edit/'.$id.'', 'title' =>'Edit']);
        return view('backend.admin.service-category.edit', compact('data', 'page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCategoryRequest $request, $id)
    {
        $serviceCategory             = ServiceCategory::findOrFail($id);
        $serviceCategory->name = $request->name;
        $serviceCategory->description = $request->description;
        $serviceCategory->slug =  Str::slug($request->name, '-');
        if ($serviceCategory->save()) {
            Toastr::success('Category updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service-category');
        } else {
            Toastr::error('Category  dose not update successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service-category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);
        if ($serviceCategory->delete()) {
            return response()->json(['success' => 'Category deleted successfully.']);
        } else {
            return response()->json(['success' => 'Category dose not deleted successfully.']);
        }
    }
}