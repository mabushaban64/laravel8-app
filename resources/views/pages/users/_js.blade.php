<script>

    //js for custom datatable
    @include('pages.users._usersdatatable')
    //js for edit user page
    @include('pages.users._editjs')
    //js for add user page
    @include('pages.users._addjs')


        //delete user
function deleteUser(id) {
    var root = '{{URL::to('/')}}';
    var url = root + "/users/delete/"+id;
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

jQuery(document).ready(function () {
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

            var imageroot = '{{URL::to('/')}}';
            var imgurl = imageroot + "/storage/"+ data.avatar;
           $('.bg-image').css("background-image", "url("+imgurl+")");
            jQuery('#2_birthday').val(data.birthday);
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
