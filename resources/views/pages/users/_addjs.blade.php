 //wizard with validation
 var KTWizard2 = function () {

	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: false // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });



            var url = BASE_URL + "/users/store"; //custom var (BASE_URL)
            /* var formData = {
                fname: jQuery('#fname').val(),lname: jQuery('#lname').val(),email: jQuery('#email').val(),phone: jQuery('#phone').val(),
                avatar: jQuery('#avatar').val(),birthday: jQuery('#birthday').val(),gender: jQuery('#gender').val(),
                streetAddress: jQuery('#streetAddress').val(),postcode: jQuery('#postcode').val(),city: jQuery('#city').val(),state: jQuery('#state').val(),country: jQuery('#country').val(),};*/
            $.ajax({
                type: 'POST',
                url: url,
                //data: formData,
                data: new FormData(document.getElementById("kt_form")),
                processData: false,
                contentType: false,

                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.error)){
                        console.log('ok ajax');
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
                                {{--  _formEl.submit();  --}} // Submit form
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
                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display','block');
                        $.each( data.error, function( key, value ) {  $(".print-error-msg").find("ul").append('<li>'+value+'</li>');  });
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					fname: {
						validators: {
							notEmpty: {
								message: 'First name is required'
							}
						}
					},
					lname: {
						validators: {
							notEmpty: {
								message: 'Last Name is required'
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Phone is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

        // Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					birthday: {
						validators: {
							notEmpty: {
								message: 'Birthday is required'
							}
						}
					},
					gender: {
						validators: {
							notEmpty: {
								message: 'Gender is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					streetAddress: {
						validators: {
							notEmpty: {
								message: 'Address is required'
							}
						}
					},
					postcode: {
						validators: {
							notEmpty: {
								message: 'Postcode is required'
							}
						}
					},
					city: {
						validators: {
							notEmpty: {
								message: 'City is required'
							}
						}
					},
					state: {
						validators: {
							notEmpty: {
								message: 'State is required'
							}
						}
					},
					country: {
						validators: {
							notEmpty: {
								message: 'Country is required'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard');
			_formEl = KTUtil.getById('kt_form');

			_initWizard();
			_initValidation();
		}
	};
}();
