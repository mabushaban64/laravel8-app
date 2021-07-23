@extends('pages.layout')
@section('title' , __("Dropzone"))
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dropzone File Upload</h5>
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
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label">Dropzone File Upload</h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form action="{{ route('dropzone.store') }}" method="POST" class="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">images</label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                    <div class="dropzone-msg dz-message needsclick">
                                        <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                        <span class="dropzone-msg-desc">Only image files are allowed for upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-3"></div>
                            <div class="col-lg-4">
                                {{--  <button type="submit" class="btn btn-light-primary mr-2">Submit</button>  --}}
                                {{--  <button type="{{ route('dropzone') }}" class="btn btn-primary">Cancel</button>  --}}
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
<script>
    $('#kt_dropzone_3').dropzone({
        url: "{{route('dropzone.store')}}", // Set the url for your upload script location
        headers:{'X-CSRF-TOKEN': "{{csrf_token()}}"},
        paramName: "file", // The name that will be used to transfer the file
        maxFiles: 10,
        maxFilesize: 10, // MB
        addRemoveLinks: true,
        //acceptedFiles: "image/*,application/pdf,.psd",
        acceptedFiles: "image/*",
        autoProcessQueue: true,
        init: function() {
        this.on("success", function(file, response) {
            //console.log(response);
            file.serverId = response;
            console.log(file.serverId);
          });

        this.on("removedfile", function(file) {
        if (!file.serverId) { return; }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
        url: BASE_URL + "/dropzone/delete/"+file.serverId,
        data: { imageId: file.serverId},
        type: 'DELETE',
        success: function (data) {
            if (data.msg === "success") {
                toastr.success('deleted successfully!');
           } else {
                toastr.error('there is an Error!');
           }
        },
            {{--  error: function (data) {
                 toastr.error(data.Message);
            }  --}}
        })
        });
        }
        
        {{--  accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
                done("Naha, you don't.");
            } else {
                done();
            }
        }  --}}
    });
</script>
		{{--  <script src="{{ asset('assets/js/pages/crud/file-upload/dropzonejs.js') }}"></script>  --}}
@endsection
