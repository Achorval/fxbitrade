$(function () {
    "use strict";   
	// To make Pace works on Ajax calls
	$(document).ajaxStart(function () {
		Pace.restart()
	});

	$('.registerForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".registerForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm' style='margin-right: 5px' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) { 
				if (response.status == 'success') {
					if (response.user.email == 'kingsley@gmail.com' || response.user.email == 'elizabeth@gmail.com') {
						window.location = '/admin/dashboard';
					} else {
						window.location = '/user/dashboard';
					}
				}
			},
			error: function (error) {
				$.each(error.responseJSON.errors, function(prefix, value) {
					$('span.'+prefix+'-feedback').text(value[0]);
				});
				$('.waves-effect').attr('disabled', false);
				$('.waves-effect').html("Register");
			} 
		});
	});

	$('.loginForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".loginForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' style='margin-right: 5px' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'success') {
					$('.waves-effect').html("Login Successful");
					if (response.data.email == 'kingsley@gmail.com' || response.data.email == 'elizabeth@gmail.com') {
						window.location = '/admin/dashboard';
					} else {
						window.location = '/user/dashboard';
					}
				}
			},
			error: function (error) {
				$.each(error.responseJSON.errors, function(prefix, value) {
					$('span.'+prefix+'-feedback').text(value[0]);
				});
				$('.waves-effect').attr('disabled', false);
				$('.waves-effect').html("Login");
			} 
		});
	}); 
	
	$('.passwordEmailForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".passwordEmailForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.message) {
					$('#status').html("<div class='callout callout-success text-center'>"+response.message+"</div>");
				}
			},
			error: function (error) {
				console.log(error);
				$.each(error.responseJSON.errors, function(prefix, value) {
					$('span.'+prefix+'-feedback').text(value[0]);
				});
			} 
		});
	});

	$('.fetchCurrency').on('click',function (e) {
		var currency_id = $(this).data('id');  
		$.ajax({ 
			url: "/user/deposit/currency/"+currency_id,
			type: "GET",
			success: function (response) {
				if (response.status == 'success') {
					$('#depositModal').modal('toggle');
					$('#image').html(response.data.image);
					$('#currency_id').val(response.data.id);
					$('#currency').val(response.data.name);
					$('#user_id').val(response.user.id);
					$('#username').val(response.user.username);
					$('#address').val(response.data.address);
				}
			}
		});
	});


	$('.createDepositForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".createDepositForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Save Transaction");
				} else {
					$('.createDepositForm')[0].reset();
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Save Transaction");
					$('#depositModal').modal('hide');
					successAlert(response.message);
				}
			}
		});
	});

	$('.withdrawForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".withdrawForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error1') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Withdraw");
				} else if (response.status == 'error2') {
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Withdraw");
					errorAlert(response.message);
				} else {
					$('.withdrawForm')[0].reset();
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Withdraw");
					successAlert(response.message);
				}
			}
		});
	});

	$('.profileForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".profileForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('button').attr('disabled', true);
				$('button').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('button').attr('disabled', false);
					$('button').html("Update");
				} else {
					$('button').attr('disabled', false);
					$('button').html("Update");
					successAlert(response.message);
				}
			}
		});
	});
	
	$('.referralSettingsForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "PUT",
			data: $(".referralSettingsForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.referral-btn').attr('disabled', true);
				$('.referral-btn').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.referral-btn').attr('disabled', false);
					$('.referral-btn').html("Update");
				} else {
					$('.referral-btn').attr('disabled', false);
					$('.referral-btn').html("Update");
					successAlert(response.message);
				}
			}
		});
	});

	$('.companyForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".companyForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('button').attr('disabled', true);
				$('button').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('button').attr('disabled', false);
					$('button').html("Update");
				} else {
					$('button').attr('disabled', false);
					$('button').html("Update");
					successAlert(response.message);
				}
			}
		});
	});

	$('.changePasswordForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".changePasswordForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('button').attr('disabled', true);
				$('button').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error1') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'_feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Submit");

				} else if(response.status == 'error' ) {
					errorAlert(response.message);
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Submit");
				}  else {
					successAlert(response.message);
					$('.changePasswordForm')[0].reset();
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Submit");
				}
			}
		});
	});

	$('.resendEmail').on('click',function (e) {
		var id = $(this).data('id');  
		$.ajax({ 
			url: "/user/email/resend/"+id,
			type: "GET",
			beforeSend: function () {
				$('.resendEmail').attr('disabled', true);
				$('.resendEmail').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'success') {
					successAlert(response.message);
					$('.resendEmail').attr('disabled', false);
					$('.resendEmail').html("Resend Email");
				}
			}
		});
	});


	// ADMIN JAVASCRIPT
	$('.createCurrencyForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".createCurrencyForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					successAlert(response.message);
					setTimeout(function() { 
						window.location = '/admin/currencies';
					}, 2000);
				}
			}
		});
	});

	$('.editCurrency').on('click',function (e) {
		var currency_id = $(this).data('id');
		$.ajax({ 
			url: "/admin/currencies/edit/"+currency_id,
			type: "GET",
			success: function (response) {
				if (response.status == 'success') {
					$('#editCurrency').modal('toggle');
					$('#name').val(response.data.name);
					$('#image').val(response.data.image);
					$('#address').val(response.data.address);
					$('#acronym').val(response.data.acronym);
					$('#status').val(response.data.status);
					$('#currency_id').val(response.data.id);
				}
			}
		});
	});
	
	$('.updateCurrencyForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: "/admin/currencies/update/"+$('#currency_id').val(), 
			type: "PUT",
			data: $(".updateCurrencyForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					successAlert(response.message);
					setTimeout(function() { 
						window.location = '/admin/currencies';
					}, 3000);
				}
			}
		});
	});

	$('.deleteCurrency').on('click',function (e) {
		var currency_id = $(this).data('id');
		swal({   
			title: "Are you sure?",   
			text: "You will not be able to recover this imaginary file!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes, delete it!",   
			closeOnConfirm: false 
		}, function() { 
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});  
			$.ajax({ 
				url: "/admin/currencies/delete/"+currency_id,
				type: "DELETE",
				success: function (response) {
					if (response.status == 'success') {
						swal("Deleted!", response.message, "success"); 
						setTimeout(function() { 
							window.location = '/admin/currencies';
						}, 2000);
					} 
				}
			});
		});
	});


	$('.createPlanForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".createPlanForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					successAlert(response.message);
					setTimeout(function() { 
						window.location = '/admin/plans';
					}, 2000);
				}
			}
		});
	});

	$('.editPlan').on('click',function (e) {
		var plan_id = $(this).data('id');
		$.ajax({ 
			url: "/admin/plans/edit/"+plan_id,
			type: "GET",
			success: function (response) {
				if (response.status == 'success') {
					$('#editPlan').modal('toggle');
					$('#name').val(response.data.name);
					$('#minimum').val(response.data.minimum);
					$('#maximum').val(response.data.maximum);
					$('#percent').val(response.data.percent);
					$('#status').val(response.data.status);
					$('#duration').val(response.data.duration);
					$('#support').val(response.data.support);
					$('#color').val(response.data.color);
					$('#plan_id').val(response.data.id);
				}
			}
		});
	});

	$('.updatePlanForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: "/admin/plans/update/"+$('#plan_id').val(), 
			type: "PUT",
			data: $(".updatePlanForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					successAlert(response.message);
					setTimeout(function() { 
						window.location = '/admin/plans';
					}, 3000);
				}
			}
		});
	});

	$('.deletePlan').on('click',function (e) {
		var plan_id = $(this).data('id');
		swal({   
			title: "Are you sure?",   
			text: "You will not be able to recover this imaginary file!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Yes, delete it!",   
			closeOnConfirm: false 
		}, function() { 
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});  
			$.ajax({ 
				url: "/admin/plans/delete/"+plan_id,
				type: "DELETE",
				success: function (response) {
					if (response.status == 'success') {
						swal("Deleted!", response.message, "success"); 
						setTimeout(function() { 
							window.location = '/admin/plans';
						}, 2000);
					} 
				}
			});
		});
	});

	
	$('.updateUser').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'), 
			type: "PUT",
			data: $(".updateUser").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error1') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");

				} else if(response.status == 'error2' ) {
					errorAlert(response.message);
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else if(response.status == 'error3' ) {
					errorAlert(response.message);
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					successAlert(response.message);
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
					setTimeout(function() { 
						window.location = '/admin/users';
					}, 2000);
				}
			}
		});
	}); 


	$('.addTransactionForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "POST",
			data: $(".addTransactionForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Send Transaction");
				} else if (response.status == 'error1') {
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Send Transaction");
					errorAlert(response.message);
				} else {
					successAlert(response.message);
					setTimeout(function() { 
						window.location = '/admin/users';
					}, 2000);
				}	
			}
		});
	});

	$('.processDeposit').click(function () {
		var transaction_id = $(this).data('id');
		var user_id = $(this).data('user_id');
		swal({   
            title: "Are you sure?",   
            text: "You will not be able to recover this transaction!",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes, delete it!",   
            cancelButtonText: "No, cancel plx!",   
            closeOnConfirm: true,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({ 
					url: "/admin/users/deposits/"+transaction_id,
					type: "PUT",
					success: function (response) {
						if (response.status == 'success') {
							successAlert(response.message);
							setTimeout(function() { 
								window.location = '/admin/users/deposits/'+user_id;
							}, 2500);
						} 
					}
				});
            } else {     
                swal("Cancelled", "Your imaginary file is safe :)", "error");   
            } 
        });
	});

	$('.processWithdrawPay').on('submit',function (e) {
		e.preventDefault();
		var transaction_id = $(this).data('id');
		
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({ 
			url: "/admin/withdraw_pay/"+transaction_id,
			type: "POST",
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'success') {
					successAlert(response.message); 
					setTimeout(function() { 
						window.location = '/admin/withdrawal_requests';
					}, 2500);
				} 
			}
		});
	});

	$('.statisticsForm').on('submit',function (e) {
		e.preventDefault();
		$.ajax({ 
			url: $(this).attr('action'),
			type: "PUT",
			data: $(".statisticsForm").serialize(),
			dataType: "json",
			beforeSend: function () {
				$(document).find('span.invalid-feedback').text('');
				$('.waves-effect').attr('disabled', true);
				$('.waves-effect').html("<span class='spinner-border spinner-border-sm mr-2' role='status' aria-hidden='true'></span> Please wait...");
			},
			success: function (response) {
				if (response.status == 'error') {
					$.each(response.errors, function(prefix, value) {
						$('span.'+prefix+'-feedback').text(value[0]);
					});
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
				} else {
					$('.waves-effect').attr('disabled', false);
					$('.waves-effect').html("Update");
					successAlert(response.message);
				}
			}
		});
	});

}); // End of use strict


