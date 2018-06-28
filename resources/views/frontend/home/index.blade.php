@extends('frontend.layouts.app')
@section('styles')
<script>
    var loadImg = function(e, category){
        e.src = "{{ url('frontend/assets/img/oases') }}" + "/news"+category+".jpg";
    }
</script>
@endsection
@section('content')
<section id="slider-section" class="slider_area  slider-wrapper">
    <div class="container page1-box">
        <div class="center-oases"></div>
        <div class="line-oases">
            <img src="{{ asset('frontend/assets/img/oases/xian.png') }}" class="img-responsive" alt="">
            <span id="dian-1" class="xian-dian"><span></span></span>
            <span id="dian-2" class="xian-dian"><span></span></span>
            <span id="dian-3" class="xian-dian"><span></span></span>
            <span id="dian-4" class="xian-dian"><span></span></span>
            <span id="dian-5" class="xian-dian"><span></span></span>
            <span id="dian-6" class="xian-dian"><span></span></span>
        </div>
        <div class="page1-box-title">
            <h1 class="page1-title">
                <img src="{{ asset('frontend/assets/img/oases/oases-logo-title.png') }}" alt="">
                <p class="slogan">@lang('index.chain')</p>
                <span></span>
            </h1>
            <div class="page1-cont">
                <p>@lang('index.sys')</p>
            </div>
        </div>
    </div>
</section>
<section id="work_area" class="work_area ">
    <div id="vc_row-5b194df404908" class="footer-info">
        <div class="effect-2 wpb_column vc_column_container vc_col-sm-12">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div id="fullwidth-block-5b194df406a90" class="fullwidth-block clearfix">
                        <div class="fullwidth-block-inner">
                            <div class="wpb_raw_code wpb_content_element wpb_raw_html vc_custom_1524544691741">
                                <div class="wpb_wrapper">
                                    <div class="animation-wrapper">
                                        <canvas id="animation-visual-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="choose-patten-bg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>@lang('index.idea')</h2>
                        <span class="section-title-line"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-container">
        <div class="size-container">
            <div class="row">
                <div class="col-md-12 work_area-cont">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 work_area-item">
                            <div class="work_areabox bg-xt">
                                <p>@lang('index.idea1')</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>@lang('index.idea1')</span>
                                    <span class="work_area-icon xt-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>@lang('index.idea1_1')</h3>
                                    <p>@lang('index.idea1_2')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 work_area-item item-bg2">
                            <div class="work_areabox bg-wd">
                                <p>@lang('index.idea2')</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>@lang('index.idea2')</span>
                                    <span class="work_area-icon wd-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>@lang('index.idea2_1')</h3>
                                    <p>@lang('index.idea2_2')</p>
                                    <h3>@lang('index.idea2_3')</h3>
                                    <p>@lang('index.idea2_4')</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 work_area-item item-bg3">
                            <div class="work_areabox bg-jg">
                                <p>@lang('index.idea3')</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>@lang('index.idea3')</span>
                                    <span class="work_area-icon jg-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>@lang('index.idea3_1')</h3>
                                    <p>@lang('index.idea3_2')</p>
                                    <h3>@lang('index.idea3_3')</h3>
                                    <p>@lang('index.idea3_4')</p>
                                    <h3>@lang('index.idea3_5')</h3>
                                    <p>@lang('index.idea3_6')</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blockchain-area" class="blockchain-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>@lang('index.block')</h2>
                    <span class="section-title-line"></span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon1.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block1')</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon2.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block2')</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon3.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block3')</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon4.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block4')</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon5.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block5')</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon6.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>@lang('index.block6')</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="crypcash-area" class="crypcash-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>@lang('index.use')</h2>
                        <span class="section-title-line"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/036-bicycle.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_1')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/020-car.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_2')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/019-idea.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_3')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/022-green-energy.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_4')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/027-fuel.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_5')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/008-house.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_6')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/012-recycle-sign.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_7')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/032-ecology-1.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_8')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/1green-earth.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_9')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/2ecology.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_10')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/3renewable-energy.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_11')</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/4cpu.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">@lang('index.use_12')</h2>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>
<section class="news" id="news">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2><a href="/news">@lang('index.news')</a></h2>
                    <span class="section-title-line"></span>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!$lastestNews->isEmpty())
                @foreach($lastestNews as $key => $lastestNew)
                    <div class="col-md-4 col-sm-4">
                        <a href="{{ route('news.show', [$lastestNew->id]) }}" class="news-box">
                            <div class="news-box-img">
                                <img src="{{ asset($lastestNew->thumb) }}" onerror="loadImg(this,{{ $lastestNew->category }})" alt="">
                            </div>
                            <div class="news-box-info">
                                <p class="news-time">{{ $lastestNew->publish_at}}</p>
                                <h3>{{ str_limit(strip_tags($lastestNew->title), 44) }}</h3>
                                <p class="news-detail">{{ str_limit(strip_tags($lastestNew->content), 140) }}</p>
                            </div>
                        </a>
                    </div>
                    
                @endforeach
            @endif
        </div>
    </div>
    <div class="contanier news-more-warp index-more">
        <a href="/news" class="btn btn-more">@lang('index.news_more')</a>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame){
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
                timeToCall);
                lastTime = currTime + timeToCall;
            return id;
        };
    }
    if (!window.cancelAnimationFrame){
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
    }
}());

