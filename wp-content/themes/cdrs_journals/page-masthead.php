<?php
 
// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2014 Crowd Favorite, Ltd. All rights reserved.
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

get_header();
	?>

<h1>Mastheads:</h1>
<div id="primary" class="col-sm-8 col-sm-offset-2">
 	<?php
		$type = 'masthead';
		$args=array(
		  'post_type' => $type,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'caller_get_posts'=> 1,
		  'orderby' => 'date'
		  );

		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
			echo '<ul class="mastheads">';
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
		    <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
		    <?php
		  endwhile;
		  echo '</ul>';
	}
	wp_reset_query();
	?>	
 
</div><!-- #primary -->
 

 
<?php get_footer(); ?>