$(document).ready(function() {
	$('#submit').click(function(e) {
		// Initializing Variables With Form Element Values
		var fname = $('#fname').val();
		var lname = $('#lname').val();
		var phone = $('#phone').val();
		//var industry = $('#industry').val();
		//var theme = $('#theme').val();
		var domain_name = $('#domain_name').val();
		var email = $('#email').val();
		var pass = $('#pass').val();
		var db_name = $('#database_name').val();
		var user_name = $('#user_name').val();

    	
		// Initializing Variables With Regular Expressions
		var name_regex = /^[A-Za-z\'\s\.\,]+$/;
		var email_regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		var letterNumber = /^[0-9a-zA-Z]+$/;
		var phone_regex = /^[0-9]+$/;
		var domain_val = /^[a-zA-Z0-9][a-zA-Z0-9]+[a-zA-Z0-9]$/;
		var databae_regx = /^[a-zA-Z0-9][a-zA-Z0-9$_]+[a-zA-Z0-9]$/;
		var user_regx = /^[a-zA-Z0-9][a-zA-Z0-9$_]+[a-zA-Z0-9]$/;

		// To Check Empty Form Fields.
		if (fname.length == 0) {
		$('#fname_error').text(" Please insert your first name"); // This Segment Displays The Validation Rule For All Fields
		$("#fname").focus();
		$('#fname_error').show();
		return false;
		} else {
			$('#fname_error').hide();
		}
		// Validating Name Field.
		if (!fname.match(name_regex) || fname.length == 0) {
		$('#fname_error').text(" First name should be alphabets "); // This Segment Displays The Validation Rule For Name
		$("#fname").focus();
		$('#fname_error').show();
		return false;
		} else {
			$('#fname_error').hide();
		}


		// To Check Empty Form Fields.
		if (lname.length == 0) {
		$('#lname_error').text(" Please insert your last name"); // This Segment Displays The Validation Rule For All Fields
		$("#lname").focus();
		$('#lname_error').show();
		return false;
		} else {
			$('#lname_error').hide();
		}
		// Validating Name Field.
		if (!lname.match(name_regex) || lname.length == 0) {
		$('#lname_error').text(" Last name should be alphabets "); // This Segment Displays The Validation Rule For Name
		$("#lname").focus();
		$('#lname_error').show();
		return false;
		} else {
			$('#lname_error').hide();
		}

		// To Check Empty Form Fields.
		if (phone.length == 0 ) {
		$('#phone_error').text(" Please insert your phone number"); // This Segment Displays The Validation Rule For All Fields
		$("#phone").focus();
		$("#phone_error").show();
		return false;
		} else {
			$("#phone_error").hide();
		}
		// Validating Phone Field.
		if (!phone.match(phone_regex)) {
		$('#phone_error').text(" Phone number should be intiger "); // This Segment Displays The Validation Rule For Phone
		$("#phone").focus();
		$('#phone_error').show();
		return false;
		} else {
			$("#phone_error").hide();
		}
		// To Check Empty Form Fields.
		if (phone.length < 10 ) {
		$('#phone_error').text(" Phone number should not less then 10 digit"); // This Segment Displays The Validation Rule For All Fields
		$("#phone").focus();
		$("#phone_error").show();
		return false;
		} else {
			$("#phone_error").hide();
		}

		// Validating Email Field.
		if (!email.match(email_regex) || email.length == 0) {
		$('#email_error').text(" Please enter valid email address "); // This Segment Displays The Validation Rule For Email
		$("#email").focus();
		$('#email_error').show();
		return false;
		} else {
			$('#email_error').hide();
		}

		//Validating Domain Name Field.
		if (domain_name.length == 0) {
		$('#domain_name_error').text(" Please insert domain name"); // This Segment Displays The Validation Rule For Domain Name
		$("#domain_name").focus();
		$('#domain_name_error').show();
		return false;
		} else {
			$('#domain_name_error').hide();
		}
		// Validating Domain Name Field.
		if (!domain_name.match(domain_val)) {
		$('#domain_name_error').text(" Please enter valid domain name, special character are not allow "); // This Segment Displays The Validation Rule For Domain
		$("#domain_name").focus();
		$('#domain_name_error').show();
		return false;
		} else {
			$('#domain_name_error').hide();
		}
		// Validating Domain Name Field.
		if (domain_name.length > 50) {
		$('#domain_name_error').text(" Domain should be no longer than 50 characters "); // This Segment Displays The Validation Rule For Domain
		$("#domain_name").focus();
		$('#domain_name_error').show();
		return false;
		} else {
			$('#domain_name_error').hide();
		}

		//Validating Databaes Name Field.
		/*if (db_name.length == 0) {
		$('#database_name_error').text(" Please insert database name"); // This Segment Displays The Validation Rule For Database Name
		$("#database_name").focus();
		$('#database_name_error').show();
		return false;
		} else {
			$('#database_name_error').hide();
		}*/
		// Validating Databaes Name Field.
		/*if (db_name != '' && !db_name.match(databae_regx)) {
		$('#database_name_error').text(" Please enter valid database name "); // This Segment Displays The Validation Rule For Databaes
		$("#database_name").focus();
		$('#database_name_error').show();
		return false;
		} else {
			$('#database_name_error').hide();
		}*/

		//Validating User Name Field.
		/*if (user_name.length == 0) {
		$('#user_name_error').text(" Please insert user name"); // This Segment Displays The Validation Rule For User Name
		$("#user_name").focus();
		$('#user_name_error').show();
		return false;
		} else {
			$('#user_name_error').hide();
		}*/
		// Validating User Name Field.
		/*if (user_name != '' && !user_name.match(databae_regx)) {
		$('#user_name_error').text(" Please enter valid user name "); // This Segment Displays The Validation Rule For User
		$("#user_name").focus();
		$('#user_name_error').show();
		return false;
		} else {
			$('#user_name_error').hide();
		}*/

		// Validating Password Field.
		/*if (pass != '' && pass.length < 6) {
		$('#pass_error').text(" Password should not less then 6 character"); // This Segment Displays The Validation Rule For Password
		$("#pass").focus();
		$('#pass_error').show();
		return false;
		} else {
			$('#pass_error').hide();
		}*/
	});
});