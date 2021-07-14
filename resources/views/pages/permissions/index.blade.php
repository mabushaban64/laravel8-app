@extends('pages.layout')
@section('title' , __("Permissions"))
@section('css')
@endsection
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
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Permissions</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <!--end::Breadcrumb-->
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
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Permissions Table
                        <span class="d-block text-muted pt-2 font-size-sm"></span></h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                       <button class="btn btn-primary font-weight-bolder open-modal-add">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle fill="#000000" cx="9" cy="15" r="6" />
                                    <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>New Record</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Search Form-->
                    <!--end: Search Form-->
                    <!--begin: Selected Rows Group Action Form-->
                    <div class="mt-10 mb-5 collapse" id="kt_datatable_group_action_form">
                        <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-danger mr-3">Selected
                            <span id="kt_datatable_selected_records">0</span> records:</div>
                            <button class="btn btn-sm btn-danger mr-2"  id="btn-ids" type="submit">Delete All</button>
                            <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#kt_datatable_fetch_modal">Fetch Selected Records</button>
                        </div>
                    </div>
                    <!--end: Selected Rows Group Action Form-->
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Modal-->
            @section('modal')
            <div class="modal fade" id="kt_datatable_fetch_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Selected Records</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="scroll" data-scroll="true" data-height="200">
                                <ul id="kt_datatable_fetch_display"></ul>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                @include('pages.permissions._modal')
            @endsection

            <!--end::Modal-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
@endsection
@section('scripts')
        @include('pages.permissions._js')
        <script src="{{ asset('assets/js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
		<script src="{{ asset('assets/js/pages/features/miscellaneous/blockui.js') }}"></script>
@endsection
