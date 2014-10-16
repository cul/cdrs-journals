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

query_posts( 'post_type=article&issues=current-issue&orderby=menu_order&order=ASC'); 

if (have_posts()) {
	$current_section = null;
	while (have_posts()) {
		the_post();
		//Displaying the section name, defaults to article if none specified
		$section = wp_get_post_terms($post->ID, 'sections');
		if(!empty($section) && $section[0]->name != $current_section){
			$current_section = $section[0]->name;
			echo '<h3 class="section-label">' . $current_section . '</h3>';
		} elseif( empty($section) && ($current_section != "Articles")) {
			$current_section = "Articles";
			echo '<h3 class="section-label">Articles</h3>';
		}	
		cfct_excerpt();
		
	}
}

?>