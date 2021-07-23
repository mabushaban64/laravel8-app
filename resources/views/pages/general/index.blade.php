@extends('pages.layout')
@section('title' , __("General Form"))
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">General Form</h5>
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
                    <h3 class="card-title">General Form</h3>
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
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Date</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="kt_datepicker_2" name="date" readonly="readonly" placeholder="Select date" />

                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                            <span class="text-danger error-text date_error" id="date_error"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Date Time</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                                    <input type="text" name="datetime" class="form-control datetimepicker-input" placeholder="Select date &amp; time" data-target="#kt_datetimepicker_1" />
                                    <div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
                                        <span class="input-group-text">
                                            <i class="ki ki-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="text-danger error-text datetime_error" id="datetime_error"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Time</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="input-group timepicker">
                                    <input class="form-control" id="kt_timepicker_2" name="time" readonly="readonly" placeholder="Select time" type="text" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-clock-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="text-danger error-text time_error" id="time_error"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Date Range</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class='input-group' id='kt_daterangepicker_2'>
                                    <input type='text' class="form-control" name="daterange" readonly="readonly" placeholder="Select date range" />

                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="text-danger error-text daterange_error" id="daterange_error"></span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">Range Slider</label>
                            <div class="col-lg-8 col-md-9 col-sm-12">
                                <div class="ion-range-slider">
                                    <input type="hidden" name="slider" id="kt_slider_1" />
                                    <span class="text-danger error-text slider_error" id="slider_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-color-input" class="col-form-label col-lg-3 col-sm-12 text-right">Color</label>
                            <div class="col-lg-8 col-md-9 col-sm-12">
                                <div class="input-group">
                                    <input class="form-control" type="color" name="color" value="#563d7c" id="example-color-input" />
                                    <span class="text-danger error-text color_error" id="color_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">user email</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                {{--  <select class="form-control select2" id="kt_select2" name="select2">
                                    <option label="Label"></option>
                                    @foreach ($users as $item)
                                    <option value="id">{{ $item->email }}</option>
                                    @endforeach
                                </select>  --}}
                                <select id='user_id' class="form-control select2" name="email">
                                    {{--  <option value='0'>- Search -</option>  --}}
                                 </select>
                                 <span class="text-danger error-text email_error" id="email_error"></span>
                                <span class="form-text text-muted">Select an option</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-right">content</label>
                            <div class="col-lg-7 col-md-9 col-sm-12">
                                <textarea name="content" class="form-control" data-provide="markdown" rows="10"></textarea>
                                <span class="text-danger error-text content_error" id="content_error"></span>
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
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}"></script>
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js') }}"></script>
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/bootstrap-daterangepicker.js') }}"></script>
		<script src="{{ asset('assets/js/pages/crud/forms/widgets/ion-range-slider.js') }}"></script>
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
                var ajaxurl = BASE_URL + "/general/store" ;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
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
                });
            });
            (function() {

            $("#user_id").select2({
                placeholder: 'email ...',
                allowClear: true,
                ajax: {
                    url: 'general/dataforselect2',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            term: params.term || '', //for search
                            page: params.page || 1 //for pagination
                        }
                    },
                    cache: true
                }
            });
            })();

    </script>
@endsection
