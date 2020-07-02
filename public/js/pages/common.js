 $(document).ready(function() {
   $('#password').on('keyup', function() {
	  if($('#password').val() != '') {
	    $('.password_hide_show').removeClass('hide');
	  } else {
	     $('.password_hide_show').addClass('hide');
	  }
	});
});