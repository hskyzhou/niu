@extends('backend.layouts.admin')

@section('content')
	<form data-url="{{route('admin.user.update', $user->id)}}" action="{{route('admin.user.update', $user->id)}}" method="post">
		{{method_field('put')}}
		{{csrf_field()}}
		<div>
			<label for="">姓名</label>
			<input type="text" name="name" value="{{ $user->name }}">
		</div>

		<div>
			<label for="">邮箱</label>
			<input type="text" name="email" value="{{ $user->email }}">
		</div>

		<div>
			<label for="">手机号</label>
			<input type="text" name="mobile" value="{{ $user->mobile }}">
		</div>

		<input type="submit" value="提交">
	</form>
@endsection

@push('scripts')
@endpush