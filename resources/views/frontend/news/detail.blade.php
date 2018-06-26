@extends('frontend.layouts.app')

@section('content')
<div class="news-banner" id="news-banner">
    <img src="{{ asset('frontend/assets/img/oases/oases-logo-title.png') }}" alt="" class="news-banner-title">
</div>
<section class="news-detail">
    <article class="container">
        <div class="news-detail-title">
            <h1>{{ $info->title }}</h1>
        </div>
        <div class="news-detail-cont">
            {!! $info->content !!}
        </div>
    </article>
</section>
@endsection