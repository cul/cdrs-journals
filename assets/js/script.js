jQuery( document ).ready(function() {

  if(jQuery("body").hasClass("search-no-results")){
    jQuery("#primary").append("<p>No Results Found.</p>");
  }

  if(jQuery("body").hasClass("wp-admin")){
    jQuery(".wp-list-table").width("auto");
  }

  jQuery(".mobile_social_media").insertAfter(".library_data");


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
    },
  });

  jQuery("div#footer_container").waypoint(function() {
    jQuery("#scrolled-head").toggle();
    }, {
    offset: 'bottom-in-view'
  });

  var article = jQuery("#article-tools");
  if(window.innerWidth < 766){
    jQuery(article).detach();
    jQuery(article).appendTo(".library_data");
    jQuery(article).removeAttr(style);
  }

  //removing some out of the box styling with the search everything plugin
  jQuery("#s").addClass("form-control");
  jQuery("input#searchsubmit").remove();
  jQuery("#site-search .screen-reader-text").remove();
  jQuery("#home-search-top .screen-reader-text").remove();
  jQuery("#home-search .screen-reader-text").remove();
  jQuery("#s").unwrap();
  jQuery("#s").unwrap();
  jQuery("#home-search #s").unwrap();
  jQuery("#home-search #s").unwrap();


  var source = jQuery(".featured_image").find("img").attr("src");
  jQuery(".featured_image").find("img").wrap("<a href='" + source + "' class='fancybox'></a>");

  window.addEventListener("hashchange", function() { scrollBy(0, -71);   });

  jQuery("input#s").attr("placeholder","Search this journal");

  jQuery("#sub").on("click", function(){
    event.preventDefault();
    var url = "http://" + window.location.host + "/?s=";
    var new_url = url.concat(jQuery("#s").val());
  //   jQuery.load(new_url);
    window.location.href = new_url;
  });


});

jQuery("#sub").on("click", function(){
  event.preventDefault();
  var url = "http://" + window.location.host + "/?s=";
  var new_url = url.concat(jQuery("#s").val());
//   jQuery.load(new_url);
  window.location.href = new_url;
});



