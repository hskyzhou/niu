<li class="dd-item" data-id="{{ $info->id}}">
    <div class="dd-handle"> {{ $info->name}} 
        <div class="pull-right action-buttons dd-nodrag">
            <a class="green" data-target="#php-ajax-modal-small" data-toggle="modal tooltip" data-placement="bottom" href="{{ route('admin.menu.create', ['id' => $info->id]) }}"  title="@lang('back/system.submenuAdd')">
                <i class="fa fa-plus font-green"></i>
            </a>
            
            <a class="blue" data-target="#php-ajax-modal-small" data-toggle="modal tooltip" data-placement="bottom" href="{{ route('admin.menu.edit', $info->id) }}" title="@lang('back/system.update')">
                <i class="fa fa-pencil font-blue"></i>
            </a>
    
            <a class="red" href="javascripts:;" data-url="{{ route('admin.menu.destroy', $info->id) }}" data-method="delete" data-confirm="" data-toggle="tooltip" data-placement="bottom" title="@lang('back/system.delete')">
                <i class="fa fa-trash-o font-red"></i>
            </a>
        </div>
    </div>
    @include('backend.menu.index-nestable-ol', ['list' => $menuMaps[$info->id]->sonMenus])
</li>