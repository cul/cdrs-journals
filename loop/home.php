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
global $options;
if (have_posts()) {

		$options = get_option('general-options');

		if($options['featured_image_setting'] == "yes"){

			echo "<ul class='issue-index issue-index-thumbs'>";
		
		}else{

			echo "<ul class='issue-index'>";

		}

	global $current_section;

	$current_section = null;
	
	while (have_posts()) {
		the_post();

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
