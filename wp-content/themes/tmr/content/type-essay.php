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

<!--

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

-->


<div class="row">

<div class="span-6">

<div id="cu-writing">

<a href="http://www.college.columbia.edu/core/uwp"><img id="selected-essays" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/selected-essays-home.png" alt="Selected Essays from the Columbia University Undergraduate Writing Program"></a>

</div>

</div>
<div id="content" role="main" class="span-14">

<div id="essay">

<div id='meta-content' style="display:none">

<div id="essay-meta" >

<?php


$author_terms = wp_get_object_terms($post->ID, 'tmr_author');

if(!empty($author_terms)){
  if(!is_wp_error( $author_terms )){
  
    foreach($author_terms as $term){
              
   $auth_bio = get_tax_meta($term, 'author_bio');
   
   $auth_photo = get_tax_meta($term,'author_image',true);
   
   if($auth_bio){
/*     echo ' <h2>About the Author</h1>'; */
    if($auth_photo){
		
			echo '<img class="essay-thumb" width="150" src="'.$auth_photo['src'].'">';
   }
    echo '<div class="author-bio">'.$auth_bio.'</div>';
   }

   }
   
   }}


?>

<h3>Classification</h3>

<?php
   
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


<?php

the_content(); 

?>

</div>
 
<?php

global $custom_works_cited;

$wc = $custom_works_cited->the_meta();

?>

<div id="work_cited">
 
<h1 class="meta-header"><?php echo($wc['title']); ?></h1>

<?php  

echo apply_filters('meta_content', $wc['citation']);

?>

</div>

<div id="essay-meta" class="hidden">

<?php


$author_terms = wp_get_object_terms($post->ID, 'tmr_author');
  if(!empty($author_terms)){
  
  if(!is_wp_error( $author_terms )){
  
  foreach($author_terms as $term){
           
   $auth_bio = get_tax_meta($term, 'author_bio');
   
   $auth_photo = get_tax_meta($term,'author_image',true);
   
   if($auth_bio){
    echo ' <h1 class="meta-header">About the Author</h1>';
    if($auth_photo){
		
			echo '<img class="essay-thumb" width="150" src="'.$auth_photo['src'].'">';
   }
    echo '<div class="author-bio">'.$auth_bio.'</div>';
   }
   

       
       

   
   
   }
   
   }}
   
   ?>
 
   <?php
   
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

<div class="span-3 sidebar">
<div class="page-nav">

<ul class="essay tools">

 
<?php 

if ( $auth_bio ) {

?>
<li><a href="#bio" id="bio-toggle"> <span class="glyphicon glyphicon-user"></span> &nbsp;&nbsp;Author Bio</a> </li>
<?php

}

?>


<li><a href="#taxonomy" id="tax-toggle"><span class="glyphicon glyphicon-list"></span> &nbsp;&nbsp; Taxonomy</a></li>

<li><a class="print-button" HREF="javascript:window.print()" title="Click to Print Essay with Paragraph Numbers"><span class="glyphicon glyphicon-print"></span> &nbsp;&nbsp; Print</a>
</ul>
<ul class="social tools">
 
 <li><a href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>">Facebook</a> </li>


<li><a id='twitter button' href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=MorningsideRev">Twitter</a></li>
<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>">Google+</a></li>
</ul>



 

</div>
 
</div>
</div>