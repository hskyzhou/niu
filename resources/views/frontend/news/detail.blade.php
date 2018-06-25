@extends('frontend.layouts.app')

@section('content')
<div class="news-banner" id="news-banner">
    <img src="{{ asset('frontend/assets/img/oases/oases-logo-title.png') }}" alt="" class="news-banner-title">
</div>
<section class="news-detail">
    <article class="container">
        <div class="news-detail-title">
            <h1>全球首个环境及能源管理领域的区块链项目OASES Chain在世界环境日当天正式发布</h1>
        </div>
        <div class="news-detail-cont">
            <p>2018年6月5日——世界环境日，美国EPC基金会联合新加坡OASES Foundation共同发布全球首个环境及能源管理领域的区块链项目OASES Chain（即OASES生态系统）。</p>
            <p>OASES生态系统联合LinkedIn(美国硅谷领英公司)分布式技术实验室、中国浙江大学数字资产与区块链研究所等多家著名机构，旨在使用区块链技术并结合实体经济产业，为解决全球范围内如何减少环境污染、降低能耗、监控排放，以及环境大数据的收集、分析等问题提供完善的方案，促进全球环保标准的建立，和各类能源资产交易市场的形成，构建更加环保和节能的世界。</p>
        </div>
    </article>
</section>
@endsection