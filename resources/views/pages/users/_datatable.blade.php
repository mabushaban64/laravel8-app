const general_data = {};

datatable = null;
var kt_datatable_getUsers = function() {

    var options = {
        // datasource definition

        data: {
            type: 'remote',
            source: {
                read: {
                    url: BASE_URL + '/users', //BASE_URL >> custom var
                    method : 'GET',
                   /*   map: function (t) {
                        var e = t;
                         t.data.forEach(row => { general_data[row.id] = row;});
                        return void 0 !== t.data && (e = t.data), e;
                    }  */
                    map: function(data) {
                        return data.data;
                    }
                },
            },
            pageSize: 10,
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },

        // layout definition
        layout: {
            scroll: false, // enable/disable datatable scroll both horizontal and
            footer: false // display/hide footer
        },

        // column sorting
        sortable: true,

        pagination: true,
        // columns definition
        columns: [{
            field: 'id', //ColumnName
            title: '#', //Column Name
            sortable: false,
            width: 10,
            selector: true, //Enable column as selector
            textAlign: 'center',
        }, {
            field: 'fname',
            title: 'User',
            width: 250,
            template: function(row) {
                var imgurl = BASE_URL + row.avatar;
                //'background-image:url("+imgurl+")';
                var user_img = 'background-image:url(' + imgurl + ')';
                return '\
                <div class="d-flex align-items-center">\
                    <div class="symbol symbol-40 flex-shrink-0">\
                        <div class="symbol-label" style="' + user_img + '"></div>\
                </div>\
                <div class="ml-2">\
                    <div class="text-dark-75 font-weight-bold line-height-sm">' + row.fname + ' ' + row.lname +'</div>\
                    <a href="#" class="font-size-sm text-dark-50 text-hover-primary">' +
                        row.email + '</a>\
                </div>\
            </div>\
             ';
            },
        },  {
            field: 'phone',
            title: 'Phone',
        },  {
            field: 'birthday',
            title: 'Birthday',
            type: 'date',
            format: 'MM/DD/YYYY',
        },{
            field: 'country',
            title: 'Country',
            template: function(row) {
                //return row.street_address + '/' + row.city + '/' + row.state + '/' + row.country;
                return row.country;
            },
        },{
            field: 'gender',
            title: 'Gender',
            // callback function support for column rendering
            template: function(row) {
                var status = {
                    f: {'title': 'fmale', 'class': ' label-light-success'},
                    m: {'title': 'male', 'class': ' label-light-danger'},
                };
                return '<span class="label label-lg font-weight-bold' + status[row.gender].class + ' label-inline">' + status[row.gender].title + '</span>';
            },
        },
        {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 125,
            overflow: 'visible',
            textAlign: 'left',
            autoHide: false,
            template: function(row) {
                return '\
                @if(auth()->user()->can('users.edit')  || auth()->user()->hasRole('super-admin'))\
                   <button class="btn btn-sm btn-clean btn-icon mr-2 open-modal-edit" id="editUser" value="' + row.id + '" title="Edit details">\
                        <span class="svg-icon svg-icon-md">\
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                    <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                </g>\
                            </svg>\
                        </span>\
                    </button>\
                    @endif\
                    @if(auth()->user()->can('users.delete')  || auth()->user()->hasRole('super-admin'))\
                    <button onclick="deleteUser(' + row.id + ')" class="btn btn-sm btn-clean btn-icon" title="Delete">\
                        <span class="svg-icon svg-icon-md">\
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
                                </g>\
                            </svg>\
                        </span>\
                    </button>\
                    @endif\
                    @if(auth()->user()->can('roles') && auth()->user()->can('roles.permissions') && auth()->user()->can('roles.grantPermission') && auth()->user()->can('roles.revokePermission')  || auth()->user()->hasRole('super-admin'))\
                    <button class="btn btn-sm btn-clean btn-icon mr-2 open-modal-roles" id="setRoles" value="' + row.id + '" title="Assign Roles">\
                        <span class="svg-icon svg-icon-md">\
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                    <rect x="0" y="0" width="24" height="24"/>\
                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>\
                                </g>\
                            </svg>\
                        </span>\
                    </button>\
                    @endif\
                ';
            },
        }],
    };


    return {
        // public functions
        init: function() {
            // enable extension
        options.extensions = {
            // boolean or object (extension options)
            checkbox: true,
        };

        options.search = {
            input: $('#search_input'),
            // search delay in milliseconds
            key: 'generalSearch',
            delay: 1000,
        };

        var datatable = $('#kt_datatable').KTDatatable(options);


        $('#kt_datatable_search_gender').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'gender'); //datatable.search(value, column)
        });

        $('#kt_datatable_search_gender').selectpicker();

        datatable.on(
            'datatable-on-check datatable-on-uncheck',
            function(e) {
                var checkedNodes = datatable.rows('.datatable-row-active').nodes();
                var count = checkedNodes.length;
                $('#kt_datatable_selected_records').html(count);
                if (count > 0) {
                    $('#kt_datatable_group_action_form').collapse('show');
                } else {
                    $('#kt_datatable_group_action_form').collapse('hide');
                }
            });

        $('#kt_datatable_fetch_modal').on('show.bs.modal', function(e) {
            var ids = datatable.checkbox().getSelectedId();
            var c = document.createDocumentFragment();
            for (var i = 0; i < ids.length; i++) {
                var li = document.createElement('li');
                li.setAttribute('data-id', ids[i]);
                li.innerHTML = 'Selected record ID: ' + ids[i];
                c.appendChild(li);
            }
            $('#kt_datatable_fetch_display').append(c);
        }).on('hide.bs.modal', function(e) {
            $('#kt_datatable_fetch_display').empty();
        });

        $("#btn-ids").click(function (e) {
            var ids = datatable.checkbox().getSelectedId();
           // console.log(ids);

            var url = BASE_URL + "/users/deleteall";

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
                        data: {id:ids},
                        type: 'POST',
                        success: function(data) {

                            if (data.msg == 'success') {
                                Swal.fire(
                                    "Deleted!",
                                    "Selected Users Deleted!",
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
                            }
                        },
                        error: function(er) {}
                    });
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

        });
        },
    };

}();
