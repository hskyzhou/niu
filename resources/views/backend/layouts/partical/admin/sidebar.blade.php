<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        @include('backend.layouts.partical.admin.sidebar.sidebar-ul', ['list' => $sidebarMenus, 'first' => true, 'highLightMenuIds' => $highLightMenuIds, 'sidebarMenuMaps' => $sidebarMenuMaps])
    </div>
</div>