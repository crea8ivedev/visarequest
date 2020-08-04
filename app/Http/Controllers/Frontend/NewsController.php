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
        $page_title       = 'News';
        return view('frontend.news.news', compact('newsList','page_title'));
    }

    public function getNewsDetails(Request $request)
    {   
        $news = News::where('slug', $request->slug)->first();
        $page_title       = 'News-'.$news->heading;
        return view('frontend.news.details', compact('news','page_title'));
    }
}