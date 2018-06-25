@extends('backend.layouts.admin')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">分类管理</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ url('admin/category/create') }}" class="btn sbold green"><i class="fa fa-plus"></i>添加</a>
                        </div>
                    </div>
                </div>
            </div>
             <p>这个功能暂时不开发，新闻的分类默认写死 <br>
                1: 新闻<br>
                2: 快讯<br>
                3: 专访
            </p>
            {{-- {!! $html->table() !!} --}}
        </div>
    </div>
@endsection