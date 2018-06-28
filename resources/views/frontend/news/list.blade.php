@extends('frontend.layouts.other')

@section('styles')
<link href="{{ asset('/vendor/layer/theme/default/layer.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="news-banner" id="news-banner">
    <img src="{{ asset('frontend/assets/img/oases/oases-logo-title.png') }}" alt="" class="news-banner-title">
</div>
<section class="news bgf7">
    <div class="container">
        <div class="row news-list">
        </div>
    </div>
    <div class="contanier news-more-warp">
        <a data-method="get" data-url="{{ url('/news') }}" href="javascript:;" class="btn btn-more">@lang('index.news_more')</a>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('/vendor/layer/layer.js')}}"></script>
<script>
    $(function(){
        var more_btn = $('.btn-more');
        var newsBox = $('.news-list');
        var img = "{{ url('frontend/assets/img/oases') }}";
        window.loadImg = function(el, category){
            el.src = img + '/news'+category+'.jpg';
        }

        var newTpl = function(data){
            var buff = '';
            for(var i = 0; i < data.length; i++){
                var d = data[i];
                buff += '<div class="col-md-4 col-sm-4 col-xs-6">'+
                        '<a href="news-3.html" class="news-box">'+
                            '<div class="news-box-img">'+
                                '<img src="'+d.thumb+'" alt="" onerror="loadImg(this, '+d.category+')">'+
                            '</div>'+
                            '<div class="news-box-info">'+
                                '<p class="news-time">'+d.publish_at+'</p>'+
                                '<h3>'+d.title+'</h3>'+
                                '<p class="news-detail">'+d.content+'</p>'+
                            '</div>'+
                        '</a>'+
                    '</div>';
            }
            return buff;
        }

        var getNextPageDataFn = function(){
            var page = more_btn.attr('data-page')*1 || 1;
            var url = more_btn.attr('data-url');
            more_btn.attr('data-page', page + 1);
            layer.load();
            $.ajax({
                url: url + '?page=' + page,
                type: 'get',
                success: function(resp) {
                    if(resp.data.length > 0){
                        newsBox.append(newTpl(resp.data));
                    }else{
                        more_btn.hide();
                    }
                },
                complete: function(){
                    layer.closeAll();
                }
            })
        }
        getNextPageDataFn();
        more_btn.click(function(){getNextPageDataFn()});
    })
</script>
@endsection