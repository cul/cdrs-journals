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

<div class="span-14 prepend-6">

<?php


$product_terms = wp_get_object_terms($post->ID, 'author');
if(!empty($product_terms)){
  if(!is_wp_error( $product_terms )){
     
    foreach($product_terms as $term){
       
      $author_bio = get_tax_meta($term->term_id,'author_bio');
		echo  '<div class="author-bio">'.$author_bio.'</div>';

		$author_photo = get_tax_meta($term->term_id, 'author_image');
	 	if($author_photo != ''){
			echo '<img class="author-photo" src="'.$author_photo['src'].'">';
			echo '<h2>Essays by '.$term->name.'</h2>' ; 
    	}
    }
  
  }
}


if (have_posts()) {
	echo '<ul>';
	while (have_posts()) {
		the_post();
	?>
	<li>
		<?php cfct_template_file('excerpt', 'tax-author.php');?>
	</li>
	<?php
	}
	echo '</ul>';
}

?>

</div>