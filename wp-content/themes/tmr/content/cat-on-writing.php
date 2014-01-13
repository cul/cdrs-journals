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




 

	
<div id="content" role="main" class="span-14 prepend-6">

<!--  <h1 class="page-title"> <?php the_title() ?> </h1> -->


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

<div  class="span-14 prepend-6">
 





<div id="content-main" >


<?php


$author_terms = wp_get_object_terms($post->ID, 'tmr_author');

if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
  
  ?>
  
  <div id='author-meta' class="essay-meta" title="Author Bio">
  <?php
  
    foreach($author_terms as $term){
              
   $auth_bio = get_tax_meta($term, 'author_bio');
   
   $auth_photo = get_tax_meta($term,'author_image',true);
   
   if($auth_bio){

    if($auth_photo){
		
			echo '<img class="essay-thumb" width="150" src="'.$auth_photo['src'].'">';
   }
    echo '<div class="author-bio" title="About the Author">'.$auth_bio.'</div>';
   }

   }
   
   ?>
   
  </div>
   <?php
   
   }}


?>

<?php

the_content(); 

?>

</div>

</div>

<div class="span-2   last sidebar">

<ul class="essay tools">

 
<?php 

if ( $auth_bio ) {

?>
<li><a href="#bio" id="bio-toggle"> <span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;Author Bio</a> </li>
<?php

}

?>


<hr>

<li><a class="print-button" HREF="javascript:window.print()" title="Click to Print Essay with Paragraph Numbers"><span class="glyphicon glyphicon-print"></span> &nbsp;&nbsp; Print</a>
</ul>

<hr>

<a href="#" id="share-show"><span class="glyphicon glyphicon-share"></span>&nbsp;&nbsp; Share</a>
<ul class="social tools" id='share-list' style="display:none">

<li><a HREF="mailto:?subject=<?php the_title()?>&body=An essay from The Morningside Review: <?php the_permalink(); ?>">E-mail</a></li>
 
 <li><a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>">Facebook</a> </li>


<li><a id='twitter button' href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=MorningsideRev">Twitter</a></li>
<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">Google+</a></li>
<li>
</ul>




</div>




</div>