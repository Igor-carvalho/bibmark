@extends('admin.layouts.layout-dashboard-detail-page')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <charity-detail-page :charity-id="{{ $charityId }}"></charity-detail-page>
    </div>
@endsection