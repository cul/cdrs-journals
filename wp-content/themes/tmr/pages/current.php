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

$query = new WP_Query( array( 'edition' => 'current' ) );

get_header();

?>

<div class="span-17 prepend-6 content clearfix">
 <h3 class="flyer">Current Edition</h3>

<ul class="edition-list">
<?

$term = get_term_by('slug', 'current', 'edition');

$editions = get_term_children($term->term_id, 'edition');

foreach ($editions as $edition){


$editionName = get_term_by('id', $edition, 'edition');
echo '<h1 class="edition-label">'.$editionName->name.'</h1>';

}
if (have_posts()) {
	 
	while ($query->have_posts()) {
		$query->the_post();
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
</div>

<?
/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>