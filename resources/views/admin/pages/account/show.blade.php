@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('content')
    <account-show :account="{{ $account }}"></account-show>
    <div class="nav-tabs-top">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#account-users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#account-assets">Assets</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="account-users">
                <div class="card-body">
                    <h4 class="d-flex justify-content-between align-items-center w-100 font-weight-bold py-3 mb-4">
                        <div></div>
                        <button type="button" class="btn btn-primary btn-round d-block" onclick="window.location='{{ $account->id }}/users/create';">
                            <span class="ion ion-md-add"></span>&nbsp; Create user
                        </button>
                    </h4>
                    <user-list account-id="{{ $account->id }}"></user-list>
                </div>
            </div>
            <div class="tab-pane fade" id="account-assets">
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection