<?php 

$router->group(['middleware' => ['auth'], 'namespace' => 'Backend'], function ($router) {

	/*用户*/
	require(__DIR__ . '/user.php');
});