@extends('pages.layout')
@section('title' , __("Settings"))
@section('body')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Settings</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom example example-compact">
                <div class="card-header">
                    <h3 class="card-title">Settings</h3>
                </div>
                <!--begin::Form-->

                <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                    {{ csrf_field() }}
                    <div class="alert alert-danger mb-2 print-error-msg" role="alert" style="display:none;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul></ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="example-color-input" class="col-form-label col-lg-3 col-sm-12 text-right">Color</label>
                            <div class="col-lg-8 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input class="form-control" type="color" name="color" value="{{ $Settings->color }}" id="example-color-input" />
                                    <span class="text-danger error-text color_error" id="color_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Font</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <select class="form-control"  name="font">
                                    <option value="{{ $Settings->font }}">{{ $Settings->font }}</option>
                                    <option value='Poppins, Helvetica, "sans-serif"'>Poppins, Helvetica, "sans-serif" -default-</option>
                                    <option value='Times New Roman'>Times New Roman</option>
                                    <option value="Arial">Arial</option>
                                    <option value="monospace">monospace</option>
                                    <option value='Lucida Console'>Lucida Console</option>
                                </select>
                                 <span class="text-danger error-text email_error" id="email_error"></span>
                                <span class="form-text text-muted">Select an option</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" id="btn-save" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-light-primary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('scripts')
		<script src="{{ asset('assets/js/pages/features/miscellaneous/blockui.js') }}"></script>
		{{--  <script src="{{ asset('assets/js/pages/crud/forms/validation/form-widgets.js') }}"></script>  --}}

        <script >

            $("#btn-save").click(function (e) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();

                var formData = new FormData(document.getElementById("myForm"));
                var type = "POST";
                var ajaxurl = BASE_URL + "/settings/store" ;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    beforeSend: function(){
                        $(document).find('span.error-text').text('');
                        KTApp.blockPage({
                            overlayColor: '#000000',
                            state: 'danger',
                            message: 'Please wait...'
                        });
                    },
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                                if($.isEmptyObject(data.error)){
                                    Swal.fire({
                                        text: "All is good! Please confirm the form submission.",
                                        icon: "success",
                                        showCancelButton: true,
                                        buttonsStyling: false,
                                        confirmButtonText: "Yes, submit!",
                                        cancelButtonText: "No, cancel",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-primary",
                                            cancelButton: "btn font-weight-bold btn-default"
                                        }
                                    }).then(function (result) {
                                        if (result.value) {
                                            location.reload();
                                        } else if (result.dismiss === 'cancel') {
                                            Swal.fire({
                                                text: "Your form has not been submitted!.",
                                                icon: "error",
                                                buttonsStyling: false,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn font-weight-bold btn-primary",
                                                }
                                            });
                                        }
                                    });
                                    console.log('ok');
                                    jQuery('#myForm').trigger("reset");
                                    jQuery('#formModal').modal('hide');
                                }else{
                                    $.each(data.error, function( key, value ) {
                                        var words = value.split(" ");
                                        $('span.'+words[1]+'_error').text(value);
                                        {{--  console.log(key);
                                        console.log(value);  --}}
                                    });

                                    {{--  console.log('error');
                                    console.log(data.error);  --}}
                                   $(".print-error-msg").find("ul").html('');
                                    $(".print-error-msg").css('display','block');
                                    $.each(data.error, function( key, value ) {  $(".print-error-msg").find("ul").append('<li>'+value+'</li>');  });
                                }
                    },
                    error: function (data) {
                        console.log(data);
                    },
                    complete: function(data){

                        KTApp.unblockPage();
                   }
                });
            });

    </script>
@endsection
