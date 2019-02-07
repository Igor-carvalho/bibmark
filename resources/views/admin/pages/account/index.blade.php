@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')

@endsection

@section('content')
    <div>
        <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
            <div>Accounts</div>
            <button type="button" class="btn btn-primary btn-round d-block" onclick="window.location='accounts/create';">
                <span class="ion ion-md-add"></span>&nbsp; Create account
            </button>
        </h4>
        <account-list></account-list>
    </div>
@endsection