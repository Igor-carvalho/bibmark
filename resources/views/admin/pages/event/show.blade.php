@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('content')
    <event-show :event="{{ $event }}"></event-show>
@endsection