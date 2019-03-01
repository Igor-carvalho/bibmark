@extends('front.layouts.header-footer-layout')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('content')
<auth-reset-password token={{$token}} email={{$email}}></auth-reset-password>
@endsection
