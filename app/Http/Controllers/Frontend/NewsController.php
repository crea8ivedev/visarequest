<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function getNews(Request $request)
    {   
        $newsList = News::with('country')->latest()->get();
        return view('frontend.news.news', compact('newsList'));
    }
}
