@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')
    
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
    Edit event <span class="text-muted">#{{ $event->id }}</span>
    </h4>
    <event-edit :event="{{ $event }}"></event-edit>
@endsection