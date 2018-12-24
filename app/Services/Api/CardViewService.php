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
class CardViewService extends Service
{
	use ServiceTrait, ResultTrait, WechatTrait;

	protected $storeFields = [
		'openid', 'identify'
	];

	public function store()
	{
		$this->checkWecahtLogin(request('openid'), request('token'));
		
		request()->validate([
            'openid' => 'required',
            'identify' => 'required',
        ],[
            'openid.required' => '微信openid不能为空',
            'identify.required' => '卡片标识不能为空',
        ]);

		$exception = DB::transaction(function () {
			$where = [
				'openid' => request('openid'),
				'identify' => request('identify'),
			];
			if ($cardView = $this->cardViewRepo->findWhere($where)->first()) {
				/*增加时长*/
				$cardView->total = $cardView->total + 1;
				if (!$cardView->save()) {
					throw new Exception("提交失败", 2);
				}
			} else {
				if ($cardView = $this->cardViewRepo->create(request()->only($this->storeFields))) {
					$cardView->total = 1;
					if (!$cardView->save()) {
						throw new Exception("提交失败", 2);
					}
				} else {
					throw new Exception("提交失败", 2);
				}
			}
		});
		
		return array_merge($this->results, [
			'message' => '提交成功'
		]);
	}
}