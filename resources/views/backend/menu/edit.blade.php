@extends('backend.layouts.admin')

@section('content')
<div class="portlet light bordered form-fit">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">修改菜单</span>
        </div>
    </div>
    <div class="portlet-body form">
        @include('backend.layouts.partical.admin.error')
        <form action="{{ route('admin.menu.update', [$menu->id]) }}" class="form-horizontal form-bordered form-row-stripped" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <input type="hidden" name="parent_id" value="{{ $parentMenu['id'] }}" >
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">父级菜单</label>
                    <div class="col-md-9">
                        <input type="text" value="{{ $parentMenu['name']}}" readonly class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 菜单名称</label>
                    <div class="col-md-9">
                        <input type="text" name="name" placeholder="请填写菜单名称" class="form-control" datatype="*" value="{{$menu->name}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 菜单路由</label>
                    <div class="col-md-9">
                        <input type="text" name="route" value="{{old('route', $menu->route)}}" placeholder="请填写菜单路由" class="form-control" datatype="*">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">菜单图标</label>
                    <div class="col-md-9">
                        <input type="text" name="icon" value="{{old('icon', $menu->icon)}}" placeholder="请填写菜单图标" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em>菜单权限</label>
                    <div class="col-md-9">
                        <input type="text" name="permission" value="{{old('permission', $menu->permission)}}" placeholder="请填写菜单权限" class="form-control" datatype="*">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3">菜单描述</label>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3" name="description" placeholder="请填写菜单描述">{{old('description', $menu->description)}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green">
                            <i class="fa fa-check"></i>提交</button>
                        <button type="button" class="btn default" data-dismiss="modal">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function(){
        //保存操作
        $('.pv-add-menu-event').click(function(){
            var that = $(this),
                form = that.parents('form'),
                close = form.find('[data-dismiss]');

                var vf = PVJs.validForm(form);

                if(vf.check()){
                    PVJs.ajax({
                        url: form.attr('data-url'),
                        type: form.attr('data-method'),
                        data: form.serializeArray(),
                        success: function(resp){
                            layer.msg(resp.message);
                            if(resp.result){
                                close.trigger('click');
                                location.reload();
                            }
                        }
                    })
                }else{
                    layer.msg("@lang('back/system.DataValidationFailure')！");
                }
        });
    })
</script>
@endpush
