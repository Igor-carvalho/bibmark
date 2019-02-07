@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')
    
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
    Edit user <span class="text-muted">#{{ $user->id }}</span>
    </h4>
    <user-edit :user="{{ $user }}"></user-edit>
@endsection