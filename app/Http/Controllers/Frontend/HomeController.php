<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class HomeController extends Controller
{
    public function index()
    {
    	$lastestNews = News::orderBy('is_index', 'asc')->orderBy('publish_at', 'desc')->limit(3)->get();

    	return view('frontend.home.index')->with(compact('lastestNews'));
    }
}
