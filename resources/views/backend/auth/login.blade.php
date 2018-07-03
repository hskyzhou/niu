@extends('backend.layouts.login')

@section('content')
    <!-- BEGIN LOGO -->
    <div class="logo" style="margin-bottom: 40px;">
        <a href="index.html">
            <img src="{{ asset('/frontend/assets/img/oases/logo.png') }}" style="height: 60px;" alt="" />
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN FORM -->
   
    <div class="content-wrap">
        <div class="form-box">
            <form class="login-form" method="POST" action="{{route('login')}}">
                {{ csrf_field() }}
                {{-- @include(getThemeTemplate('backend.layouts.partical.admin.error')) --}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="control-label visible-ie8 visible-ie9">用户名</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="请输入用户名" name="name" value="" required autofocus />
                    {{--
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    --}}
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">密码</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="请输入密码" name="password" required /> 
                     {{--
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                     --}}
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn white font-blue btn-block pv-login-btn" style="color: #0eb978 !important">登陆</button>
                </div>
                <div class="form-actions">
                    <!-- <div class="pull-left">
                        <label class="rememberme check">
                            <input type="checkbox" name="remember" value="1" />记住密码 </label>
                    </div> -->
                </div>
            </form>
        </div>
    </div>

    <!-- END LOGIN FORM -->
@endsection