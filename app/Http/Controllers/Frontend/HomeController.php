<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $member_list = TeamMember::get();
        return view('frontend.home', compact(['member_list']));
    }
}
