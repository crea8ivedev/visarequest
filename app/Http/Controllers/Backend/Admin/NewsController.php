<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Country;
use DataTables;
use Toastr;
use Config;
use App\Http\Requests\Backend\NewsRequest;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {   
             $page_title        = 'News';
             $page_description  = '';
             $page_breadcrumbs  = '';
 
             if($request->ajax())
             {
                 $news = News::Query();
 
                 // Search for a services based on their name.
                 if ($request->has('search') && ! is_null($request->get('search'))) {
                     $search = $request->get('search');
                     $news->where(function($query) use ($search) {
                        $query->orWhere('message', 'LIKE', '%' . $search . '%');
                        $query->orWhere('heading', 'LIKE', '%' . $search . '%');
                     });
                 }
 
                 $data = $news->with('country')->latest()->get();
                 
                 return DataTables::of($data)
                     ->addColumn('action', function($data) {
                         $button = '<a href="/admin/news/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit"></i></a>
                         ';
                         $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
 
                         
                         return $button;
                     })
                     ->editColumn('heading', function($data) {
                         $headng = '<strong>'.$data->heading.'</strong><br>';

                         $message = strip_tags(html_entity_decode($data->message));
                         (strlen($message) > 20) ? substr($message,0,20).'...' : $message;

                         return $headng .$message;
                     })
                     ->editColumn('date', function($data) {
                        $date = $data->created_at;
                        if ($date != null) {
                          return date('d-M-Y', strtotime($date));
                        } else {
                         return '-';
                         
                        }
                     })
                     
                     ->rawColumns(['heading','action'])
                     ->make(true);
             }
 
             return view('backend.admin.news.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     public function create(Request $request)
     {   
         $page_title         = 'Add News';
         $page_description   = '';
         $page_breadcrumbs   = array(['page' => 'admin/news', 'title' => 'news'],['page' => 'admin/news/add', 'title' =>'Add']);
         $country_list       = Country::oldest('name')->get();
 
         return view('backend.admin.news.add', compact('page_title', 'page_description', 'page_breadcrumbs', 'country_list'));
 
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(NewsRequest $request)
     {   
         $news                  = new News;
         $news->country_id      = $request->country_id;
         $news->heading         = $request->heading;
         $news->message         = $request->message;
         $news->slug =  Str::slug($request->heading, '-');

        if($news->save()) {
         
         Toastr::success('News added successfully!','', Config::get('constants.toster'));
         return redirect('/admin/news');
 
        } else {
         Toastr::success('News dose not added!','', Config::get('constants.toster'));
         return redirect('/admin/news/add');
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
         $data               = news::findOrFail($id);
         $page_title         = 'Edit News';
         $page_description   = '';
         $page_breadcrumbs   = array(['page' => 'admin/news', 'title' => 'news'],['page' => 'admin/news/edit/'.$id.'', 'title' =>'Edit']);
         $country_list       = Country::oldest('name')->get();
 
         return view('backend.admin.news.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs', 'country_list'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\User  $user
      * @return \Illuminate\Http\Response
      */
     public function update(newsRequest $request)
     {
        
         $news             = news::findOrFail($request->hidden_id);
         $news->id         = $request->hidden_id;
         $news->country_id = $request->country_id;
         $news->heading    = $request->heading;
         $news->message    = $request->message;
         $news->slug =  Str::slug($request->heading, '-');

        if($news->save()) {
             Toastr::success('News updated successfully!','', Config::get('constants.toster'));
             return redirect('/admin/news');
        } else {
             Toastr::error('News dose not updated!','', Config::get('constants.toster'));
             return redirect('/admin/news');
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
       $news = News::findOrFail($id);
 
        if($news->delete()) {
          return response()->json(['success' => 'News deleted successfully!']);
        } else {
          return response()->json(['success' => 'News dose not delete!']);
        }
     }
}