@extends('admin.layouts.layout-dashboard-detail-page')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <event-detail-page :event-id="{{ $eventId }}"></event-detail-page>
    </div>
@endsection