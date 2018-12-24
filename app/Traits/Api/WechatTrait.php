<?php 

namespace App\Traits\Api;

Trait WechatTrait
{
	/**
	 * 验证微信登录
	 * @return [type] [description]
	 */
	public function checkWecahtLogin($openid, $sessionKey)
	{
		$wechatRepo = app(\App\Repositories\Interfaces\WechatRepository::class);

		$where = [
			'openid' => $openid,
			'session_key' => $sessionKey
		];
		
		if ($wechatInfo = $wechatRepo->findWhere($where)->first()) {
			return true;
		} else {
			throw new Exception("请重新登录", 401);
		}
	}
}