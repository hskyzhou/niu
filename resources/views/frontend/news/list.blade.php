@extends('frontend.layouts.other')

@section('content')

<div class="news-banner" id="news-banner">
    <img src="{{ asset('frontend/assets/img/oases/oases-logo-title.png') }}" alt="" class="news-banner-title">
</div>
<section class="news bgf7">
    <div class="container">
        <div class="row news-list">
            <div class="col-md-4 col-sm-4 col-xs-6">
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
            <div class="col-md-4 col-sm-4 col-xs-6">
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
            <div class="col-md-4 col-sm-4 col-xs-6">
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
    <div class="contanier news-more-warp">
        <a data-method="get" data-url="/news?page=1" href="javascript:;" class="btn btn-more">@lang('index.news_more')</a>
    </div>
</section>
@endsection