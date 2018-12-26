<li class="nav-item start @if(in_array($menu->id, $highLightMenuIds)) active open @endif">
    <a @if(!$sidebarMenuMaps[$menu->id]->sonMenus->isNotEmpty()) href="{{$menu->urlRoute}}" @endif class="nav-link nav-toggle">
        <i class="{{ $menu->icon ?: 'icon-home'}}"></i>
        <span class="title">{{ app()->getLocale() == 'en' && $menu->en_name ? $menu->en_name : $menu->name }}</span>
        <span class="selected"></span>
        @if($sidebarMenuMaps[$menu->id]->sonMenus->isNotEmpty())
	        <span class="arrow"></span>
        @endif
    </a>
	
	@if($sidebarMenuMaps[$menu->id]->sonMenus->isNotEmpty())
	    @include('backend.layouts.partical.admin.sidebar.sidebar-ul', ['list' => $sidebarMenuMaps[$menu->id]->sonMenus,'first' => false])
	@endif
</li>