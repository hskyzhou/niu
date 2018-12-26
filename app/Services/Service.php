<?php 

namespace App\Services;

class Service
{
	protected $userRepo;
	protected $menuRepo;
	protected $wechatRepo;
	protected $pageViewRepo;
	protected $cardViewRepo;
	public function __construct()
	{
		$this->userRepo = app(\App\Repositories\Interfaces\UserRepository::class);
		$this->menuRepo = app(\App\Repositories\Interfaces\MenuRepository::class);
		$this->wechatRepo = app(\App\Repositories\Interfaces\WechatRepository::class);
		$this->pageViewRepo = app(\App\Repositories\Interfaces\PageViewRepository::class);
		$this->cardViewRepo = app(\App\Repositories\Interfaces\CardViewRepository::class);
	}
}