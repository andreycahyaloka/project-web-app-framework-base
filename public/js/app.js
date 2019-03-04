// document ready
	$(document).ready(function ($) {
		// password generator ajax button
			$('input#myButtonPwgenOutput').click(function (event) {
				// prevent the form from submitting
				event.preventDefault();

				// run password generator ajax function
				pwgenAjax();
			});

		// age calculator ajax button
			$('input#myButtonAgecalcOutput').click(function (event) {
				event.preventDefault();

				agecalcAjax();
			});
		
		// string reverser ajax button
			$('input#myButtonStrrevOutput').click(function (event) {
				event.preventDefault();

				strrevAjax();
			});

		// form register - jquery-validation
			$('button#myButtonRegisterOutput').click(function () {
				formRegisterValidation();
			});
	});

/**
 * function
 */
// get base url for ajax
	function getBaseUrl() {
		var pathArray = location.href.split('/');
		var protocol = pathArray[0];
		var host = pathArray[2];
		var url = protocol + '//' + host + '/';
		
		return url;
	}

// password generator ajax
	function pwgenAjax() {
		// console.log(getBaseUrl());
		// var baseUrl = $('head base').attr('href');
		// var baseUrl1 = $(document.body).data('base');
		// console.log(baseUrl1 + ' fuck');
		var myFormPwgen = $('form#myFormPwgen').serializeArray();
		// var myPwgenLength = $('input#myPwgenLength').val();
		// console.log(myFormPwgen);
		// console.log(typeof myFormPwgen);
		// var myFormPwgenRegex = /^[0-9]{1,12}$/;
		var responseData = [];

		// if (!myFormPwgenRegex.test(myPwgenLength)) {
		// 	$('small#myPwgenLengthError').append('<li>number only (0-9).</li>');
		// 	$('small#myPwgenLengthError').append('<li>1-3 characters.</li>');
		// 	$('label#myPwgenOutputLabel').text('label');
		// 	$('input#myPwgenOutput').val('');
		// }
		// else {
			$('small#myPwgenLengthError').text('');
			$('label#myPwgenOutputLabel').text('loading...');

			$.ajax( {
				url: './pwgenajax',
				method: 'POST',
				data: myFormPwgen,
				// beforeSend: function(jqXHR, settings) {
				// 	document.write(settings.url);
				// },
				dataType: 'JSON',
				// set timeout 12 sec (in miliseconds)
				timeout: 12000,
			})
			.done(function (ResponseAjax) {
				// console.log('pwgen ajax success!');

				responseData = ResponseAjax;
				// console.log(responseData);

				// $.each(responseData, function(index, val) {
				// 	$('#myPwgenOutput').text(val);
				// 	console.log(index + ',' + val);
				// });

				$('input#myPwgenLength').val(responseData.pwgenLengths);
				$.each(responseData.pwgenLengthErrors, function (index, val) {
					$('small#myPwgenLengthError').append('<li>' + val + '</li>');
				});
				$('label#myPwgenOutputLabel').text('result:');
				$('input#myPwgenOutput').val(responseData.pwgenOutputs);
			})
			.fail(function (XMLHttpRequest, textStatus, errorThrown) {
				console.log('pwgen ajax failed!');
				console.log(XMLHttpRequest);
				console.log(XMLHttpRequest.statusText);
				console.log(XMLHttpRequest.responseText);
				console.log(XMLHttpRequest.responseJSON);
				console.log(textStatus);
				console.log(errorThrown);
			});
		// }
	}

// age calculator ajax
	function agecalcAjax() {
		var myFormAgecalc = $('form#myFormAgecalc').serializeArray();
		var responseData = [];

		$('small#myAgecalcDateError').text('');
		$('label#myAgecalcOutputLabel').text('loading...');

		$.ajax( {
			url: './agecalcajax',
			method: 'POST',
			data: myFormAgecalc,
			dataType: 'JSON',
			timeout: 12000,
		})
		.done(function (ResponseAjax) {
			responseData = ResponseAjax;

			$('input#myAgecalcDate').val(responseData.agecalcDates);
			$.each(responseData.agecalcDateErrors, function (index, val) {
				$('small#myAgecalcDateError').append('<li>' + val + '</li>');
			});
			$('label#myAgecalcOutputLabel').text('result:');
			$('input#myAgecalcOutput').val(responseData.agecalcOutputs);
		})
		.fail(function () {
			console.log('agecalc ajax failed!');
		});
	}

// string reverser ajax
	function strrevAjax() {
		var myFormStrrev = $('form#myFormStrrev').serializeArray();
		var responseData = [];

		$('small#myStrrevStringError').text('');
		$('label#myStrrevOutputLabel').text('loading...');

		$.ajax( {
			url: './strrevajax',
			method: 'POST',
			data: myFormStrrev,
			dataType: 'JSON',
			timeout: 12000,
		})
		.done(function (ResponseAjax) {
			responseData = ResponseAjax;

			$('input#myStrrevString').val(responseData.strrevStrings);
			$.each(responseData.strrevStringErrors, function (index, val) {
				$('small#myStrrevStringError').append('<li>' + val + '</li>');
			});
			$('label#myStrrevOutputLabel').text('result:');
			$('input#myStrrevOutput').val(responseData.strrevOutputs);
		})
		.fail(function () {
			console.log('strrev ajax failed!');
		});
	}

// form register jquery-validation
	function formRegisterValidation() {
		// jquery-validation addmethod (regex)
		$.validator.addMethod('validPassword',
			function (value, element, param) {
				if (value != '') {
					if (value.match(/.*[a-z]+.*/i) == null) {
						return false;
					}
					if (value.match(/.*\d+.*/) == null) {
						return false;
					}
				}
				return true;
			},
			'Must contain at least one letter and one number.'
		);

		// jquery-validation rules call element-name
		$('form#myFormRegister').validate( {
			rules: {
				'registerName': 'required',
				'registerEmail': {
					required: true,
					email: true,
					// ajax route to validate email exists
					remote: './validateemailajax'
				},
				'inputPassword': {
					required: true,
					minlength: 6,
					validPassword: true
				}
			},
			messages: {
				'registerEmail': {
					remote: 'email already exists.'
				},
				'inputPassword': {
					required: 'password can\'t be blank.',
					minlength: jQuery.validator.format("min {0} characters."),
					rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long.")
				}
			},
			// wrapper: 'small'
		});
	}