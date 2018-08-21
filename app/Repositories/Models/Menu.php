<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Menu.
 *
 * @package namespace App\Repositories\Models;
 */
class Menu extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'route', 'icon', 'permission', 'description', 'sort', 'route_prefix',
    ];

    public function parentMenu()
    {
    	return $this->morphToMany(Menu::class, 'recursive', 'recursive_relations', 'current_id', 'recursive_id');
    }

    public function sonMenus()
    {
    	return $this->morphToMany(Menu::class, 'recursive', 'recursive_relations', 'recursive_id', 'current_id')
                    ->orderBy('sort', 'asc');
    }

    public function getUrlRouteAttribute()
    {
        $urlRoute = url('/');
        try {
            $urlRoute = route($this->route);
        } catch (\Exception $e) {
            
        }
        return $urlRoute;
    }
}
