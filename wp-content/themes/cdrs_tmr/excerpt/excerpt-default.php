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
 
global $post;
 
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

?>
 

 
<h1><a class='title-link' href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<h2 class="author-edition clearfix">
<?php 

$essay_terms = wp_get_object_terms($post->ID, 'tmr_author');

if(!empty($essay_terms)){
  if(!is_wp_error( $essay_terms )){
     
    foreach($essay_terms as $term){
            echo '<span class="author-credit"><a href="'.get_term_link($term->slug, 'tmr_author').'">'.formatName($term->name).'</a></span> '; 

    }
  
  }
}


$essay_terms = wp_get_object_terms($post->ID, 'edition');

if(!empty($essay_terms)){
  if(!is_wp_error( $essay_terms )){
     
    foreach($essay_terms as $term){
            echo '<span class="edition-link"><a href="'.get_term_link($term->slug, 'edition').'">
            '.$term->name.'</a></span>'; 

    }
  
  }
}
?>

</h2>
 
<!-- .excerpt -->