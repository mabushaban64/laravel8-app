@extends('auth.layout')
@section('title' , __("Sign up"))

@section('body')
<!--begin::Signup-->
						<div class="login-form">
							<!--begin::Form-->
                                <form method="POST" novalidate="novalidate" action="{{ route('register') }}">
                                    @csrf

								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<input id="fname" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('fname') is-invalid @enderror" type="text" placeholder="First name" value="{{ old('fname') }}" name="fname" autofocus />
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input id="lname" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('lname') is-invalid @enderror" type="text" placeholder="last name" value="{{ old('lname') }}" name="lname" autofocus />
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<input id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" />

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
								{{--  <div class="form-group">
									<label class="checkbox mb-0">
										<input type="checkbox" name="agree" />
										<span></span>
										<div class="ml-2">I Agree the
										<a href="#">terms and conditions</a>.</div>
									</label>
								</div>  --}}
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                                    
                                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">{{ __('Register') }} </button>
                                <a href="{{ route('login') }}" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">{{ __('Cancel') }} </a>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->
@endsection
