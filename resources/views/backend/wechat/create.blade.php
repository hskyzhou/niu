@extends('backend.layouts.admin')

@section('content')
	<div class="portlet light bordered">
	    <div class="portlet-title">
	        <div class="caption">
	            <i class="icon-layers font-green"></i>
	            <span class="caption-subject font-green sbold uppercase">用户信息添加</span>
	        </div>
	    </div>
	    <div class="portlet-body form">
	    	<form data-url="{{route('admin.user.store')}}" action="{{route('admin.user.store')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
	        	{{csrf_field()}}
	        	<div class="form-body">
	        	    <div class="form-group">
	        	        <label class="control-label col-md-3"><em class="font-red">* </em> 姓名</label>
	        	        <div class="col-md-9">
	        	            <input type="text" name="name" class="form-control">
	        	        </div>
	        	    </div>
	        	    <div class="form-group">
	        	        <label class="control-label col-md-3"><em class="font-red">* </em> 密码</label>
	        	        <div class="col-md-9">
	        	            <input type="password" name="password" class="form-control">
	        	            <span class="help">默认123456</span>
	        	        </div>
	        	    </div>
	        	    <div class="form-group">
	        	        <label class="control-label col-md-3"><em class="font-red">* </em> 邮箱</label>
	        	        <div class="col-md-9">
	        	            <input type="text" name="email" class="form-control">
	        	        </div>
	        	    </div>
	        	    <div class="form-group">
	        	        <label class="control-label col-md-3"><em class="font-red">* </em> 手机号</label>
	        	        <div class="col-md-9">
	        	            <input type="text" name="mobile" class="form-control">
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