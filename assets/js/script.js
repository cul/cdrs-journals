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

  jQuery("div#footer_container").waypoint(function() {
  jQuery("#scrolled-head").toggle();
  
 
  }, {
  offset: function() {
    return -jQuery(this).height();
  }
});




var article = jQuery("#article-tools");
if(window.innerWidth < 766){
  jQuery(article).detach();
  jQuery(article).appendTo(".library_data");
  jQuery(article).removeAttr(style);
}

jQuery("#s").addClass("form-control");
	
	
	
});


