<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisaQuestion;
use DataTables;
use Toastr;
use Config;
use App\Http\Requests\Backend\VisaQuestionRequest;

class VisaQuestionController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {   
             $page_title        = 'Visa Questions';
             $page_description  = '';
             $page_breadcrumbs  = '';
 
             if($request->ajax())
             {
                 $question = VisaQuestion::Query();
 
                 // Search for a services based on their name.
                 if ($request->has('search') && ! is_null($request->get('search'))) {
                     $search = $request->get('search');
                     $question->where(function($query) use ($search) {
                        $query->orWhere('lable', 'LIKE', '%' . $search . '%');
                     });
                 }
 
                 $data = $question->latest()->get();
                 
                 return DataTables::of($data)
                     ->addColumn('action', function($data) {
                         $button = '<a href="/admin/visa-question/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit"></i></a>
                         ';
                         $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
 
                         
                         return $button;
                     })
                     ->addColumn('url', function($data) {
                        $button = '<a href="'.$data->value.'" target="_blank"  name="edit" id="'.$data->id.'">'.$data->value.'</a>';
                        return $button;
                    })
                     ->rawColumns(['action','url'])
                     ->make(true);
             }
 
             return view('backend.admin.visa_question.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     public function create(Request $request)
     {   
         $page_title         = 'Visa Question';
         $page_description   = '';
         $page_breadcrumbs   = array(['page' => 'admin/visa-question', 'title' => 'Visa Questions'],['page' => 'admin/visa-question/add', 'title' =>'Add']);
     
         return view('backend.admin.visa_question.add', compact('page_title', 'page_description', 'page_breadcrumbs'));
 
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(VisaQuestionRequest $request)
     {   

         $question               = new VisaQuestion;
         $question->lable        = $request->lable;
         $question->value        = $request->value;
         $question->status       = $request->status;
 
        if($question->save()) {
         
         Toastr::success('Visa question added successfully!','', Config::get('constants.toster'));
         return redirect('/admin/visa-question');
 
        } else {
         Toastr::success('Visa question dose not added!','', Config::get('constants.toster'));
         return redirect('/admin/visa-question/add');
        }
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\VisaQuestion  $Question
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $data               = VisaQuestion::findOrFail($id);
         $page_title         = 'Visa Question';
         $page_description   = '';
         $page_breadcrumbs   = array(['page' => 'admin/visa-question', 'title' => 'VisaQuestions'],['page' => 'admin/visa-question/edit/'.$id.'', 'title' =>'Edit']);
     
         return view('backend.admin.visa_question.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\VisaQuestion  $Question
      * @return \Illuminate\Http\Response
      */
     public function update(VisaQuestionRequest $request, $id)
     {
         $question             = VisaQuestion::findOrFail($id);
         $question->id         = $id;
         $question->lable      = $request->lable;
         $question->value      = $request->value;
         $question->status     = $request->status;
 
        if($question->save()) {
             Toastr::success('Visa question updated successfully!','', Config::get('constants.toster'));
             return redirect('/admin/visa-question');
        } else {
             Toastr::error('Visa question dose not updated!','', Config::get('constants.toster'));
             return redirect('/admin/visa-question/edit');
        }
     
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\VisaQuestion  $Question
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $question = VisaQuestion::findOrFail($id);
 
        if($question->delete()) {
          return response()->json(['success' => 'visa question deleted successfully!']);
        } else {
          return response()->json(['success' => 'visa question dose not delete!']);
        }
     }
}