<section class="footer-header" id="footer-header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 col-xs-6-1">
                <div class="fheader-box">
                    <h3>@lang('index.join')</h3>
                    <ul>
                        <li>
                            <span class="fh-icon fh-1"></span>
                            <a href="https://t.me/oasespro" target="_blank">@lang('index.telegram')</a>
                        </li>
                        <li>
                            <span class="fh-icon fh-2"></span>
                            <a href="https://twitter.com/oaseschain?lang=en" target="_blank">@lang('index.twitter')</a>
                        </li>
                        <li>
                            <span class="fh-icon fh-3"></span>
                            <a href="https://www.facebook.com/shen.lin.54966" target="_blank">@lang('index.facebook')</a>
                        </li>
                        <li>
                            <span class="fh-icon fh-7"></span>
                            <a href="javascript:;" class="weixin-event">@lang('index.wechat')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-xs-6-1">
                <div class="fheader-box">
                    <h3>@lang('index.resource')</h3>
                    <ul>
                        <li>
                            <span class="fh-icon fh-4"></span>
                            <a href="@if(config('app.locale') == 'zh'){{ asset('/frontend/assets/OASES_CHAIN_BUSINESS_WHITE_PAPER.pdf') }}@else javascript:; @endif" download="Oases项目白皮书" target="_blank">@lang('index.book')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-xs-6-1 hide-xs">
                <div class="fheader-box">
                    <h3>@lang('index.follow')</h3>
                    <ul>
                        <li>
                            <span class="fh-icon fh-6"></span>
                            <a href="https://weibo.com/6572127927/profile?rightmod=1&wvr=6&mod=personinfo" target="_blank">@lang('index.follow_weibo')</a>
                        </li>
                        <li>
                            <span class="fh-icon fh-7"></span>
                            <a href="javascript:;" class="weixin-event">@lang('index.follow_wechat')</a>
                        </li>
                        <!-- <li>
                            <span class="fh-icon fh-8"></span>
                            <a href="javascript:;">@lang('index.follow_news')</a>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 col-xs-6-1 hide-xs">
                <div class="fheader-box">
                    <h3>@lang('index.contact')</h3>
                    <ul>
                        <li>
                            <span class="fh-icon fh-9"></span>
                            <a href="javascript:;">@lang('index.contact_email')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 vis-xs">
                <ul class="footer-icon">
                    <li><a href="javascript:;" class="fweibo-icon"></a></li>
                    <li><a href="javascript:;" class="fweixin-icon weixin-event"></a></li>
                </ul>
            </div>
            <div class="vis-xs">
                <p>@lang('index.email'): @lang('index.contact_email')</p>
            </div>
            <div class="col-md-7 col-xs-12">
                <p>Copyright &copy; Cryption2018.All rights OASES</p>
            </div>
        </div>
    </div>
</section>
<div class="qrcode-modal">
    <div class="qrcode-modal-body">
        <span class="close">x</span>
        <img src="{{ asset('frontend/assets/img/oases/qrcode.png') }}" alt="">
    </div>
</div>