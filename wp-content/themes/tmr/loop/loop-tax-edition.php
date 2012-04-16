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

<ul class="edition-list">
<?
if (have_posts()) {
	 
	while (have_posts()) {
		the_post();
?>
<li class="essay"><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

<?php

 
$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'name');

$authors = get_the_terms( $post->ID, 'author' );

if($authors){

foreach($authors as $term){
      echo '<a class="author" href="'.get_term_link($term->slug, 'author').'">'.$term->name.'</a>'; 

}

}
?>

</li>

<? 
 
}
	}
	 
	
	
 
?>

</ul>