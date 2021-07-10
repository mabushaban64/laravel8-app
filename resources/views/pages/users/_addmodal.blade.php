<!--begin::Modal-->
<div class="modal fade"  id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger mb-2 print-error-msg" role="alert" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul></ul>
                </div>
                <!--begin: Wizard-->
                <div class="wizard wizard-2" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin: Wizard Nav-->

                    <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-steps">
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Account Settings</h3>
                                        <div class="wizard-desc">Setup Your Account Details</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Set Your Personal Informaion</h3>
                                        <div class="wizard-desc">Setup Your Account Details</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2" />
                                                    <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Set Your Address</h3>
                                        <div class="wizard-desc">Address, Street, City, State</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-wrapper">
                                    <div class="wizard-icon">
                                        <span class="svg-icon svg-icon-2x">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
                                                    <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">Completed!</h3>
                                        <div class="wizard-desc">Review and Submit</div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                    <!--begin: Wizard Body-->
                    <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                        <!--begin: Wizard Form-->
                        <div class="row">
                            <div class="offset-xxl-2 col-xxl-8">
                                <form action="#" class="form" id="kt_form" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enter your Account Details</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="fname" id="fname" placeholder="First Name" value="" />
                                            <span class="form-text text-muted">Please enter your first name.</span>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="lname" id="lname" placeholder="Last Name" value="" />
                                            <span class="form-text text-muted">Please enter your last name.</span>
                                        </div>
                                        <!--end::Input-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control form-control-solid form-control-lg" name="phone" id="phone" placeholder="+61412345678" value="" />
                                                    <span class="form-text text-muted">Please enter your phone number.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control form-control-solid form-control-lg" name="email" id="email" placeholder="john.wick@reeves.com" value="" />
                                                    <span class="form-text text-muted">Please enter your email address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 1-->
                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Enter your Personal Information</h4>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label text-left">Avatar</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="image-input image-input-outline" id="kt_user_add_avatar">
                                                        <div class="image-input-wrapper" style="background-image: url(assets/media/users/default.jpg)"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg, .gif, .svg" />
                                                            <input type="hidden" name="profile_avatar_remove" />
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input class="form-control form-control-solid form-control-lg" name="birthday" id="birthday" type="date" value="2011-08-19" />
                                            {{--  <input type="text" class="form-control form-control-solid form-control-lg" name="birthday" placeholder="Birth day" value="" />  --}}
                                            <span class="form-text text-muted">Please enter your birthday.</span>
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control form-control-solid form-control-lg" id="gender" name="gender">
                                                <option value="f">Female</option>
                                                <option value="m">Male</option>
                                            </select>
                                            <span class="form-text text-muted">Please enter your gender.</span>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end: Wizard Step 2-->
                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Setup Your Current Location</h4>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Address Line</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="streetAddress" id="streetAddress" placeholder="Address Line" value="" />
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Postcode</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="postcode" id="postcode" placeholder="Postcode" value="" />
                                                    <span class="form-text text-muted">Please enter your Postcode.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="city" placeholder="City" id="city" value="" />
                                                    <span class="form-text text-muted">Please enter your City.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="state" placeholder="State" id="state" value="" />
                                                    <span class="form-text text-muted">Please enter your State.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="country" id="country" placeholder="Country" value="" />
                                                    <span class="form-text text-muted">Please enter your State.</span>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 3-->
                                    <!--begin: Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <!--begin::Section-->
                                        <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                        <div class="border-bottom mb-5 pb-5">
                                            <div class="font-weight-bolder mb-3">Your Account Details:</div>
                                            <div class="line-height-xl" ><p id="review_name"></p></div>
                                            <div class="line-height-xl" ><p id="review_phone"></p></div>
                                            <div class="line-height-xl" ><p id="review_email"></p></div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>

                                        <div class="border-bottom mb-5 pb-5">
                                            <div class="font-weight-bolder mb-3">Your Address Details:</div>
                                            <div class="line-height-xl" ><p id="review_streetAddress"></p></div>
                                            <div class="line-height-xl" ><p id="review_postcode"></p></div>
                                            <div class="line-height-xl" ><p id="review_city"></p></div>
                                            <div class="line-height-xl" ><p id="review_state"></p></div>
                                            <div class="line-height-xl" ><p id="review_country"></p></div>
                                        </div>
                                        <div class="separator separator-dashed my-5"></div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end: Wizard Step 4-->
                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                            </div>
                            <!--end: Wizard-->
                        </div>
                        <!--end: Wizard Form-->
                    </div>
                    <!--end: Wizard Body-->
                </div>
                <!--end: Wizard-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                {{--  <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>  --}}
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

