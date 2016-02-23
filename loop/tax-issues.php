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

if (have_posts()) {
	global $current_section;

	$current_section = null;
	
	while (have_posts()) {
		the_post();

	 	//Displaying the section name, defaults to article if none specified
		$section = wp_get_post_terms($post->ID, 'sections');
 
		if(!empty($section) && $section[0]->name != $current_section){
			if($current_section != null){
				
				echo '</ul>'; //close list if opened below, will not write on first loop
				
			}
			$current_section = $section[0]->name;
			echo '<h3 class="section-label">' . '<a href="' . get_term_link($section[0]->term_id, 'sections') . '">' . $section[0]->name . '</a></h3>';
		
		
			$options = get_option('general-options');

		if($options['featured_image_setting'] == "yes"){

			echo "<ul class='issue-index issue-index-thumbs'>";
		
		} else {

			echo "<ul class='issue-index'>";

		}
		}

		echo '<li>';
/*
		$options = get_option('general-options');
		if($options['featured_image_setting'] == "yes"){
			get_template_part( 'excerpt/excerpt', 'featured' );
		}else{
*/
			cfct_excerpt();
// 		}

		echo "</li>";
	}

	echo '</ul>';
}

?>
