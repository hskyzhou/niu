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
                    <label class="control-label col-md-3"><em class="font-red">* </em> 显示到首页</label>
                    <div class="col-md-9">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1"> 是</label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2" checked> 否 </label>
                        </div>
                        <span class="help-inline"> 首页只显示最新设置的三条新闻. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻标题</label>
                    <div class="col-md-9">
                        <input type="text" name="title_zh" value="{{old('title')}}" placeholder="中文标题" class="form-control">
                        <input type="text" name="title_en" value="{{old('title')}}" placeholder="英文标题" class="form-control margin-top-10">
                        <input type="text" name="title_jp" value="{{old('title')}}" placeholder="日文标题" class="form-control margin-top-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 发稿日期</label>
                    <div class="col-md-9">
                        <input type="text" name="publish_date" data-type="laydate" placeholder="发稿日期" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻分类</label>
                    <div class="col-md-9">
                        <select name="categroy" class="form-control">
                            <option value="1">新闻</option>
                            <option value="2">快讯</option>
                            <option value="3">专访</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻详情</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>中文：</h4>
                                <script type="text/plain" id="zhEditor" style="width:100%;height:240px;">
                                     <p>这里我可以写一些输入提示</p>
                                 </script>
                            </div>
                            <div class="col-md-12 margin-top-10">
                                <h4>英文：</h4>
                                <script type="text/plain" id="enEditor" style="width:100%;height:240px;">
                                     <p>这里我可以写一些输入提示</p>
                                 </script>
                            </div>
                            <div class="col-md-12 margin-top-10">
                                <h4>日文：</h4>
                                <script type="text/plain" id="jpEditor" style="width:100%;height:240px;">
                                     <p>这里我可以写一些输入提示</p>
                                 </script>
                            </div>
                        </div>
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
<script type="text/javascript" charset="utf-8" src="{{ asset('vendor/umeditor/umeditor.config.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ asset('vendor/umeditor/umeditor.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/umeditor/lang/zh-cn/zh-cn.js') }}"></script>
<script>
    $(function(){
         var zhUM = UM.getEditor('zhEditor');
         var enUM = UM.getEditor('enEditor');
         var jpUM = UM.getEditor('jpEditor');

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