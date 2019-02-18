@extends('admin.layouts.layout-2')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <account-detail-page :account-id="{{ $accountId }}"></account-detail-page>
    </div>
@endsection