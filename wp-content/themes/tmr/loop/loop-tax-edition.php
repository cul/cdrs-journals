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
<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  
$slug = $term->slug;


$query = query_posts(array( 'edition'=>$slug, 'meta_key'=>'author', 'orderby'=>'meta_value', 'order'=>'ASC' ));

if (have_posts()) {
	 
	while (have_posts()) {
		the_post();
?>
<li class="essay"><h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

<?php
$authors = get_the_terms( $post->ID, 'author' );

if($authors){

foreach($authors as $term){
      echo '<a class="author" href="'.get_term_link($term->slug, 'author').'">'.formatName($term->name).'</a>'; 

}

}
?>

</li>

<?php
 
}
	}
	 
	
	
 
?>

</ul>