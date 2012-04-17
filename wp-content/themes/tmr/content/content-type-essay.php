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

<h1 class="edition-label prepend-6"> <?php the_title() ?> </h1>


<div class="span-6 sidebar">


<div id="essay-meta">
 
 
<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
} 
 

$author_terms = wp_get_object_terms($post->ID, 'author');
if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
   
    foreach($author_terms as $term){
      echo '<h2><a href="'.get_term_link($term->slug, 'author').'">'.$term->name.'</a></h2>'; 
    }
   
  }
} 
 
 $theBio = get_post_custom_values('author_bio');
 
 if ($theBio) { ?><div class="author-feature"><h3>About the Author </h3> <?php }
 
 
 if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
 
  
  the_post_thumbnail();
} 

 /* end author bio and photo */

/* begin academics metadata */

$progression_terms = wp_get_object_terms($post->ID, 'progression');
if(!empty($progression_terms)){
  if(!is_wp_error( $progression_terms )){
   
    foreach($progression_terms as $term){
      echo ' <a href="'.get_term_link($term->slug, 'progression').'">'.$term->name.'</a> '; 
    }
   
  }
}

$source_terms = wp_get_object_terms($post->ID, 'source');
if(!empty($source_terms)){
  if(!is_wp_error( $source_terms )){
   
    foreach($source_terms as $term){
      echo '<a href="'.get_term_link($term->slug, 'source').'">'.$term->name.'</a>'; 
    }
   
  }
}  



/* end academics metadata */


/* begin tags */


the_tags('<dl><dt>Tags:</dt><dd>', '</dd><dd> ', '</dd></dl>');  

/* end tags */



/*
$args = array( 'post_mime_type' => 'application/pdf', 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID );

$pdfs = get_posts($args);


if ($pdfs) {
	
	foreach ( $pdfs as $pdf ) {
		
		echo "<a class='pdf-link' href='". wp_get_attachment_url( $pdf->ID , false )."'>Download PDF</a>";
	}
}

*/




?>
<div class="fb-like" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div> <br>



 <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</div>

	 </div>
	
	
	 	<div id="content" role="main" class="span-16 pull-2 last">

 


 
 
 

<div id="essay">
<?php
the_content(); ?>
</div>
 
 

 
<?php
 
/* testing wordpress alchemy custom meta box */

global $custom_works_cited;

$wc = $custom_works_cited->the_meta();
?>
<div id="work_cited">
 
<h1><?php echo($wc['title']); ?></h1>

  

<?php  
 

echo apply_filters('meta_content', $wc['citation']);


?>

 
</div>
</div>