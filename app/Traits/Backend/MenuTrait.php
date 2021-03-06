<?php 

namespace App\Traits\Backend;

use Cache;

/**
 * Class MenuTrait
 *
 * @package App\Traits\Backend
 */
Trait MenuTrait
{
	/**
	 * 获取缓存菜单
	 * @return [type] [description]
	 */
	private function cachedAllMenu()
	{
		$key = getCacheAllMenu();

		return Cache::rememberForever($key, function() {
			$menus = $this->menuRepo->with(['sonMenus', 'parentMenu'])->get();
			$this->menuRepo->resetCriteria();
			return $menus;
		});
	}

	/**
	 * 获取缓存的用户菜单
	 * @return [type] [description]
	 */
	private function cachedUserMenu()
	{
		$key = getCacheUserMenu(getUserId());

		return Cache::rememberForever($key, function() {
			$user = getUser();

			$permissions = $user->allPermissions()->keyBy('name')->keys()->toArray();

			$menus = $this->menuRepo
						->with([
							'sonMenus' => function($query) use ($permissions) {
								$query->whereIn('permission', $permissions);
							}, 
							'parentMenu' => function($query) use ($permissions) {
								$query->whereIn('permission', $permissions);
							}
						])->findWhereIn('permission', $permissions);
			$this->menuRepo->resetCriteria();
			return $menus;
		});
	}

	/**
	 * 菜单列表
	 * @param  array  $permissions [description]
	 * @return [type]              [description]
	 */
	public function menuList($isUser = false)
	{
		/*获取菜单*/
		if($isUser) {
			$menus = $this->cachedUserMenu();
		} else {
			$menus = $this->cachedAllMenu();
		}

		return $menus->filter(function($item, $key) {
			if( $item->parentMenu->isNotEmpty() ) {
				return false;
			}

			return true;
		});
	}

	/**
	 * 高亮菜单
	 */
	public function highLightMenu($route, $routePrefix)
	{
		/*菜单*/
		$menuMaps = $this->cachedAllMenu()->keyBy('id');

		$menus = $this->menuRepo->findByField('route', $route);

		if($menus->isEmpty()) {
			$where = [
				'route_prefix' => $routePrefix
			];
			$menus = $this->menuRepo->findWhere($where);
		}

		return $this->getHighLightMenuIds($menus, $menuMaps);
	}

	private function getHighLightMenuIds($menus, $menuMaps)
	{
		$results = [];
		foreach($menus as $menu) {
			$results[] = $menu->id;
			if(isset($menuMaps[$menu->id]->parentMenu) && $menuMaps[$menu->id]->parentMenu->isNotEmpty()) {
				$results = array_merge($results, $this->getHighLightMenuIds($menuMaps[$menu->id]->parentMenu, $menuMaps));
			}
		}

		return $results;
	}

	public function menuBindParentMenu($menu, $parentMenuId)
	{
		if ($parentMenuId) {
			$menu->parentMenu()->attach($parentMenuId);
		}
	}
}