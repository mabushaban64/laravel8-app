@extends('auth.layout')
@section('title' , __("Email Verfication"))
@section('body')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/progress-hd.png)">
    <!--begin::Content-->
    <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-20">
        <!--begin::Logo-->
        <a href="index.html" class="mb-10 pt-lg-20">
            <img alt="Logo" src="assets/media/logos/logo-2-dark.svg" class="h-50px mb-5" />
        </a>
        <!--end::Logo-->
        <!--begin::Wrapper-->
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
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-column-auto p-10">
        <!--begin::Links-->
        <div class="d-flex align-items-center fw-bold fs-6">
            <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
            <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
            <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
        </div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
@endsection
