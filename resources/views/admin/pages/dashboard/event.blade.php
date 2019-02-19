@extends('admin.layouts.layout-2')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <event-detail-page :event-id="{{ $eventId }}"></event-detail-page>
    </div>
@endsection