<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#signupform" ).validate({
  rules: {
    registerPassword_input: "required",
    confirmPassword_input: {
      equalTo: "#registerPassword"
    }
  }
});
</script>