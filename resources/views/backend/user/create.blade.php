@extends('backend.layouts.admin')

@section('content')
	<form action="{{route('admin.user.store')}}" method="post">
		{{csrf_field()}}
		<div>
			<label for="">姓名</label>
			<input type="text" name="name">
		</div>

		<div>
			<label for="">邮箱</label>
			<input type="text" name="email">
		</div>

		<div>
			<label for="">手机号</label>
			<input type="text" name="mobile">
		</div>

		<div>
			<label for="">密码</label>
			<input type="text" name="password">
		</div>

		<input type="submit" value="提交">
	</form>
@endsection

@push('scripts')
@endpush