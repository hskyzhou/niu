@extends('backend.layouts.admin')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">新闻管理</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ url('admin/news/create') }}" class="btn sbold green"><i class="fa fa-plus"></i>添加</a>
                        </div>
                    </div>
                </div>
            </div>
           <p>
                列表使用 datatable [$html->table()] 这种输出形式 <br>
                列表字段只显示中文并包含：【序号】/【新闻标题】/【发布时间】/【是否显示首页】/操作【修改/删除/设置到首页】<br>
                （列表排序默认优先显示置顶首页的新闻，其次按照时间降序排序）
            </p>
            {{-- {!! $html->table() !!} --}}
        </div>
    </div>
@endsection