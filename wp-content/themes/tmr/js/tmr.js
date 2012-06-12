jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function
  $('#meta-toggle').click(function(){$('#meta-content').slideToggle( ); $('#meta-toggle').toggleClass('active')}); 
   
/*    $("ul#author-index>li").tsort({attr:"id"}); */
   
  $("div#essay>p").numberParagraph({	"itemroot":"numbered_para",	"padding":"0",
		"tag":"span"});
   
});