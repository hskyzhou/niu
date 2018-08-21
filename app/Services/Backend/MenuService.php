<?php 

namespace App\Services\Backend;

use App\Services\Service;
use Exception;
use DB;
use App\Traits\ResultTrait;
use App\Traits\ServiceTrait;
use App\Traits\Backend\MenuTrait;

/**
 * Class MenuService.
 *
 * @package App\Services\Backend
 */
class MenuService extends Service
{
	use MenuTrait;
	use ServiceTrait, ResultTrait;

	public function index(){
		$menus = $this->menuList();

		$menuMaps = $this->cachedAllMenu()->keyBy('id');

		return [
			'menus' => $menus,
			'menuMaps' => $menuMaps,
		];
	}

	public function create(){
		$id = request('id', 0);

		$parentMenu = $id ? $this->menuRepo->find($id) : [];
		$parentMenu = $this->parentMenu($parentMenu);

		return [
			'parentMenu' => $parentMenu,
		];
	}

	public function store(){
		DB::transaction(function(){
			if (!$menu = $this->menuRepo->create(request()->all())) {
				throw new Exception("菜单添加失败", 2);
			}

			/*执行绑定父级菜单*/
			$this->menuBindParentMenu($menu, request('parent_id'));

			\Artisan::call("cache:clear");
		});
		
		return array_merge($this->results, [
			'message' => '菜单添加成功',
		]);
	}

	public function edit($id){
		/*修改的菜单*/
		$menu = $this->menuRepo->find($id);

		/*父级菜单*/
		$parentMenu = $this->parentMenu($menu->parentMenu->first());

		return [
			'menu' => $menu,
			'parentMenu' => $parentMenu,
		];
	}

	private function parentMenu($parentMenu)
	{
		$defaultParentMenu = [
			'id_hash' => 0,
			'id' => 0,
			'name' => '顶级菜单'
		];

		return $parentMenu ? $parentMenu->toArray() : $defaultParentMenu;
	}

	public function update($id){
		$exception = DB::transaction(function() use ($id){
			$data = request()->all();

			if (!$menu = $this->menuRepo->update($data, $id)) {
				throw new Exception("修改菜单失败", 2);
			}

			/*执行绑定父级菜单*/
			$this->menuBindParentMenu($menu, request('parent_id'));

			\Artisan::call("cache:clear");
		});
		
		return array_merge($this->results, [
			'message' => '修改菜单成功'
		]);
	}

	/**
	 * 删除菜单
	 * @param  [type] $id [菜单id]
	 * @return [type]     [description]
	 */
	public function destroy($id){
		$exception = DB::transaction(function() use ($id){
			/*获取菜单*/
			$menu = $this->menuRepo->find($id);
			if (!$menu->delete()) {
				throw new Exception("菜单删除失败", 2);
			} 

			/*清除菜单缓存*/
			\Artisan::call("cache:clear");
		});
		return array_merge($this->results, [
			'message' => '菜单删除成功'
		]);
	}
}