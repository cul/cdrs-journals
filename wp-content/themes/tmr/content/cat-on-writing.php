 <?php

// This file is part of the Carrington JAM Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }
global $post;
?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




	
<div id="content" role="main" class="span-15">

 <h1 class="page-title"> <?php the_title() ?> </h1>


<?php

$author_terms = wp_get_object_terms($post->ID, 'tmr_author');
if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
  
    foreach($author_terms as $term){
    
    echo '<span class="author-credit"><a href="'.get_term_link($term->slug, 'tmr_author').'">'.formatName($term->name).'</a></span>'; 
   }
   
   }
   }
 
  ?>


</div>

<div  class="span-14 prepend-7">
 





<div id="content-main" >

<?php

the_content(); 

?>

</div>
 
 

 

 

 
 
 



</div>

<div class="span-2   last sidebar">

<a class="print-button" HREF="javascript:window.print()">Print</a>

<div class="social-media">

<div class="fb-like" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false"></div> <br>



<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<br/>


</div>




</div>