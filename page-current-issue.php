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
if(get_theme_mod('featured_image_setting') == "1"){
	$featured_class = "list-thumbs";
}else{
	$featured_class = "";
}
?>

<div id="primary" class="col-sm-9 col-sm-offset-1 <?php echo $featured_class ?>">
<h3>Current Issue</h3>
	<h1 class="archive-title">
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
	  query_posts( 'post_type=article&issues=current-issue&orderby=menu_order&order=ASC');  

	  get_template_part( 'loop/tax', 'issues' ); 
	
	?>
		</div><!-- #content -->
	 

 
<?php 
 
get_footer();

?>