<?php 

namespace App\Services;

class Service
{
	protected $userRepo;
	public function __construct()
	{
		$this->userRepo = app(\App\Repositories\Interfaces\UserRepository::class);
	}
}