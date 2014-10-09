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
	while (have_posts()) {
	$term_array = array();
	$terms = get_the_terms( $post->ID, 'sections' );
		if($terms ){
				foreach($terms as $term){
					$last_term = array_pop($term_array);
					if ($term->name !== $last_term){
						echo '<h1>'. $term->name . '</h1>'; 
						array_push($term_array, $term->name);
					}
				}
		} else{
				$last_term = array_pop($term_array);
				if ("Articles" !== $last_term){
					echo '<h1> Articles </h1>';
					array_push($term_array, "Articles"); 
				}
		}
		
			the_post();
			cfct_excerpt();
		
	}
}

?>