<?php 

/**
 * 获取global的配置
 */
if ( !function_exists('getGlobalConfig') ) 
{
	function getGlobalConfig($key) 
	{
		return config('backend.global.' . $key);
	}
}

/**
 * 获取cache前缀
 */
if( !function_exists('getCachePrefix')) {
	function getCachePrefix($key = '')
	{
		return getGlobalConfig('cache.prefix') . $key;
	}
}