<?php 

$router->group(['middleware' => ['auth'], 'namespace' => 'Backend'], function ($router) {

	/*用户*/
	require(__DIR__ . '/user.php');

	/*菜单*/
	require(__DIR__ . '/menu.php');
});