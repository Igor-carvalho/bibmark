@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('content')
    <charity-show :charity="{{ $charity }}"></charity-show>
@endsection