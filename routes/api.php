<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->group(['namespace' => 'Api'], function ($router) {
	$router->group(['prefix' => 'wechat', 'as' => 'wechat.'], function ($router) {
		/*提交微信数据*/
		$router->post('/', [
			'uses' => 'WechatController@store',
			'as' => 'store',
		]);

		$router->post('login', [
			'uses' => 'WechatController@login',
			'as' => 'login',
		]);
	});

	$router->group(['prefix' => 'pageview', 'as' => 'pageview.'], function ($router) {
		/*提交页面时长数据*/
		$router->post('/', [
			'uses' => 'PageViewController@store',
			'as' => 'store',
		]);
	});

	$router->group(['prefix' => 'cardview', 'as' => 'cardview.'], function ($router) {
		/*提交卡片数据*/
		$router->post('/', [
			'uses' => 'CardViewController@store',
			'as' => 'store',
		]);
	});
});