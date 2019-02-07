@extends('admin.layouts.layout-2')

@section('styles')
    
@endsection

@section('scripts')
    
@endsection

@section('content')
    <h4 class="font-weight-bold py-3 mb-4">
    Edit account <span class="text-muted">#{{ $account->id }}</span>
    </h4>
    <account-edit :account="{{ $account }}"></account-edit>
@endsection