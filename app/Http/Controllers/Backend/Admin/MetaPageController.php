<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MetaPage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use App\Http\Requests\Backend\MetaPageRequest;
use Toastr;

class MetaPageController extends Controller
{
    public function index(Request $request)
    {
        $page_title         = 'Meta Page';
        $page_description   = '';
        $page_breadcrumbs   = '';
        $pages = Config::get('constants.PAGE');
        $data = MetaPage::first();

        return view('backend.admin.pages.meta_page', compact('page_title', 'page_description', 'page_breadcrumbs','data','pages'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetaPAge  $country
     * @return \Illuminate\Http\Response
     */
    public function edit($page)
    {
        if(request()->ajax())
        {
            $data = MetaPAge::where('page',$page)->first();
            if($data == NULL) {
                $data = '';
            }
            return response()->json(['result' => $data]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetaPage  $metaPage
     * @return \Illuminate\Http\Response
     */
    public function store(MetaPageRequest $request)
    {
        $slug = Str::slug($request->page, "-");

        if($request->hidden_id != '') {
            $page           = MetaPage::findOrFail($request->hidden_id);
        } else {
            $page           = new MetaPage;
        }
        $page->page         = $request->page;
        $page->slug         = $slug;
        $page->title        = $request->title;
        $page->description  = $request->description;
        $page->keywords     = $request->keywords;
        $page->id           = $request->hidden_id;
        
       if($page->save()) {
           $data = MetaPage::where('slug', $slug)->first();
            if($request->hidden_id != '') {
                Toastr::success('Meta page updated successfully!','', Config::get('constants.toster'));
                return redirect('/admin/meta-page')->with( ['data' => $data] );
            } else {
                Toastr::success('Meta page added successfully!','', Config::get('constants.toster'));
                return redirect('/admin/meta-page')->with( ['data' => $data] );
            }
       } else {
        Toastr::success('Meta page dose not added!','', Config::get('constants.toster'));
        return redirect('/admin/meta-page');
       }

    }

}
