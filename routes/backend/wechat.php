<?php 

$router->group(['prefix' => 'wechat', 'as' => 'wechat.'], function ($router) {

	/*密码处理操作*/
	$router->group(['prefix' => 'password', 'as' => 'password.'], function ($router) {
		$router->put('reset/{id}', [
			'uses' => 'WechatController@passwordReset',
			'as' => 'reset',
		]);

		/*密码修改*/
		$router->get('edit', [
			'uses' => 'WechatController@passwordEdit',
			'as' => 'edit'
		]);

		$router->put('update', [
			'uses' => 'WechatController@passwordUpdate',
			'as' => 'update'
		]);
	});
	
	/*列表*/
	$router->get('/', [
		'uses' => 'WechatController@index',
		'as' => 'index',
	]);

	/*添加*/
	$router->get('create', [
		'uses' => 'WechatController@create',
		'as' => 'create',
	]);

	$router->post('/', [
		'uses' => 'WechatController@store',
		'as' => 'store',
	]);

	/*修改*/
	$router->get('{id}/edit', [
		'uses' => 'WechatController@edit',
		'as' => 'edit',
	]);

	$router->put('{id}', [
		'uses' => 'WechatController@update',
		'as' => 'update',
	]);

	/*删除*/
	$router->delete('destroy/{id}', [
		'uses' => 'WechatController@destroy',
		'as' => 'destroy',
	]);

	
});