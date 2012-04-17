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
<div>

 
<a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br>
<?php 

$product_terms = wp_get_object_terms($post->ID, 'author');
if(!empty($product_terms)){
  if(!is_wp_error( $product_terms )){
     
    foreach($product_terms as $term){
            echo '<span class="author-link">by <a href="'.get_term_link($term->slug, 'author').'">'.$term->name.'</a></span>'; 

    }
  
  }
}


$product_terms = wp_get_object_terms($post->ID, 'edition');
if(!empty($product_terms)){
  if(!is_wp_error( $product_terms )){
     
    foreach($product_terms as $term){
            echo '<span class="edition-link">Edition: <a href="'.get_term_link($term->slug, 'edition').'">
            '.$term->name.'</a></span>'; 

    }
  
  }
}


/* the_excerpt(); */

 
 
/*
the_time('F j, Y');

the_category(', ');

comments_popup_link(__('No comments', 'carrington-jam'), __('1 comment', 'carrington-jam'), __('% comments', 'carrington-jam'));

*/
?>
</div><!-- .excerpt -->