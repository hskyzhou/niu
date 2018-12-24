<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\WechatService as Service;

class WechatController extends Controller
{
	protected $service;
	public function __construct(Service $service)
	{
		$this->service = $service;
	}

    public function store()
    {
    	return response()->json($this->service->store());
    }

    public function login()
    {
    	$code = request('code', '');
    	$app = app('wechat.mini_program');

    	$wechat = $app->auth->session($code);

    	dd($wechat);
    }
}
