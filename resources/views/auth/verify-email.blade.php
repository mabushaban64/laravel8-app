@extends('auth.layout')
@section('title' , __("Email Verfication"))
@section('body')
<div class="pt-lg-10">
    <!--begin::Logo-->
    <h1 class="fw-bolder fs-2qx text-dark mb-7">Verify Your Email</h1>
    <!--end::Logo-->
    <!--begin::Message-->
    <div class="fs-3 fw-bold text-gray-400 mb-10">We have sent an email to
    <a href="#" class="link-primary fw-bolder">max@keenthemes.com</a>
    <br />pelase follow a link to verify your email.</div>
    <!--end::Message-->
    <!--begin::Action-->
    <div class="text-center mb-10">
        <a href="#" class="btn btn-lg btn-primary fw-bolder">Skip for now</a>
    </div>
    <!--end::Action-->
    <!--begin::Action-->
    <div class="fs-5">
        <span class="fw-bold text-gray-700">Did’t receive an email?</span>
        <a href="authentication/flows/basic/sign-up.html" class="link-primary fw-bolder">Resend</a>
    </div>
    <!--end::Action-->
</div>
@endsection
