@extends('auth.layout')
@section('title' , __("Reset Password"))
@section('body')
<div class="login-form">
    <!--begin::Form-->
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <!--begin::Title-->
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">{{ __('Reset Password') }}</h3>
        </div>
        <!--end::Title-->
        <!--begin::Form group-->
        <div class="form-group">
            <input id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group">
            <input id="password" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password" />
            
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group">
            <input  id="password-confirm" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password" />
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group d-flex flex-wrap pb-lg-0">
            <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4"> {{ __('Reset Password') }}</button>
            {{--  <a href="{{ route('login') }}" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">{{ __('Cancel') }} </a>  --}}
        </div>
        <!--end::Form group-->
    </form>
    <!--end::Form-->
</div>
@endsection
