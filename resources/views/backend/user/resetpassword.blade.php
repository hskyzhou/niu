@extends('backend.layouts.admin')
@section('content')
@if(isset($error))
    <div class="alert alert-danger">{{$error}}</div>
@endif
@if(isset($success))
    <div class="alert alert-success">{{$success}}</div>
@endif
<div class="portlet light bordered form-fit">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-layers font-green"></i>
            <span class="caption-subject font-green sbold uppercase">修改密码</span>
        </div>
    </div>
    <div class="portlet-body form">
        <form action="{{route('admin.password')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 旧密码</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="oldpassword">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em>新密码</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="newpassword">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3"><em class="font-red">* </em> 再次确认密码</label>
                    <div class="col-md-9">
                        <input type="text" name="newpassword_ag"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green pv-save-user-event">
                            <i class="fa fa-check"></i>确定</button>
                        <button type="button" class="btn default" onclick="javascript:window.history.go(-1);">取消</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection