<!--begin::Modal-->
<div class="modal fade"  id="grantRevokeModal" tabindex="-1" role="dialog" aria-labelledby="grantRevokeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mb-2 print-error-msg" role="alert" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul></ul>
                </div>
                <!--begin::Form-->
                    <form id="grantRoleForm" name="grantRoleForm" novalidate="">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left"> </label>
                                        <div class="col-9">
                                            <div id="permissions_array"></div>
                                            <span class="text-danger error-text permission_error" id="permission_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--end::Row-->
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer pb-0">
                            <div class="row">
                                <div class="col-xl-2"></div>
                                <div class="col-xl-7">
                                    <div class="row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button type="submit" id="btn-save" class="btn btn-primary font-weight-bold">Save changes</button>
                                            <input type="hidden" id="role_id" name="role_id" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </form>
                <!--end::Form-->
            </div>
    </div>
</div>
<!--end::Modal-->

