<?php

namespace App\Http\Controllers\Backend\Processor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompletedServiceController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('backend.processor.dashboard', compact('page_title', 'page_description'));
    }
}
