@extends('backend.layouts.admin')
@section('styles')
    <link href="{{ asset('vendor/umeditor/themes/default/css/umeditor.css')}}" type="text/css" rel="stylesheet">
@endsection
@section('content')
<div class="portlet light bordered form-fit">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">添加新闻</span>
        </div>
    </div>
    <div class="portlet-body form">
        @include('backend.layouts.partical.admin.error')
        <form action="" method="post" class="form-horizontal form-bordered form-row-stripped">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 分类名称</label>
                    <div class="col-md-9">
                        <input type="text" name="title_zh" value="{{old('title')}}" placeholder="中文名称" class="form-control">
                        <input type="text" name="title_en" value="{{old('title')}}" placeholder="英文名称" class="form-control margin-top-10">
                        <input type="text" name="title_jp" value="{{old('title')}}" placeholder="日文名称" class="form-control margin-top-10">
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="button" class="btn green pv-save-user-event">
                            <i class="fa fa-check"></i>添加</button>
                        <button type="button" class="btn default" onclick="javascript:window.history.go(-1);">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function(){
        $('.pv-save-user-event').click(function(){
            var that = $(this);
            var form = that.parents('form');
            var vf = PVJs.validForm(form);
            if(vf.check()){
                form.submit();
            }
        })
    })
</script>
@endsection