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




	
<div id="content" role="main" class="span-12 prepend-6">

<h1 class="edition-label"> <?php the_title() ?> </h1>


<?php

$author_terms = wp_get_object_terms($post->ID, 'author');
if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
  
    foreach($author_terms as $term){
    
    echo '<span class="author-credit"><a href="'.get_term_link($term->slug, 'author').'">'.formatName($term->name).'</a></span>'; 
   }
   
   }
   }
 
 

 /* end author bio and photo */

/* begin academics metadata */

  



/* end academics metadata */


/* begin tags */


the_tags('<dl><dt>Tags:</dt><dd>', '</dd><dd> ', '</dd></dl>');  

/* end tags */

?>



 





<div id="essay" class="pull-2 clearfix">

<?php

the_content(); 

?>

</div>
 
<?php

global $custom_works_cited;

$wc = $custom_works_cited->the_meta();

?>

<div id="work_cited">
 
<h1><?php echo($wc['title']); ?></h1>

<?php  

echo apply_filters('meta_content', $wc['citation']);

?>

</div>




<?php


$author_terms = wp_get_object_terms($post->ID, 'author');
if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
  
    foreach($author_terms as $term){

  
 echo '<div id="essay-meta">';
       $auth_photo = get_tax_meta($term,'author_image',true);
       
       if($auth_photo){
		
			echo '<img class="essay-thumb" width="150" src="'.$auth_photo['src'].'">';
   }
   
   $auth_bio = get_tax_meta($term, 'author_bio');
   
   if($auth_bio){
   
    echo '<div class="author-bio">'.$auth_bio.'</div>';
   }
   
   }
   
   }}
   
	$progression_terms = wp_get_object_terms($post->ID, 'progression');
if(!empty($progression_terms)){
  if(!is_wp_error( $progression_terms )){
  echo '<h3>Progression</h3>';
   
    foreach($progression_terms as $term){
      echo '<a class="meta-link"  href="'.get_term_link($term->slug, 'progression').'">'.$term->name.'</a> '; 
    }
   
  }
}

$source_terms = wp_get_object_terms($post->ID, 'source');
if(!empty($source_terms)){
  if(!is_wp_error( $source_terms )){
   echo '<h3>Source</h3>';
    foreach($source_terms as $term){
      echo '<a class="meta-link" href="'.get_term_link($term->slug, 'source').'">'.$term->name.'</a>'; 
    }
   
  }
}  

$source_terms = wp_get_object_terms($post->ID, 'assignment');
if(!empty($source_terms)){
  if(!is_wp_error( $source_terms )){
      echo '<h3>Assignment</h3>';
    foreach($source_terms as $term){
      echo '<a class="meta-link" href="'.get_term_link($term->slug, 'assignment').'">'.$term->name.'</a>'; 
    }
   
  }
}  


$source_terms = wp_get_object_terms($post->ID, 'edition');
if(!empty($source_terms)){
  if(!is_wp_error( $source_terms )){
      echo '<h3>Edition</h3>';
    foreach($source_terms as $term){
      echo '<a class="meta-link" href="'.get_term_link($term->slug, 'edition').'">'.$term->name.'</a>'; 
    }
   
  }
  
  }

	
	
			
     
  


?>

</div>



</div>

<div class="span-5 prepend-1 last sidebar">
<div class="social-media">

<div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div> <br>



<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>


<A HREF="javascript:window.print()">Click to Print</A>

</div>