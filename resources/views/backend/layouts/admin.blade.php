<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh_CN" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh_CN" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh_CN">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>OASES 后台系统</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="_token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/oases/favicon.png') }}">
        <link rel="icon" type="icon/image" href="{{ asset('frontend/assets/img/oases/favicon.png') }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/vendor/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('/vendor/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('/themes/metronic/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('/themes/metronic/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/themes/light.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('/themes/metronic/layouts/layout4/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/layer/theme/default/layer.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/vendor/laydate/theme/default/laydate.css')}}" rel="stylesheet" type="text/css" />
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
        <script src="{{ asset('/vendor/respond.min.js') }}"></script>
        <script src="{{ asset('/vendor/excanvas.min.js') }}"></script>
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('/vendor/jquery.min.js')}}"></script>
        <script src="{{asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/vendor/js.cookie.min.js')}}"></script>
        <script src="{{asset('/vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
        <script src="{{asset('/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('/vendor/jquery.blockui.min.js')}}"></script>
        <script src="{{asset('/vendor/uniform/jquery.uniform.min.js')}}"></script>
        <script src="{{asset('/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('/vendor/webuploader-0.1.5/webuploader.nolog.min.js') }}"></script>
        <script src="{{asset('/vendor/layer/layer.js')}}"></script>
        <script src="{{asset('/vendor/laydate/laydate.js')}}"></script>
        <script src="{{ asset('/vendor/baiduTemplate.js') }}"></script>
        <script src="{{ asset('/vendor/select2/js/select2.full.min.js') }}"></script>

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('/vendor/moment-with-locales.js')}}"></script>
        <script src="{{asset('/themes/metronic/global/scripts/app.js')}}"></script>
        <script src="{{asset('/backend/js/common.js')}}"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('/themes/metronic/layouts/layout4/scripts/layout.js')}}"></script>
        <script src="{{asset('/themes/metronic/layouts/layout4/scripts/demo.js')}}"></script>
        <script src="{{asset('/vendor/Validform_v5.3.2/Validform_v5.3.2_min.js') }}"></script>
        <script src="{{asset('/vendor/datatables/datatables.min.js') }}"></script>

        @stack('scripts')
    </body>

</html>