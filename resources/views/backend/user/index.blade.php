@extends('backend.layouts.admin')

@section('content')
    {!! $html->table(['class' => 'table table-bordered'], true) !!}    
@endsection

@push('scripts')
    {!! $html->scripts() !!}
@endpush