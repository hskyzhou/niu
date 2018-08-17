@extends('backend.layouts.admin')
@section('styles')
    <link href="{{ asset('vendor/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    @include('vendor.ueditor.assets')
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
        <form action="{{route('admin.news.store')}}" method="post" class="form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 显示到首页</label>
                    <div class="col-md-9">
                        <div class="radio-list">
                            <label class="radio-inline">
                                <input type="radio" name="is_index" id="optionsRadios4" value="1"> 是</label>
                            <label class="radio-inline">
                                <input type="radio" name="is_index" id="optionsRadios5" value="2" checked> 否 </label>
                        </div>
                        <span class="help-inline"> 首页只显示最新设置的三条新闻. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻标题</label>
                    <div class="col-md-9">
                        <input type="text" name="zh_title" value="{{old('title')}}" placeholder="中文标题" class="form-control">
                        <input type="text" name="en_title" value="{{old('title')}}" placeholder="英文标题" class="form-control margin-top-10">
                        <input type="text" name="jp_title" value="{{old('title')}}" placeholder="日文标题" class="form-control margin-top-10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 发稿日期</label>
                    <div class="col-md-9">
                        <input type="text" name="publish_at" data-type="laydate" readonly placeholder="发稿日期" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻分类</label>
                    <div class="col-md-9">
                        <select name="category" class="form-control">
                            <option value="1">新闻</option>
                            <option value="2">快讯</option>
                            <option value="3">专访</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻列表图</label>
                    <div class="col-md-9">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 360px; height: 218px;">
                                <img src="http://www.placehold.it/360x218/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 360px; max-height: 218px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists"> Change </span>
                                    <input type="file" name="thumb"> </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                            </div>
                        </div>
                        <div class="clearfix margin-top-10">
                            <span class="label label-danger">备注：</span> 必须保证图片大小为360x218的大小，不然到了页面会很丑</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 新闻详情</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>中文：</h4>
                                <!-- 编辑器容器 -->
                                <script id="zh_container" name="zh_content" type="text/plain"><p>请输入文章内容</p></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('zh_container');
                                    ue.ready(function() {
                                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>

                            </div>
                            <div class="col-md-12 margin-top-10">
                                <h4>英文：</h4>
                                <!-- 编辑器容器 -->
                                <script id="en_container" name="en_content" type="text/plain"><p>请输入文章内容</p></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('en_container');
                                    ue.ready(function() {
                                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                            </div>
                            <div class="col-md-12 margin-top-10">
                                <h4>日文：</h4>
                                <!-- 编辑器容器 -->
                                <script id="jp_container" name="jp_content" type="text/plain"><p>请输入文章内容</p></script>
                                <!-- 实例化编辑器 -->
                                <script type="text/javascript">
                                    var ue = UE.getEditor('jp_container');
                                    ue.ready(function() {
                                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green pv-save-user-event">
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
<script src="{{ asset('vendor/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    $(function(){
        sJs.rendre.laydate();
    })
</script>
@endsection