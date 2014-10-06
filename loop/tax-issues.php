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
	$current_section = null;
	while (have_posts()) {
		the_post();
		$section = wp_get_post_terms($post->ID, 'sections');
		if(!empty($section) && $section[0]->name != $current_section){
			$current_section = $section[0]->name;
			echo '<h1>' . $current_section . '</h1>';
		} elseif( "Articles" !== $current_section) {
			$current_section = "Articles";
			echo '<h1> Articles </h1>';
		}	
		cfct_excerpt();
		
	}
}

?>