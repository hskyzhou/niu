<?php 

namespace App\Traits\Services;

use Exception;

Trait UserTrait
{
	/**
	 * 设置用户密码
	 * @param [type] $user     [App\User]
	 * @param [type] $password [string]
	 */
	public function setPassword($user, $password)
	{
		if ($password) {
			$user->password = bcrypt($password);
			if (!$user->save()) {
				throw new Exception("设置密码失败", 2);
			}
		}
	}
}