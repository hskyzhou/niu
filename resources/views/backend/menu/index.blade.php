@extends('backend.layouts.admin')

@section('styles')
<link href="{{ asset('/vendor/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">菜单管理</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <a href="{{ route('admin.menu.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>添加菜单</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		<div class="dd" id="nestable_list_1" data-method="post">
		        	@include('backend.menu.index-nestable-ol', ['list' => $menus])
		        </div>
        	</div>
        </div>
    </div>
</div>
@endsection

@push('js')
	<script src="{{ asset('/vendor/jquery-nestable/jquery.nestable.js') }}" type="text/javascript"></script>

	<script>
		
		var defaultNestableValue = '';
		$(document).on('ready', function() {
			{{-- 默认nestable的值 --}}
			var nestableEl = $('#nestable_list_1');
			PVJs.tooltip(nestableEl);
			PVJs.modal(nestableEl);

			PVJs.tableAction(nestableEl,function(resp,el){
				if(resp.result && el.attr('data-method') == "delete"){
					window.location.reload();
				}
			});

			
			// nestable 排序操作
			nestableEl.nestable({
				group: 1
			}).on('change', function(){
				var changeNestableValue = window.JSON.stringify(nestableEl.nestable('serialize'));
				console.log(changeNestableValue);
				{{-- 不相同则提交 --}}
				if(defaultNestableValue != changeNestableValue) {
					PVJs.ajax({
						url : $(this).data('url'),
						type : $(this).data('method'),
						data : {
							'data' : changeNestableValue
						},
						dataType : 'json',
						beforeSend : function(xhr) {
							xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token()}}')
						},
						success: function(resp){
							layer.msg(resp.message);
							defaultNestableValue = changeNestableValue;
						}
					})
				}
	        });
	        // nestable CRUD
	        $('.dd-handle').on('click','.action-buttons>a',function(e){
	        	e.stopPropagation();
	        })

			defaultNestableValue = window.JSON.stringify(nestableEl.nestable('serialize'));
		});

		
	</script>
@endpush