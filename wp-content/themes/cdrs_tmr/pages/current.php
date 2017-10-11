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

$query = new WP_Query(array( 'edition' => 'current', 'meta_key'=>'author', 'orderby'=>'meta_value', 'order'=>'ASC' ));

get_header();

?>
<div class="span-6">
&nbsp;
<div id="cu-writing">

<a href="http://www.college.columbia.edu/core/uwp"><img id="selected-essays" width="230px" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/selected-essays-home.png" alt="Selected Essays from the Columbia University Undergraduate Writing Program"></a>

</div>
</div>

<div class="span-16  content clearfix">

 
 <h3 class="flyer">Current Edition</h3>

<ul class="edition-list">
<?php

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
<h2 class="author-edition">
<?php
global $post;

$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'name');

$authors = get_the_terms( $post->ID, 'tmr_author' );

if($authors){

foreach($authors as $term){
      echo '<span class="author-credit"><a class="author" href="'.get_term_link($term->slug, 'tmr_author').'">'.formatName($term->name).'</a></span>'; 

}

}
?>
</h2>
</li>

<?php
 
}
	}
	 
	
	
 
?>

</ul>
</div>

<?php
wp_reset_query();

/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>