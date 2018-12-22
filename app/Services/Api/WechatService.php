<?php 

namespace App\Services\Api;

use App\Services\Service;
use Exception;
use DB;
use App\Traits\ResultTrait;
use App\Traits\ServiceTrait;

/**
 * Class WechatService.
 *
 * @package App\Services\Api
 */
class WechatService extends Service
{
	use ServiceTrait, ResultTrait;

	protected $storeFields = [
		'avatar', 'openid', 'name'
	];
	public function store()
	{
		request()->validate([
            'avatar' => 'required',
            'name' => 'required',
            'openid' => 'required',
        ],[
            'avatar.required' => '头像不能为空',
            'name.required' => '微信名不能为空',
            'openid.required' => '微信openid不能为空',
        ]);

		$exception = DB::transaction(function () {
			if (!$this->wechatRepo->create(request()->only($this->storeFields))) {
				throw new Exception("提交失败", 2);
			}
		});
		
		return array_merge($this->results, [
			'message' => '提交成功'
		]);
	}
}