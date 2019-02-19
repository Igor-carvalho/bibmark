@extends('admin.layouts.layout-2')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <charity-detail-page :charity-id="{{ $charityId }}"></charity-detail-page>
    </div>
@endsection