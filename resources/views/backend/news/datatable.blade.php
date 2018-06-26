<div class="but-group">
    <a href="{{route('admin.news.edit', [$id])}}" title="修改"><i class="fa fa-edit font-green"></i></a>
    <a href="javascript:;" data-method="delete" data-url="{{route('admin.news.destroy', [$id])}}" title="删除"><i class="fa fa-trash font-red"></i></a>
    <a href="javascript:;" data-method="get" data-url="{{route('admin.news.setindex', [$id])}}" title="设置到首页"><i class="fa fa-thumbs-up font-blue"></i></a>
</div>