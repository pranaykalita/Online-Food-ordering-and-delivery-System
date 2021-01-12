// show hide pass

(function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);

// confirm pass
$('#password, #re_password').on('keyup', function () {
  if ($('#password').val() == $('#re_password').val()) {
    $('#message').html('').css('color', 'green');
  } else 
    $('#message').html('password Not Matching').css('color', 'red');
});
