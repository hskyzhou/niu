<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh_CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh_CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh_CN">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>安利纽崔莱上市预热小程序数据后台</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="{{ asset('backend/images/logo.png') }}">
        <link rel="icon" type="icon/image" href="{{ asset('backend/images/logo.png') }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{ asset('/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('/themes/metronic/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('/themes/metronic/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/themes/light.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/layer/theme/default/layer.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/plugins/laydate/theme/default/laydate.css')}}" rel="stylesheet" type="text/css" />
        @yield('styles')
        <link href="{{ asset('backend/css/common.css') }}" rel="stylesheet" type="text/css">
        <style>
            .page-content-wrapper .page-content{padding-top: 0;}
            .page-header.navbar .page-logo{width: auto;min-width: 265px;}
            .page-header.navbar .page-logo a{text-decoration: none;}
            .page-header.navbar .page-logo h2{padding-right: 20px;}
            .page-logo-font{display: inline-block;}
            .ms-logo{display: inline-block; height: 40px; vertical-align: top; margin-top: 15px;}
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        @include('backend.layouts.partical.admin.header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        @include('backend.layouts.partical.admin.content')
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        @include('backend.layouts.partical.admin.footer')
        <!-- END FOOTER -->
        <!-- BEGIN MODAL -->
        @include('backend.layouts.partical.admin.modal')
        <!-- END MODAL -->
        <!--[if lt IE 9]>
        <script src="{{ asset('/plugins/respond.min.js') }}"></script>
        <script src="{{ asset('/plugins/excanvas.min.js') }}"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('/plugins/jquery.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/plugins/js.cookie.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
        <script src="{{asset('/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('/plugins/jquery.blockui.min.js')}}"></script>
        <script src="{{asset('/plugins/uniform/jquery.uniform.min.js')}}"></script>
        <script src="{{asset('/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('/plugins/webuploader-0.1.5/webuploader.nolog.min.js') }}"></script>
        <script src="{{asset('/plugins/layer/layer.js')}}"></script>
        <script src="{{asset('/plugins/laydate/laydate.js')}}"></script>
        <script src="{{ asset('/plugins/baiduTemplate.js') }}"></script>
        <script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('/plugins/moment-with-locales.js')}}"></script>
        <script src="{{asset('/themes/metronic/global/scripts/app.js')}}"></script>
        <script src="{{asset('/backend/js/common.js')}}"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('/themes/metronic/layouts/layout4/scripts/layout.js')}}"></script>
        <script src="{{asset('/themes/metronic/layouts/layout4/scripts/demo.js')}}"></script>
        <script src="{{asset('/plugins/Validform_v5.3.2/Validform_v5.3.2_min.js') }}"></script>
        @stack('scripts')
        <script>
            $(function(){
                 $('.sidebar-option').trigger('change');
            });
        </script>
    </body>

</html>