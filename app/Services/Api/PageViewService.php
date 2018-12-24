<?php 

namespace App\Services\Api;

use App\Services\Service;
use Exception;
use DB;
use App\Traits\ResultTrait;
use App\Traits\ServiceTrait;
use App\Services\Api\WechatTrait;

/**
 * Class WechatService.
 *
 * @package App\Services\Api
 */
class PageViewService extends Service
{
	use ServiceTrait, ResultTrait, WechatTrait;

	protected $storeFields = [
		'identify', 'openid', 'duration'
	];
	public function store()
	{
		$this->checkWecahtLogin(request('openid'), request('token'));
		
		request()->validate([
            'openid' => 'required',
            'identify' => 'required',
            'duration' => 'required',
        ],[
            'openid.required' => '微信openid不能为空',
            'identify.required' => '页面标识不能为空',
            'duration.required' => '页面时长不能为空',
        ]);

		$exception = DB::transaction(function () {
			$where = [
				'openid' => request('openid'),
				'identify' => request('identify'),
			];
			if ($pageView = $this->pageViewRepo->findWhere($where)->first()) {
				/*增加时长*/
				$pageView->duration = $pageView->duration + request('duration');
				if (!$pageView->save()) {
					throw new Exception("提交失败", 2);
				}
			} else {
				if (!$this->pageViewRepo->create(request()->only($this->storeFields))) {
					throw new Exception("提交失败", 2);
				}
			}
		});
		
		return array_merge($this->results, [
			'message' => '提交成功'
		]);
	}
}