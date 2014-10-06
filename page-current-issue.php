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

query_posts( 'post_type=article&tag=current&orderby=menu_order&order=ASC');  

get_header();
?>

<div id="primary" class="col-sm-8">
	<h1 class="archive-title">Issue:
		<?php 
			$term = get_term_by('slug', 'current-issue', 'issues');
			$term_id = $term->term_id;
			$termchildren = get_term_children( $term_id, 'issues' );
				foreach ( $termchildren as $child ) {
					$the_term = get_term_by('id', $child, 'issues');
					echo $the_term->name;
				}
		?>
	</h1>
	
	<?php
	
	// For the loop used, look in /loops
	cfct_loop();
	comments_template();
	?>
		</div><!-- #content -->
	 

 
<?php 
get_sidebar();
 
get_footer();

?>