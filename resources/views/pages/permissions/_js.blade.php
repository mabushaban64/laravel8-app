<script>

    //js for custom datatable
    @include('pages.permissions._datatable')


        //delete perms
function deletePermission(id) {
    var url = BASE_URL + "/permissions/delete/"+id;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then(function (result) {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                async: false,
                dataType: "json",
                url: url,
                type: 'DELETE',
                success: function(data) {
                    if (data.msg == 'success') {
                        Swal.fire(
                            "Deleted!",
                            "Permission "+data.permission_name+" Deleted!",
                                "success"
                            ).then((result) => {
                            // Reload the Page
                            location.reload();
                            });
                    }},
                error: function(er) {}
            })
            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            Swal.fire(
                'Cancelled',
                'Permission is safe :)',
                'error'
            )
        }
    });
}

jQuery(document).ready(function () {


    //add perms
    jQuery('body').on('click', '.open-modal-add', function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#addEditModal').modal('show');
        document.getElementById("formModalLabel").innerHTML = 'Add new permission';
    });

    //edit perms
     jQuery('body').on('click', '.open-modal-edit', function () {
        var permission_id = $(this).val();
        $.get('permissions/edit/' + permission_id, function (data) {
            jQuery('#name').val(data.name);
            jQuery('#description').val(data.description);
            jQuery('#permission_id').val(data.id);

            jQuery('#btn-save').val("edit");
            jQuery('#addEditModal').modal('show');
            document.getElementById("formModalLabel").innerHTML = 'Edit permission : '+data.name+'  ';
        });
    });

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(document.getElementById("myForm"));
        var type = "POST";
        var state = jQuery('#btn-save').val();
        var permission_id = jQuery('#permission_id').val();
        var ajaxurl = BASE_URL + "/permissions/store" ;
        if (state == "edit") {
            ajaxurl = BASE_URL + "/permissions/update/"+ permission_id;
            formData.append('_method', 'PUT');
        }
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend:function(){
                $(document).find('span.error-text').text('');
            },
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
                            jQuery('#myForm').trigger("reset");
                            jQuery('#formModal').modal('hide');
                        }else{
                            $.each(data.error, function( key, value ) {
                                $('span.'+key+'_error').text(value[0]);
                            });

                           {{--  $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display','block');
                            $.each(data.error, function( key, value ) {  $(".print-error-msg").find("ul").append('<li>'+value+'</li>');  }); --}}
                        }
            },
            error: function (data) {
                console.log(data);
            }
        });
      });


    kt_datatable_getpermissions.init();
});
</script>
