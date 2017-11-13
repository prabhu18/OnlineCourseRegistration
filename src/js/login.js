$(document).ready(function () {
  $("#uname_error").hide();
  $("#pwd_error").hide();

  $("input").focus(function () {
    $("#uname_error").hide();
    $("#pwd_error").hide();
  });

  $("#submit").click(function () {
    $("#uname_error").hide();
    $("#pwd_error").hide();

    if($("#username").val() == ""){
      $("#username").after("<span id='uname_error'>Username field cannot be empty.</span>");
        event.preventDefault();
    }
    if($("#password").val() == ""){
      $("#password").after("<span id='pwd_error'>Password field cannot be empty.</span>");
        event.preventDefault();
    }
  });

});
