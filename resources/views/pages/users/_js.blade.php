<script>

    //js for custom datatable
    @include('pages.users._datatable')
    //js for edit user page
    @include('pages.users._editjs')
    //js for add user page
    @include('pages.users._addjs')


        //delete user
function deleteUser(id) {
    var url = BASE_URL + "/users/delete/"+id;
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
                            "User "+data.user_name+" Deleted!",
                                "success"
                            ).then((result) => {
                            // Reload the Page
                            location.reload();
                            //blockUI
                            $(document).ajaxStart(KTApp.blockPage({
                                overlayColor: '#000000',
                                state: 'primary',
                                message: 'Processing...'
                            }));
                            $(document).ajaxStop(setTimeout(function() {KTApp.unblockPage() }, 2000));
                            });
                    }},
                error: function(er) {}
            })
            // result.dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
        } else if (result.dismiss === 'cancel') {
            Swal.fire(
                'Cancelled',
                'User is safe :)',
                'error'
            )
        }
    });
}

{{-- function users_Search(){/
    $.ajax({
        async: false,
        dataType: "json",
        url: BASE_URL + '/users/get',
        type: 'get',
    });
} --}}

jQuery(document).ready(function () {
    //set roles
    jQuery('body').on('click', '.open-modal-roles', function () {
        var user_id = $(this).val();
        $.get('users/roles/' + user_id, function (data) {

            jQuery('#user_id').val(user_id);

            var granted_roles_array = '';
            $.each(data.granted_roles, function( key, value ) {
                granted_roles_array = granted_roles_array + '<div class="checkbox-inline mb-2"><label class="checkbox"><input disabled="disabled" type="checkbox" name = "role[]" value="' + value.id + '" /><span></span>' + value.name + '</label></div>';
            });
            $("#granted_roles_array").html(granted_roles_array);


            var grant_roles_array = '';
            $.each(data.roles, function( key, value ) {
                grant_roles_array = grant_roles_array + '<div class="checkbox-inline mb-2"><label class="checkbox checkbox-success"><input type="checkbox" name = "role[]" value="' + value.id + '" /><span></span>' + value.name + '</label></div>';
            });
            $("#grant_roles_array").html(grant_roles_array);


            var revoke_roles_array = '';
            $.each(data.granted_roles, function( key, value ) {
                revoke_roles_array = revoke_roles_array + '<div class="checkbox-inline mb-2"><label class="checkbox checkbox-danger"><input type="checkbox" name = "role[]" value="' + value.id + '" /><span></span>' + value.name + '</label></div>';
            });
            $("#revoke_roles_array").html(revoke_roles_array);


            jQuery('#rolesModal').modal('show');
            document.getElementById("formModalLabel2").innerHTML = 'Assign roles for User : '+data.user.fname+' '+data.user.lname+' ';
        })
    });

    $("#btn-save-grant").click(function (e) {
        console.log('in ajax');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(document.getElementById("grantRoleForm"));
        var type = "POST";
        var user_id = jQuery('#user_id').val();
        var ajaxurl = BASE_URL + "/users/grantRole/"+ user_id;
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
                }else{
                    $.each(data.error, function( key, value ) {
                        $('span.'+key+'_error').text(value[0]);
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
    $("#btn-save-revoke").click(function (e) {
        console.log('in ajax');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(document.getElementById("revokeRoleForm"));
        var type = "POST";
        var user_id = jQuery('#user_id').val();
        var ajaxurl = BASE_URL + "/users/revokeRole/"+ user_id;
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
                }else{
                    $.each(data.error, function( key, value ) {
                        $('span.'+key+'_error').text(value[0]);
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


    $("#fname").keyup(function() { $("#review_name").html($("#fname").val()+' '+$("#lname").val()); });
    $("#lname").keyup(function() { $("#review_name").html($("#fname").val()+' '+$("#lname").val()); });
    $("#phone").keyup(function() { $("#review_phone").html($("#phone").val()); });
    $("#email").keyup(function() { $("#review_email").html($("#email").val()); });
    $("#streetAddress").keyup(function() { $("#review_streetAddress").html($("#streetAddress").val()); });
    $("#postcode").keyup(function() { $("#review_postcode").html($("#postcode").val()); });
    $("#city").keyup(function() { $("#review_city").html($("#city").val()); });
    $("#state").keyup(function() { $("#review_state").html($("#state").val()); });
    $("#country").keyup(function() { $("#review_country").html($("#country").val()); });

    //edit user
    jQuery('body').on('click', '.open-modal-edit', function () {
        var user_id = $(this).val();
        $.get('users/edit/' + user_id, function (data) {
            jQuery('#2_user_id').val(data.id);
            jQuery('#2_fname').val(data.fname);
            jQuery('#2_lname').val(data.lname);
            jQuery('#2_phone').val(data.phone);
            jQuery('#2_email').val(data.email);

            var imgurl = BASE_URL + "/storage/users/"+ data.avatar;
            /*
            var name = data.avatar;
            var url = BASE_URL + "/userImagePath/"+ name;
             $.ajax({
                type: 'GET',
                url: url,
                data: name,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('.bg-image').css("background-image", "url("+data+")");
                },
                error: function (data) {
                    console.log(data);
                    $('.bg-image').css("background-image", "url("+data+")");
                }
            }); */

            jQuery('#2_birthday').val(data.birthday);
            //$('.bg-image').css("background-image", "url('{{ userImagePath("+data.avatar+") }}')");
            $('.bg-image').css("background-image", "url("+imgurl+")");
            jQuery('#2_gender').val(data.gender);

            jQuery('#2_streetAddress').val(data.street_address);
            jQuery('#2_postcode').val(data.postal_code);
            jQuery('#2_city').val(data.city);
            jQuery('#2_state').val(data.state);
            jQuery('#2_country').val(data.country);

            $("#2_review_name").html(data.fname+' '+data.lname);
            $("#2_review_phone").html(data.phone);
            $("#2_review_email").html(data.email);

            $("#2_review_streetAddress").html(data.street_address);
            $("#2_review_postcode").html(data.postal_code);
            $("#2_review_city").html(data.city);
            $("#2_review_state").html(data.state);
            $("#2_review_country").html(data.country);

            jQuery('#editModal').modal('show');
            document.getElementById("formModalLabel").innerHTML = 'Edit User : '+data.fname+' '+data.lname+' ';
        })
    });

    $("#2_fname").keyup(function() { $("#2_review_name").html($("#2_fname").val()+' '+$("#2_lname").val()); });
    $("#2_lname").keyup(function() { $("#2_review_name").html($("#2_fname").val()+' '+$("#2_lname").val()); });
    $("#2_phone").keyup(function() { $("#2_review_phone").html($("#2_phone").val()); });
    $("#2_email").keyup(function() { $("#2_review_email").html($("#2_email").val()); });
    $("#2_streetAddress").keyup(function() { $("#2_review_streetAddress").html($("#2_streetAddress").val()); });
    $("#2_postcode").keyup(function() { $("#2_review_postcode").html($("#2_postcode").val()); });
    $("#2_city").keyup(function() { $("#2_review_city").html($("#2_city").val()); });
    $("#2_state").keyup(function() { $("#2_review_state").html($("#2_state").val()); });
    $("#2_country").keyup(function() { $("#2_review_country").html($("#2_country").val()); });

    kt_datatable_getUsers.init();
	KTWizard2.init();
	edit_KTWizard2.init();
});
</script>
