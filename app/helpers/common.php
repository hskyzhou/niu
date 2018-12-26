<?php 

if ( !function_exists('getRouteParam') ) {
	function getRouteParam($key)
	{
		return request()->route($key) ?: '';
	}
}

/**
 * 获取当前登录用户
 */
if ( !function_exists('getUser') ) {
	function getUser()
	{
		return auth()->user();
	}
}

/**
 * 获取当前登录用户id
 */
if ( !function_exists('getUserId') ) {
	function getUserId()
	{
		$user = getUser();

		return $user->id;
	}
}

/**
 * 验证用户登录密码是否正确
 */
if ( !function_exists('checkUserPasswordByWeb') ) {
	function checkUserPasswordByWeb($password)
	{
		$user = getUser();

		$credentials = [
			'password' => $password
		];

		/*验证用户密码是否正确*/
		return checkUserPassword($user, $credentials);
	}
}

if( !function_exists('checkUserPassword')) {
	function checkUserPassword($user, $credentials)
	{
		/*验证用户密码是否正确*/
		return auth()->guard()->getProvider()->validateCredentials($user, $credentials);
	}
}