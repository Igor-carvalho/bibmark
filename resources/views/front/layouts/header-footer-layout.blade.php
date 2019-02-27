@extends('admin.layouts.application')

@section('layout-content')
    <common-header></common-header>
    @yield('content')
    <common-footer></common-footer>
@endsection