@extends('front.layouts.header-footer-layout')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
@endsection

@section('scripts')

@endsection

@section('content')
{{-- <auth-login></auth-login> --}}
<div class="auth-login">
    <div class="container auth-login-container">
        <form class="auth-login-form" method="POST" action="{{ route('dologin') }}">
                @csrf
            <div class="form-title text-center mb-5">
                Login To Bibmark
            </div>
            @if (count($errors))
            <div class="alert alert-danger">
                {{ implode('', $errors->all(':message')) }}
            </div>
            @endif
            <div class="form-group mb-5">
                <label for="login-email" class="mb-3">Email</label>
                <input type="email" name="email" class="form-control" id="login-email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <div class="error">
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                </div>
                @endif
            </div>
            <div class="form-group mb-4">
                <label for="login-password" class="mb-3">Password</label>
                <input type="password" class="form-control" id="login-password" name="password">
                @if ($errors->has('password'))
                <div class="error">
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                </div>
                @endif
            </div>

            <div class="form-row mb-5">
                <div class="form-group col-md-6">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Password</label>
                    </div>
                </div>
                <div class="form-group col-md-6 text-md-right">
                    <a href="" class="reset-password-cta">Forgot My Password</a>
                </div>
            </div>

            <div class="form-row d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <a href="join" class="login-cta-element d-flex">
                        <img src="img/auth/add.png" style="width: 64px; height: 64px;"/>
                        <div class="login-cta-labels d-flex flex-column ml-4">
                            <div class="login-cta-label-desc">Don’t have an account??</div>
                            <div class="login-cta-label">Join Now</div>
                        </div>
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <button class="login-cta-element d-flex justify-content-md-end">
                        <img src="img/auth/next.png" style="width: 64px; height: 64px;"/>
                        <div class="login-cta-labels d-flex flex-column ml-4">
                            <div class="login-cta-label-desc">Let’s go</div>
                            <div class="login-cta-label">Login Now</div>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
