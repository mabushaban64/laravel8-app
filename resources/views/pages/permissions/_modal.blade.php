<!--begin::Modal-->
<div class="modal fade"  id="addEditModal" tabindex="-1" role="dialog" aria-labelledby="addEditModal" aria-hidden="true">
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
                <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                    <div class="form-group">
                        <label>Name
                        <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter a unique name" />
                        <span class="text-danger error-text name_error" id="name_error"></span>
                    </div>

                    <div class="form-group mb-1">
                        <label for="exampleTextarea">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        <span class="text-danger error-text description_error" id="description_error"></span>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                 <button type="submit" id="btn-save" class="btn btn-primary font-weight-bold">Save changes</button>
                 <input type="hidden" id="permission_id" name="permission_id" value="0">
            </div>
        </form>
        <!--end::Form-->
        </div>
    </div>
</div>
<!--end::Modal-->

