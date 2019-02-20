@extends('admin.layouts.layout-dashboard-detail-page')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <account-detail-page :account-id="{{ $accountId }}"></account-detail-page>
    </div>
@endsection