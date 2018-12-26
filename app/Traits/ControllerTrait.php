<?php 

namespace App\Traits;

/**
 * Class ControllerTrait
 *
 * @package App\Traits
 */
Trait ControllerTrait
{
	/*获取路由前缀*/
    public function routeHighLightPrefix()
    {
        $this->routeHighLightPrefix = isset($this->routeHighLightPrefix) && $this->routeHighLightPrefix ? $this->routeHighLightPrefix : $this->routePrefix;
        return isset($this->routeHighLightPrefix) && $this->routeHighLightPrefix ? $this->routeHighLightPrefix : '';
    }

    /*获取路由前缀*/
    public function routePrefix()
    {
        return isset($this->routePrefix) && $this->routePrefix ? $this->routePrefix : '';
    }
}