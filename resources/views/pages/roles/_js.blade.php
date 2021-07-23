<script>

    //js for custom datatable
    @include('pages.roles._datatable')


jQuery(document).ready(function () {


    //grant perms
    jQuery('body').on('click', '.open-modal-grant', function () {
        var role_id = $(this).val();
        $.get('roles/permissions/'+ role_id, function (data) {
            jQuery('#role_id').val(role_id);

            var permissions_array = '';
            $.each(data.permissions, function( key, value ) {
                permissions_array = permissions_array + '<div class="checkbox-inline mb-2"><label class="checkbox checkbox-success"><input type="checkbox" name = "permission[]" value="' + value.id + '" /><span></span>' + value.name + '</label></div>';
            });
            $("#permissions_array").html(permissions_array);

            jQuery('#btn-save').val("grant");
            jQuery('#grantRoleForm').trigger("reset");
            jQuery('#grantRevokeModal').modal('show');
            document.getElementById("formModalLabel").innerHTML = 'Grant permissions to Role : '+data.role.name+' ';
        });
    });

    //revoke perms
     jQuery('body').on('click', '.open-modal-revoke', function () {
        var role_id = $(this).val();
        $.get('roles/permissions/'+ role_id, function (data) {
            jQuery('#role_id').val(role_id);

            var permissions_array = '';
            $.each(data.granted_permissions, function( key, value ) {
                permissions_array = permissions_array + '<div class="checkbox-inline mb-2"><label class="checkbox checkbox-danger"><input type="checkbox" name = "permission[]" value="' + value.id + '" /><span></span>' + value.name + '</label></div>';
            });
            $("#permissions_array").html(permissions_array);

            jQuery('#btn-save').val("revoke");
            jQuery('#grantRoleForm').trigger("reset");
            jQuery('#grantRevokeModal').modal('show');
            document.getElementById("formModalLabel").innerHTML = 'Revoke permissions to Role : '+data.role.name+' ';
        });
    });

    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(document.getElementById("grantRoleForm"));
        var type = "POST";
        var state = jQuery('#btn-save').val();
        var role_id = jQuery('#role_id').val();
        var ajaxurl =  BASE_URL + "/roles/grantPerm/"+ role_id;
        if (state == "revoke") {
            ajaxurl = BASE_URL + "/roles/revokePerm/"+ role_id;
        }
        formData.append('_method', 'PUT');
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
                            jQuery('#grantRoleForm').trigger("reset");
                            jQuery('#grantRevokeModal').modal('hide');
                        }else{
                            $.each(data.error, function( key, value ) {
                                $('span.'+key+'_error').text(value[0]);
                                console.log(key);
                                console.log(value);
                                console.log(value[0]);
                            });

                            $(".print-error-msg").find("ul").html('');
                            $(".print-error-msg").css('display','block');
                            $.each(data.error, function( key, value ) {  $(".print-error-msg").find("ul").append('<li>'+value+'</li>');  });
                        }
            },
            error: function (data) {
                console.log(data);
            }
        });
      });


    kt_datatable_getroles.init();
});
</script>