function copy(value, message) {
	/* Get the text field */
	var copyText = document.getElementById(value);

	/* Select the text field */
	copyText.select();
	copyText.setSelectionRange(0, 99999); /* For mobile devices */

	/* Copy the text inside the text field */
	document.execCommand("copy");

	/* Alert the copied text */
	toastr.success("Copied successfully", message, {
		positionClass: "toast-top-right",
		timeOut: 5e3,
		closeButton: !0,
		debug: !1,
		newestOnTop: !0,
		progressBar: !0,
		preventDuplicates: !0,
		onclick: null,
		showDuration: "300",
		hideDuration: "1000",
		extendedTimeOut: "1000",
		showEasing: "swing",
		hideEasing: "linear",
		showMethod: "fadeIn",
		hideMethod: "fadeOut",
		tapToDismiss: !1
	})
}

function successAlert(message) {
	toastr.success(message, {
		positionClass: "toast-top-right",
		timeOut: 5e3,
		closeButton: !0,
		debug: !1,
		newestOnTop: !0,
		progressBar: !0,
		preventDuplicates: !0,
		onclick: null,
		showDuration: "300",
		hideDuration: "1000",
		extendedTimeOut: "1000",
		showEasing: "swing",
		hideEasing: "linear",
		showMethod: "fadeIn",
		hideMethod: "fadeOut",
		tapToDismiss: !1
	});
}

function errorAlert(message) {
	toastr.error(message, {
		positionClass: "toast-top-right",
		timeOut: 5e3,
		closeButton: !0,
		debug: !1,
		newestOnTop: !0,
		progressBar: !0,
		preventDuplicates: !0,
		onclick: null,
		showDuration: "300",
		hideDuration: "1000",
		extendedTimeOut: "1000",
		showEasing: "swing",
		hideEasing: "linear",
		showMethod: "fadeIn",
		hideMethod: "fadeOut",
		tapToDismiss: !1
	});
}


// We use cookies to deliver the best experience on Fiverr, to provide our services, for advertising and analytics, and to personalize content. You can edit your settings anytime from our Cookie Policy. To agree to the use of cookies, click Accept.