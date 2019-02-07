@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')
    
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
    Edit charity <span class="text-muted">#{{ $charity->id }}</span>
    </h4>
    <charity-edit :charity="{{ $charity }}"></charity-edit>
@endsection