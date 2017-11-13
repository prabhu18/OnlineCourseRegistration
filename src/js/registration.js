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
	hideErrors();
	if($("#netId").val() == ""){
		$("#netId").after("<span id='uname_error'>NetId field cannot be empty.</span>");
	}
	if($("#password").val() == ""){
		$("#password").after("<span id='pwd_error'>Password field cannot be empty.</span>");
	}else{
		var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
		 if (!$("#password").val().match(passwordRegex)) {
				$("#password").after("<span id='pwd_error'>The password field should be at least 8 characters long and have atleast 1 special character and atleast 1 number</span>");
			}
	}

	if($("#confirm_password").val() == ""){
		$("#confirm_password").after("<span id='confirm_pwd_error'>Confirm Password field cannot be empty.</span>");
	}else{
	if($("#confirm_password").val() != $("#password").val()){
		$("#confirm_password").after("<span id='confirm_pwd_error'>Passwords do not match</span>");
	}
	}

	if($("#fName").val() == ""){
		$("#fName").after("<span id='fName_error'>First Name cannot be empty.</span>");
	}
	if($("#lName").val() == ""){
		$("#lName").after("<span id='lName_error'>Last Name cannot be empty.</span>");
	}

	var gender = $('input[name=gender]:checked').val();

		if(!$("input:radio[name='gender']").is(":checked"))
		$("#gender_error").show();


	if($("#major").val() == 0){
		$("#major").after("<span id='major_error'>Please select a major.</span>");
	}


	if($("#degree").val() == 0){
		$("#degree").after("<span id='degree_error'>Please select a degree.</span>");
	}


	if($("#email").val() == ""){
		$("#email").after("<span id='email_error'>Email cannot be empty.</span>");
	}else{
		var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            //Check if the email is valid
            if (!$("#email").val().match(emailRegex)) {
				$("#email").after("<span id='email_error'>Please a valid email address (local-part@domain).</span>");
			}
	}

	if($("#number").val() == ""){
		$("#number").after("<span id='number_error'>Number cannot be empty.</span>");
	}else{
	if (!$("#number").val().match(/^\d+$/)) {
		$("#number").after("<span id='number_error'>Number should have only numeric entries.</span>");
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
