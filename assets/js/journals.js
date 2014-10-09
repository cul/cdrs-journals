jQuery(document).ready(function(){
	jQuery("#new_auths").on('click', function(){
		var first = jQuery("#auths_first").val();
		var last = jQuery("#auths_last").val();
		
		jQuery.ajax({
		 url: myAjax.ajaxurl,
		 type: 'POST',
		 data: ({'action' : 'auths_save',
		 		  'first_name' : first,
		 		  'last_name' : last,
		 		  }),
		 success: function() {
			jQuery("#auths_first").val('');
		    jQuery("#auths_last").val('');
		 }
		 });
	});


});

 