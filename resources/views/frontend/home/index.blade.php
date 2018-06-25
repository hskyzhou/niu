@extends('frontend.layouts.app')

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
                <p class="slogan">chain to the miracle</p>
                <span></span>
            </h1>
            <div class="page1-cont">
                <p>下一代区块链环保技术及能源管理系统</p>
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
                        <h2>倡导绿色生活理念</h2>
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
                                <p>一个系统</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>一个系统</span>
                                    <span class="work_area-icon xt-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>OASES生态系统</h3>
                                    <p>OASES生态系统旨在使用区块链技术并结合实体经济产业，为解决全球范围内如何减少环境污染、降低能耗、监控排放，以及环境大数据的收集、分析等问题提供完善的方案，促进全球环保标准的建立，和各类能源资产交易市场的形成，构建更加环保和节能的世界。</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 work_area-item item-bg2">
                            <div class="work_areabox bg-wd">
                                <p>两个维度</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>两个维度</span>
                                    <span class="work_area-icon wd-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>物质维度（OMF）</h3>
                                    <p>物质维度决定了物质的状态及能量的性质，是OASES物质流的理论基础。</p>
                                    <h3>信息维度（OIF）</h3>
                                    <p>信息维度认为，信息在传递之间同样是具有能量的，是OASES信息流的理论基础。</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 work_area-item item-bg3">
                            <div class="work_areabox bg-jg">
                                <p>三个结构</p>
                            </div>
                            <div class="work_areabox-hidden">
                                <div class="work_area-item-title">
                                    <span>三个结构</span>
                                    <span class="work_area-icon jg-icon"></span>
                                </div>
                                <div class="work_area-item-cont">
                                    <h3>时空结构（OSS）</h3>
                                    <p>OASES时空结构（OSS）定义了的生态系统中能量的表现形式。</p>
                                    <h3>组分结构（OCDS）</h3>
                                    <p>OASES组分结构（OCDS）定义了生态系统中物质的能量结构和特征。</p>
                                    <h3>循环结构（OFS）</h3>
                                    <p>OASES生态系统中的循环结构是构成能量循环和能量转化的关键途径。</p>
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
                    <h2>基于区块链技术</h2>
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
                            <h3>智能合约</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon2.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>共识协议</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon3.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>激励机制</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon4.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>分布式存储</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon5.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>分布式运算</h3>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-4">
                        <div class="icon-box">
                            <div class="icon-box-img">
                                <img src="{{ asset('frontend/assets/img/svg/icon6.svg') }}" width="63" height="63" alt="">
                            </div>
                            <h3>虚拟机</h3>
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
                        <h2>行业中的应用</h2>
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
                            <h2 class="item-title">倡导更环保的出行方式</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/020-car.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">推动新能源汽车的使用</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/019-idea.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">促进物联网智能白色家电产业的节能减排</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/022-green-energy.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">帮助均衡能源结构</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/027-fuel.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">增强合同能源管理</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/008-house.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">提高普通家庭网络及设备单位能耗使用效率</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/012-recycle-sign.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">去中心化，可以追溯资源回收</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/032-ecology-1.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">环境信息协调统一</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/1green-earth.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">推荐环境及能源数据资源全面整合共享</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/2ecology.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">帮助行业组织及政府部门科学制定生态环境政策，提高环境应急处理能力</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/3renewable-energy.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">创新生态环境监管模式</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="crypcash-area-item clearfix">
                        <div class="item-icon">
                            <img src="{{ asset('frontend/assets/img/svg/4cpu.svg') }}" alt="">
                        </div>
                        <div class="item-cont">
                            <h2 class="item-title">引入区块链+芯片技术，强化信息安全保障</h2>
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
                    <h2><a href="list.html">OASES新闻</a></h2>
                    <span class="section-title-line"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <a href="news-1.html" class="news-box">
                    <div class="news-box-img">
                        <img src="{{ asset('frontend/assets/img/oases/news1.jpg') }}" alt="">
                    </div>
                    <div class="news-box-info">
                        <p class="news-time">2018-06-05</p>
                        <h3>全球首个环境及能源管理领域的区块链项目OASES Chain在世界环境日当天正式发布</h3>
                        <p class="news-detail">2018年6月5日——世界环境日，美国EPC基金会联合新加坡OASES Foundation共同发布全球首个环境及能源管理领域的区块链项目OASES Chain（即OASES生态系统）。</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="news-2.html" class="news-box">
                    <div class="news-box-img">
                        <img src="{{ asset('frontend/assets/img/oases/news2.jpg') }}" alt="">
                    </div>
                    <div class="news-box-info">
                        <p class="news-time">2018-06-05</p>
                        <h3>全球首个环境及能源管理领域的区块链项目OASES Chain得到张文华先生高度评价</h3>
                        <p class="news-detail">美国EPC基金会联合新加坡OASES Foundation共同发布全球首个环境及能源管理领域的区块链项目OASES生态系统。世界温州人联谊总会前副会长兼秘书长张文华先生...</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="news-3.html" class="news-box">
                    <div class="news-box-img">
                        <img src="{{ asset('frontend/assets/img/oases/news3.jpg') }}" alt="">
                    </div>
                    <div class="news-box-info">
                        <p class="news-time">2018-02-26</p>
                        <h3>OASES Chain——环保区块链，为节能而生，为蓝天护航</h3>
                        <p class="news-detail">全球首个环保区块链项目——OASESChain（OASES生态系统）携手浙江大学数字货币与区块链研究所、LinkedIn（美国硅谷领英公司）分布式技术实验室等...</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="contanier news-more-warp index-more">
        <a href="list.html" class="btn btn-more">查看更多</a>
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