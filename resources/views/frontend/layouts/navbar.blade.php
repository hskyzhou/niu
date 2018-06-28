<a href="#slider-section" class="scrolltotop"><span class="ti-angle-double-up"></span></a>
<header id="sticker" class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="logo ">
                    <a href="#"><img src="{{ asset('frontend/assets/img/oases/oases-logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <nav>
                    <div class="mainmenu text-right">
                        <ul id="nav" class="menu">
                            <li><a href="#slider-section">@lang('menu.index')</a></li>
                            <li class="dropdown current-menu-item current-menu-has-children">
                                <a href="javascript:;">@lang('menu.about')</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#work_area">@lang('menu.project')</a></li>
                                    <!-- <li><a href="#our-team">团队</a></li> -->
                                </ul>
                            </li>
                            <li><a href="#crypcash-area">@lang('menu.environment')</a></li>
                            <li class="dropdown current-menu-item current-menu-has-children">
                                <a href="javascript:;">@lang('menu.resource')</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ asset('frontend/assets/OASES_CHAIN_BUSINESS_WHITE_PAPER_V1.pdf') }}" onclick="javascript:window.location.href=this.href;">@lang('menu.whitebook')</a></li>
                                    <li><a href="#news">@lang('menu.news')</a></li>
                                </ul>
                            </li>
                            <li><a href="#footer-header">@lang('menu.join')</a></li>
                            <li class="dropdown current-menu-item current-menu-has-children">
                                <a href="javascript:;">@lang('menu.lang')</a>
                                <ul class="dropdown-menu">
                                    <li><a onclick="javascript:window.location.href = this.href;" href="{{route('lang.change', ['zh'])}}">@lang('lang.zh')</a></li>
                                    <li><a onclick="javascript:window.location.href = this.href;" href="{{route('lang.change', ['en'])}}">@lang('lang.en')</a></li>
                                    <li><a onclick="javascript:window.location.href = this.href;" href="{{route('lang.change', ['jp'])}}">@lang('lang.jp')</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>