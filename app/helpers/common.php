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

//敏感词过滤
if (!function_exists('sensitiveWordFilter')) {
    function sensitiveWordFilter($str)
    {
        // $words = getSensitiveWords();
        $words = config('filter');   // 建议从文件或者缓存中读取敏感词列表，英文约定小写
        $flag = false;

        // 提取中文部分，防止其中夹杂英语等
        preg_match_all("/[\x{4e00}-\x{9fa5}]+/u", $str, $match);
        $chineseArray = $match[0];
        $chineseStr = implode('', $chineseArray);
        $englishStr = strtolower(preg_replace("/[^A-Za-z0-9\.\-]/", " ", $str));

        $flag_arr = array('？', '！', '￥', '（', '）', '：' , '‘' , '’', '“', '”', '《' , '》', '，',
            '…', '。', '、', 'nbsp', '】', '【' ,'～', '#', '$', '^', '%', '@', '!', '*', '-'. '_', '+', '=');

        $contentFilter = preg_replace('/\s/', '', preg_replace("/[[:punct:]]/", '',
            strip_tags(html_entity_decode(str_replace($flag_arr, '', $str), ENT_QUOTES, 'UTF-8'))));

        // 全匹配过滤,去除特殊字符后过滤中文及提取中文部分
        foreach ($words as $word) {
            // 判断是否包含敏感词,可以减少这里的判断来降低过滤级别，
            if (strpos($str, $word) !== false || strpos($contentFilter, $word) !== false || strpos($chineseStr, $word) !== false
                || strpos($englishStr, $word) !== false) {
                $flag = true;
            }
        }

        return $flag;
    }
}
