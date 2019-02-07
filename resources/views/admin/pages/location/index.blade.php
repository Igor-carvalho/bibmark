@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
            <div>Locations</div>
            <button type="button" class="btn btn-primary btn-round d-block" onclick="window.location='locations/create';">
                <span class="ion ion-md-add"></span>&nbsp; Create location
            </button>
        </h4>
        <location-list></location-list>
    </div>
@endsection