@extends('auth.layout')
@section('title' , __("Password Confirmation"))
@section('body')
<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
    <!--begin::Logo-->
    <a href="index.html" class="mb-10 pt-lg-20">
        <img alt="Logo" src="assets/media/logos/logo-2-dark.svg" class="h-50px mb-5" />
    </a>
    <!--end::Logo-->
    <!--begin::Wrapper-->
    <div class="pt-lg-10">
        <!--begin::Logo-->
        <h1 class="fw-bolder fs-2qx text-dark mb-7">Password is changed</h1>
        <!--end::Logo-->
        <!--begin::Message-->
        <div class="fw-bold fs-3 text-gray-400 mb-15">Your password is successfully changed. Please Sign
        <br />in to your account and start a new project.</div>
        <!--end::Message-->
        <!--begin::Action-->
        <div class="text-center">
            <a href="authentication/flows/basic/sign-in.html" class="btn btn-primary btn-lg fw-bolder">Sign In</a>
        </div>
        <!--end::Action-->
        <!--begin::Action-->
        <div class="text-gray-700 fw-bold fs-4 pt-7">Did’t receive an email?
        <a href="authentication/flows/basic/password-reset.html" class="text-primary fw-bolder">Try Again</a></div>
        <!--end::Action-->
    </div>
    <!--end::Wrapper-->
</div>
@endsection
