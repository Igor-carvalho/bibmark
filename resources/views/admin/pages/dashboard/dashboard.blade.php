@extends('admin.layouts.layout-2')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <dashboard :is-admin="{{ $isAdmin }}" :user-id="{{ $userId }}"></dashboard>
    </div>
@endsection