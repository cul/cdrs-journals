jQuery(document).ready(function($) {
    // $() will work as an alias for jQuery() inside of this function
   $('#meta-toggle').click(function(){$('#essay-meta').toggle('blind');});
   
   $("ul#author-index>li").tsort({attr:"id"});
   
  $("div#essay>p").numberParagraph();
   
});