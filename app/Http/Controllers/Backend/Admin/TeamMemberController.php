<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\TeamMemberRequest;
use App\Models\TeamMember;
use DataTables;
use Toastr;
use Config;
use Illuminate\Support\Facades\Storage;
use File;


class TeamMemberController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Team Members';
            $page_description  = '';
            $page_breadcrumbs  = '';

            if($request->ajax())
            {
                $users = TeamMember::query();

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $users->where(function($query) use ($search) {
                       $query->orWhere('name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('position', 'LIKE', '%' . $search . '%');
                       $query->orWhere('email', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $users->latest()->get();
                
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        $button = '<a href="/admin/team-member/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';

                        $button .= '<input data-switch="true" id="'.$data->id.'" type="checkbox" checked="checked"  />';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('backend.admin.team_member.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Team Member';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/team-member', 'title' => 'Team Members'],['page' => 'admin/team-member/add', 'title' =>'Add']);

        return view('backend.admin.team_member.add', compact('page_title', 'page_description', 'page_breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamMemberRequest $request)
    {   
        $teamMember             = new TeamMember;
        $teamMember->name       = $request->name;
        $teamMember->position   = $request->position;
        $teamMember->email      = $request->email;
        $teamMember->phone      = $request->phone;
        $teamMember->facebook   = $request->facebook;
        $teamMember->twitter    = $request->twitter;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $save_name = $teamMember->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.TEAM_MEMBER_IMAGE'), $save_name);
            $teamMember->file = $save_name;
        }
       if($teamMember->save()) {
        
        Toastr::success('Team member added successfully!','', Config::get('constants.toster'));
        return redirect('/admin/team-member');

       } else {
        Toastr::success('Team member dose not add!','', Config::get('constants.toster'));
        return redirect('/admin/team-member/add');
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
        $data               = TeamMember::findOrFail($id);
        $page_title         = 'Team Member';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/team-member', 'title' => 'Team Members'],['page' => 'admin/team-member/edit/'.$id.'', 'title' =>'Edit']);

        return view('backend.admin.team_member.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamMemberRequest $request)
    {   
        //dd($request);
        
        $teamMember             = TeamMember::findOrFail($request->hidden_id);
        $teamMember->name       = $request->name;
        $teamMember->position   = $request->position;
        $teamMember->email      = $request->email;
        $teamMember->phone      = $request->phone;
        $teamMember->facebook   = $request->facebook;
        $teamMember->twitter    = $request->twitter;

        if ($request->hasFile('file')) {
            $old_path = Storage::path(Config::get('constants.TEAM_MEMBER_IMAGE').'/'. $teamMember->file);
            if(File::exists($old_path)) {
                File::delete($old_path);
            }
            $image = $request->file('file');
            $save_name = $teamMember->title.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.TEAM_MEMBER_IMAGE'), $save_name);
            $teamMember->file = $save_name;
        }

       if($teamMember->save()) {
            Toastr::success('Team member updated successfully!','', Config::get('constants.toster'));
            return redirect('/admin/team-member');
       } else {
            Toastr::error('Team member  dose not update!','', Config::get('constants.toster'));
            return redirect('/admin/team-member/edit');
       }
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $teamMember = TeamMember::findOrFail($id);

       if($teamMember->delete()) {
         return response()->json(['success' => 'Team member deleted successfully!']);
       } else {
         return response()->json(['success' => 'Team member dose not delete!']);
       }
    }
}