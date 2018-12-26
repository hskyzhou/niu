<?php 

$router->group(['prefix' => 'menu', 'as' => 'menu.'], function ($router) {
	/*列表*/
	$router->get('/', [
		'uses' => 'MenuController@index',
		'as' => 'index',
	]);

	/*添加*/
	$router->get('create', [
		'uses' => 'MenuController@create',
		'as' => 'create',
	]);

	$router->post('/', [
		'uses' => 'MenuController@store',
		'as' => 'store',
	]);

	/*修改*/
	$router->get('{id}/edit', [
		'uses' => 'MenuController@edit',
		'as' => 'edit',
	]);

	$router->put('{id}', [
		'uses' => 'MenuController@update',
		'as' => 'update',
	]);

	/*删除*/
	$router->delete('destroy/{id}', [
		'uses' => 'MenuController@destroy',
		'as' => 'destroy',
	]);

	
});