(function() {
    var canvas,
        contentWidth,
        contentHeight,
        ctx,
        points = [],
        target;

    function initVisualAnimation() {
        canvas = document.getElementById("animation-visual-canvas");

        resize();

        ctx = canvas.getContext('2d');

        target = {
            x: contentWidth / 2,
            y: contentHeight / 2
        };

        // create points
        for (var x = 0; x < contentWidth; x = x + contentWidth / 20) {
            for (var y = 0; y < contentHeight; y = y + contentHeight / 20) {
                var px = x + Math.random() * contentWidth / 20;
                var py = y + Math.random() * contentHeight / 20;
                points.push({
                    x: px,
                    originX: px,
                    y: py,
                    originY: py
                });
            }
        }

        // for each point find the 5 closest points
        for (var i = 0; i < points.length; i++) {
            var closest = [];
            var p1 = points[i];
            for (var j = 0; j < points.length; j++) {
                var p2 = points[j];
                if (p1 != p2) {
                    var placed = false;
                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }

                    for (var k = 0; k < 5; k++) {
                        if (!placed) {
                            if (getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }

        // assign a circle to each point
        for (var i in points) {
            points[i].circle = new Circle(points[i], 2 + Math.random() * 2, 'rgba(1, 163, 108, 0.3)');
        }

        addListeners();

        animate();
        for (var i in points) {
            shiftPoint(points[i]);
        }
    }

    function addListeners() {
        if( !('ontouchstart' in window)) {
            window.addEventListener('mousemove', mouseMove);
        }

        window.addEventListener('resize', resize);
    }

    function mouseMove(e) {
        var posx = posy = 0;
        var offset_top = getElementPosition(canvas).top;

        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        } else if (e.clientX || e.clientY)    {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }

        target.x = posx;
        target.y = posy - offset_top;
    }

    function getElementPosition(elem) {
        var w = elem.offsetWidth,
            h = elem.offsetHeight,
            l = 0,
            t = 0;

        while (elem) {
            l += elem.offsetLeft;
            t += elem.offsetTop;
            elem = elem.offsetParent;
        }

        return {
            left: l,
            top: t,
            width: w,
            height: h
        };
    }

    function resize() {
        // parent node size
        contentWidth = canvas.parentNode.offsetWidth;
        contentHeight = canvas.parentNode.offsetHeight;

        // set canvas size equal size of parent node
        canvas.width = contentWidth;
        canvas.height = contentHeight;
    }

    function getDistance(p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }

    function Circle(pos, rad, color) {
        var _this = this;

        (function() {
            _this.pos = pos || null;
            _this.radius = rad || null;
            _this.color = color || null;
        })();

        this.draw = function() {
            if (!_this.active) return;
            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(1, 163, 108, ' + _this.active + ')';
            ctx.fill();
        };
    }

    function animate() {
        ctx.clearRect(0, 0, contentWidth, contentHeight);

        for (var i in points) {
            // detect points in range
            if (Math.abs(getDistance(target, points[i])) < 4000) {
                points[i].active = 0.3;
                points[i].circle.active = 0.6;
            } else if (Math.abs(getDistance(target, points[i])) < 20000) {
                points[i].active = 0.1;
                points[i].circle.active = 0.3;
            } else if (Math.abs(getDistance(target, points[i])) < 40000) {
                points[i].active = 0.02;
                points[i].circle.active = 0.1;
            } else {
                points[i].active = 0;
                points[i].circle.active = 0;
            }

            drawLines(points[i]);
            points[i].circle.draw();
        }

        requestAnimationFrame(animate);
    }

    function drawLines(p) {
        if (!p.active) {
            return;
        }

        for (var i in p.closest) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.closest[i].x, p.closest[i].y);
            ctx.strokeStyle = 'rgba(1, 163, 108, ' + p.active + ')';
            ctx.stroke();
        }
    }

    function shiftPoint(p) {
        TweenLite.to(
            p,
            1 + 1 * Math.random(),
            {
                x: p.originX - 50 + Math.random() * 100,
                y: p.originY - 50 + Math.random() * 100,
                ease:Circ.easeInOut,
                onComplete: function() {
                    shiftPoint(p);
                }
            }
        );
    }

window.addEventListener('load', function () {
    var el = document.querySelector('.footer-info');

    el.setAttribute('data-effect', 'false');
    var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    function notVisible() {
        return 'ontouchstart' in window || navigator.maxTouchPoints || isSafari;
    };

    window.addEventListener("scroll", function() {
        var scroll = window.pageYOffset || document.documentElement.scrollTop;
        var elTop = el.getBoundingClientRect().top + scroll - document.documentElement.clientHeight;
        var elBottom = el.getBoundingClientRect().bottom + scroll;

        if((el.getAttribute('data-effect') == 'false') && (scroll > elTop) && (scroll < elBottom)){
            el.setAttribute('data-effect', 'true');

            if( !notVisible() ){
                initVisualAnimation();
            }
        }
    });
});
})();
</script>
@endsection