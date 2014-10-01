// jQuery(document).ready(function(){
// 	jQuery("#user_author.button").on('click', function(){
// 		 jQuery.ajax({
// 		 url: my_ajax_script.ajaxurl,
// 		 data: ({action : 'user_author_save'}),
// 		 success: function() {
// 			console.log("success");
// 		 }
// 		 });
// 	});
//     
// }

jQuery(document).ready(function(){
	myClick();

})

function myClick() {
	jQuery('#make_my_user').on('click', function(){
	  console.log('clicked');
	})(jQuery);
}