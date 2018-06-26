@extends('backend.layouts.admin')
@section('styles')
<style>
    .but-group>a{
        margin: 0 10px;
    }
</style>
@endsection
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">新闻管理</span>
            </div>
        </div>
        <div class="portlet-body table-portlet">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ url('admin/news/create') }}" class="btn sbold green"><i class="fa fa-plus"></i>添加</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! $html->table() !!}
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/vendor/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/vendor/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    {!! $html->scripts() !!}
    <script>
        $(function(){
            $('.table-portlet').on('click', '.but-group>a[data-url]', function(){
                var that = $(this);
                var type = that.attr('data-method');
                if(type == "delete"){
                    layer.confirm("确定执行删除操作？", {
                        btn: ['确定','取消']
                    }, function(){
                        PVJs.ajax({
                            url: that.attr('data-url'),
                            type: type,
                            success: function(resp){
                                layer.msg(resp.message);
                                if(resp.result){
                                    window.LaravelDataTables.dataTableBuilder.ajax.reload();
                                }
                            }
                        })
                    })
                }else if(type == "get"){
                    PVJs.ajax({
                        url: that.attr('data-url'),
                        type: 'get',
                        success: function(resp){
                            layer.msg(resp.message);
                            if(resp.result){
                                window.LaravelDataTables.dataTableBuilder.ajax.reload();
                            }
                        }
                    })
                }
            })
        })
    </script>
@endsection