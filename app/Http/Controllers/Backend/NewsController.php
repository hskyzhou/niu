<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Yajra\DataTables\Html\Builder;
use Exception;

class NewsController extends Controller
{
    public function index(Builder $builder)
    {
    	if (request()->ajax()) {
    		return datatables()->collection(News::all())
	        		->addColumn('action', 'backend.news.datatable')
	        		->make(true);
	    }

	    $customParameters = [
			'order' => [[3, 'asc'], [2, 'desc']],
		];

    	$html = $builder->columns([
            ['data' => 'id', 'name' => 'id', 'title' => '序号'],
            ['data' => 'zh_title', 'name' => 'zh_title', 'title' => '新闻标题'],
            ['data' => 'publish_at', 'name' => 'publish_at', 'title' => '发布时间'],
            ['data' => 'is_index', 'name' => 'is_index', 'title' => '是否显示首页'],
            ['data' => 'action', 'name' => 'action', 'title' => '操作'],
        ])
        ->ajax([
			'url' => route('admin.news.index'),
		    'type' => 'GET',
       	])
       	->parameters($customParameters);

    	return view('backend.news.list')->with(compact('html'));
    }

    public function create()
    {
    	return view('backend.news.create');
    }

    public function store()
    {
    	if (News::create(request()->all())) {
    		return redirect()->route('admin.news.index');
    	} else {
    		return rediect()->back();
    	}
    }

    public function edit($id)
    {
    	if ($info = News::find($id)) {
	    	return view('backend.news.edit')->with(compact('info'));
    	}

    	throw new Exception("新闻数据出错", 2);
    }

    public function update($id) {
    	if ($info = News::find($id)) {
	    	if ($info->update(request()->all())) {
	    		return redirect()->route('admin.news.index');
	    	} else {
	    		return rediect()->back();
	    	}
    	}

    	throw new Exception("新闻数据出错", 2);
    }

    public function destroy()
    {
    	if ($info = News::find($id)) {
	    	if ($info->destroy()) {
	    		return response()->json([
	    			'result' => true,
	    			'message' => '删除成功'
	    		]);
	    	} else {
	    		return response()->json([
	    			'result' => true,
	    			'message' => '删除失败'
	    		]);
	    	}
    	}

    	throw new Exception("新闻数据出错", 2);
    }

    public function setIndex($id)
    {
    	if ($info = News::find($id)) {
	    	if ($info->update(['is_index'=>1])) {
	    		return response()->json([
	    			'result' => true,
	    			'message' => '设置成功'
	    		]);
	    	} else {
	    		return response()->json([
	    			'result' => true,
	    			'message' => '设置失败'
	    		]);
	    	}
    	}

    	throw new Exception("新闻数据出错", 2);
    }
}
