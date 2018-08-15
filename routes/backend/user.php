<?php 

$router->group(['prefix' => 'user', 'as' => 'user.'], function ($router) {

	/*密码处理操作*/
	$router->group(['prefix' => 'password', 'as' => 'password.'], function ($router) {
		$router->put('reset/{id}', [
			'uses' => 'UserController@passwordReset',
			'as' => 'reset',
		]);

		/*密码修改*/
		$router->get('edit', [
			'uses' => 'UserController@passwordEdit',
			'as' => 'edit'
		]);

		$router->put('update', [
			'uses' => 'UserController@passwordUpdate',
			'as' => 'update'
		]);
	});
	
	/*列表*/
	$router->get('/', [
		'uses' => 'UserController@index',
		'as' => 'index',
	]);

	/*添加*/
	$router->get('create', [
		'uses' => 'UserController@create',
		'as' => 'create',
	]);

	$router->post('/', [
		'uses' => 'UserController@store',
		'as' => 'store',
	]);

	/*修改*/
	$router->get('{id}/edit', [
		'uses' => 'UserController@edit',
		'as' => 'edit',
	]);

	$router->put('{id}', [
		'uses' => 'UserController@update',
		'as' => 'update',
	]);

	/*删除*/
	$router->delete('destroy/{id}', [
		'uses' => 'UserController@destroy',
		'as' => 'destroy',
	]);

	
});