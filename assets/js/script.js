jQuery( document ).ready(function() {
	
	
	
	
	
  jQuery("body.home #masthead").waypoint(function() {
  jQuery("nav").toggle();
  }, {
  offset: function() {
    return -jQuery(this).height();
  }
});



  jQuery("article header").waypoint(function() {
  jQuery("#scrolled-head").toggle();
  
 
  }, {
  offset: function() {
    return -jQuery(this).height();
  }
});


	
	
	
});
