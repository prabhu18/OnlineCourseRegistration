$(document).ready(function () {
	hideErrors();
	$("#password").focus(function () {
         //Remove all the post-validation notifications
        $("#pwd_error").remove();
         // Add the information message notification
        $("#password").after("<span id='pwd_info'>The password field should be at least 8 characters long and have atleast 1 special character and atleast 1 number</span>");
    });

	$("#password").blur(function () {
		$("#pwd_info").remove();
	});

    $("#validate").click(function () {
			var varErr= false;
			hideErrors();

			if($("#netId").val() == ""){
				varErr=true;
				event.preventDefault();
				$("#netId").after("<span id='uname_error'>NetId field cannot be empty.</span>");
				$("#uname_error").addClass("error");
			}
	if($("#password").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#password").after("<span id='pwd_error'>Password field cannot be empty.</span>");
		$("#pwd_error").addClass("error");
	}else{
		var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
		 if (!$("#password").val().match(passwordRegex)) {
			 varErr=true;
			 event.preventDefault();
				$("#password").after("<span id='pwd_error'>The password field should be at least 8 characters long and have atleast 1 special character and atleast 1 number</span>");
				$("#pwd_error").addClass("error");
			}
	}

	if($("#confirm_password").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#confirm_password").after("<span id='confirm_pwd_error'>Confirm Password field cannot be empty.</span>");
		$("#confirm_pwd_error").addClass("error");
<<<<<<< HEAD
	}else{
	if($("#confirm_password").val() != $("#password").val()){
		varErr=true;
		event.preventDefault();
		$("#confirm_password").after("<span id='confirm_pwd_error'>Passwords do not match</span>");
		$("#confirm_pwd_error").addClass("error");
=======
	}
	else{
			if($("#confirm_password").val() != $("#password").val()){
				varErr=true;
				$("#confirm_password").after("<span id='confirm_pwd_error'>Passwords do not match</span>");
				$("#confirm_pwd_error").addClass("error");
>>>>>>> 89866fb3d6e05971ab78ac1150799b66b8cbb45f
	}
	}

	if($("#fName").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#fName").after("<span id='fName_error'>First Name cannot be empty.</span>");
		$("#fName_error").addClass("error");
	}
	if($("#lName").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#lName").after("<span id='lName_error'>Last Name cannot be empty.</span>");
		$("#lName_error").addClass("error");
	}

	/*var gender = $('input[name=gender]:checked').val();

		if(!$("input:radio[name='gender']").is(":checked"))
		$("#gender_error").show();
*/

	if($("#major").val() == 0){
		varErr=true;
		event.preventDefault();
		$("#major").after("<span id='major_error'>Please select a major.</span>");
		$("#major_error").addClass("error");
	}


	if($("#degree").val() == 0){
		varErr=true;
		event.preventDefault();
		$("#degree").after("<span id='degree_error'>Please select a degree.</span>");
		$("#degree_error").addClass("error");
	}


	if($("#email").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#email").after("<span id='email_error'>Email cannot be empty.</span>");
		$("#email_error").addClass("error");
	}else{
		var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            //Check if the email is valid
            if (!$("#email").val().match(emailRegex)) {
							varErr=true;
							event.preventDefault();
				$("#email").after("<span id='email_error'>Please a valid email address (local-part@domain).</span>");
				$("#email_error").addClass("error");
			}
	}

	if($("#number").val() == ""){
		varErr=true;
		event.preventDefault();
		$("#number").after("<span id='number_error'>Number cannot be empty.</span>");
			$("#number_error").addClass("error");
	}else{
	if (!$("#number").val().match(/^\d+$/)) {
		varErr=true;
		event.preventDefault();
		$("#number").after("<span id='number_error'>Number should have only numeric entries.</span>");
		$("#number_error").addClass("error");
	}
	}
	
    });
});

function hideErrors() {
 $("#uname_error").hide();
 $("#pwd_error").hide();
 $("#confirm_pwd_error").hide();
 $("#gender_error").hide();
 $("#fName_error").hide();
 $("#lName_error").hide();
 $("#major_error").hide();
 $("#degree_error").hide();
 $("#email_error").hide();
 $("#number_error").hide();

}
