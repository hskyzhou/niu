@extends('backend.layouts.admin')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase">用户管理</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{ route('admin.user.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>添加用户</a>
                    </div>
                    </div>
                </div>
            </div>
            {!! $html->table(['class' => 'table table-bordered'], true) !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/vendor/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/vendor/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/vendor/laydate/laydate.js') }}"></script>
    {!! $html->scripts() !!}
    <script>
        $(function(){
            $('#php-ajax-modal-small').on('click', '.username-save-event', function(){
                var that = $(this),
                    url = that.attr('data-url'),
                    method = that.attr('data-method');
                    layer.load();
                    $.ajax({
                        url:url,
                        type: method,
                        headers : {
                            'X-CSRF-TOKEN' : $("meta[name='_token']").attr('content')
                        },
                        data:{
                            remark: $('input[name=remark]').val()
                        },
                        success: function(res){
                            layer.closeAll();
                            if(res.result){
                                layer.msg("修改成功！");
                                that.parent().find('[data-dismiss]').trigger('click');
                                LaravelDataTables.dataTableBuilder.ajax.reload();
                            }
                        }
                    })
            })
        })
    </script>
@endpush
