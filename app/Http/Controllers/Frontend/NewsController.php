<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Exception;

class NewsController extends Controller
{
    public function index()
    {
    	if (request()->ajax()) {
    		$page = request('page', 1);
    		$per = 9;
    		$offset = ($page - 1) * $per;
    		$news = News::limit($per)->offset($offset)->get()->map(function ($item, $key) {
    			return [
    				'content' => str_limit(strip_tags($item->content), 30),
    				'title' => $item->title,
    				'publish_at' => $item->publish_at,
                    'thumb' => $item->thumb,
    			];
    		});
    	}
    	return view('frontend.news.list');
    }

    public function show($id)
    {
    	if ($info = News::find($id)) {
	    	return view('frontend.news.detail')->with(compact('info'));
    	}

    	throw new Exception("获取数据失败", 2);
    	
    }


}
