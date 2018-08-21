<?php 

namespace App\Services;

class Service
{
	protected $userRepo;
	protected $menuRepo;
	public function __construct()
	{
		$this->userRepo = app(\App\Repositories\Interfaces\UserRepository::class);
		$this->menuRepo = app(\App\Repositories\Interfaces\MenuRepository::class);
	}
}