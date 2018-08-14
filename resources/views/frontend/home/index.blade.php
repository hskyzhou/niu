@extends('frontend.layouts.app')
@section('styles')
<script>
    var loadImg = function(e, category){
        e.src = "{{ url('frontend/assets/img/oases') }}" + "/news"+category+".jpg";
    }
</script>
@endsection
@section('content')
    <h1>Hello world</h1>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection