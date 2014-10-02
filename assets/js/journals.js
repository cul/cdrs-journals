jQuery(document).ready(function(){
	jQuery("#make_my_user").on('click', function(){
		var first = jQuery("#first_name").val();
		var last = jQuery("#last_name").val();
		var user_name = jQuery("#user_name").val();
		var user_pass = jQuery("#user_pass").val();
		var user_display = jQuery("#user_display").val();
		
		jQuery.ajax({
		 url: myAjax.ajaxurl,
		 type: 'POST',
		 data: ({'action' : 'user_author_save',
		 		  'first_name' : first,
		 		  'last_name' : last,
		 		  'user_name' : user_name,
		 		  'user_pass' : user_pass,
		 		  'display_name' : user_display
		 		  }),
		 success: function() {
			jQuery("#first_name").val('');
		    jQuery("#last_name").val('');
		    jQuery("#user_name").val('');
		    jQuery("#user_pass").val('');
		    jQuery("#user_display").val('');
		 }
		 });
	});


});

 