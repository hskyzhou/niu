<?php 

namespace App\Services\Backend;

use App\Services\Service;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Traits\ResultTrait;
use App\Traits\Services\UserTrait;
use DB;
use Exception;

class UserService extends Service
{
	use ResultTrait, UserTrait;

	protected $updateField = [
		'name', 'email', 'mobile'
	];

	protected $createField = [
		'name', 'email', 'mobile'
	];

	protected $builder;
	public function __construct(Builder $builder)
	{
		parent::__construct();

		$this->builder = $builder;
	}
	public function index()
	{
		$html = $this->builder->columns([
		    ['data' => 'name', 'name' => 'name', 'title' => '姓名'],
		    ['data' => 'email', 'name' => 'email', 'title' => '邮箱'],
		    ['data' => 'mobile', 'name' => 'mobile', 'title' => '手机'],
		    ['data' => 'action', 'name' => 'action', 'title' => '操作'],
		])->ajax([
			'url' => route('admin.user.index'),
		    'type' => 'GET',
       	]);

		return compact('html');
	}	

	public function datatables()
	{
		return DataTables::of($this->userRepo->all())
				->addColumn('action', 'backend.user.datatable')
				->toJson();
	}

	public function edit($id)
	{
		$user = $this->userRepo->find($id);

		return [
			'user' => $user
		];
	}

	public function store()
	{
		DB::transaction(function () {
			if(!$user = $this->userRepo->create(request()->only($this->createField))) {
				throw new Exception("添加用户失败", 2);
			}

			/*设置密码*/
			$this->setPassword($user, request('password'));
		});

		return array_merge($this->results, [
			'message' => '添加用户成功'
		]);
	}

	public function update($id)
	{
		DB::transaction(function () use ($id) {
			if(!$user = $this->userRepo->update(request()->only($this->updateField), $id)) {
				throw new Exception("修改用户失败", 2);
			}
		});

		return array_merge($this->results, [
			'message' => '修改用户成功'
		]);
	}

	/**
	 * 删除用户
	 * @param  [type] $id [int]
	 * @return [type]     [array|exception]
	 */
	public function destroy($id)
	{
		$user = $this->userRepo->find($id);

		if (!$user->delete()) {
			throw new Exception("删除用户失败", 2);
		}

		return array_merge($this->results, [
			'message' => '删除用户成功'
		]);
	}

	public function passwordUpdate()
	{
		/*验证规则*/
		$this->checkResetRules();

		$exception = DB::transaction(function() {
			/*验证旧密码是否正确*/
			if(checkUserPasswordByWeb(request('oldpassword'))) {
				$user = getUser();
				/*设置密码*/
				$this->setPassword($user, request('newpassword'));
			} else {
				throw new Exception("旧密码错误", 2);
			}
		});

		return array_merge($this->results, [
			'message' => '修改密码成功',
		]);
	}

	/**
	 * 验证添加规则
	 * @return [type] [description]
	 */
	protected function checkResetRules()
	{
		/*验证规则*/
		$validatedData = request()->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required',
        ],[
            'oldpassword.required' => '旧密码不能为空',
            'newpassword.required' => '新密码不能为空',
            'newpassword_confirmation.required' => '确认新密码不能为空',
            'newpassword.confirmed' => '新密码和确认新密码不一致',
        ]);
	}

	/**
	 * 重置用户密码
	 * @param  [type] $id [int]
	 * @return [type]     [description]
	 */
	public function passwordReset($id)
	{
		$exception = DB::transaction(function() {
			$user = $this->userRepo->find($id);
			/*设置密码*/
			$this->setPassword($user, request('password', '123456'));
		});

		return array_merge($this->results, [
			'message' => '重置密码成功',
		]);
	}
}