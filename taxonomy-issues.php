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
$options = get_option('general-options');
if($options['featured_image_setting'] == "yes"){
	$featured_class = "list-thumbs";
}else{
	$featured_class = "";
}
?>

<div id="primary" class="col-sm-12 <?php echo $featured_class ?>">

<header role="page-title">
	<h1 class="archive-title"><?php
		if (is_day()) {
			printf(__('Daily Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date() . '</span>');
		} elseif (is_month()) {
			printf(__('Monthly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_year()) {
			printf(__('Yearly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'carrington-blueprint')) . '</span>');
		}  elseif (is_tax('issues')) {
			printf(__('Issue: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		}elseif (is_tax('aauthor')) {
			printf(__('Author Archives: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		}
	?></h1>

	<!-- issue taxonomy print date -->

	<?php
	// get the correct taxonomy ID by slug
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	// get taxonomy meta
	$print_date = get_tax_meta($term->term_id,'print_date');
	if($print_date != '') : ?>
		<?php echo '<div class="issue-print-date">' ?>
		<?php echo $print_date; ?>
		<?php echo '</div>' ?>
	<?php endif; ?>

</header>

<!-- issue taxonomy description field  -->

<?php
	$termDescription = term_description( '', get_query_var( 'taxonomy' ) );
	if($termDescription != '') : ?>
		<?php echo '<h3 class="subhead">' ?>
		<?php echo $termDescription; ?>
		<?php echo '</h3>' ?>
	<?php endif; ?>

<!-- issue taxonomy bibliography field  -->

<?php
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$bib_data = get_tax_meta($term->term_id,'bibliography');
	if($bib_data != '') : ?>
		<?php echo '<h3 class="section-label"><span>Bibliography</span></h3><div class="bibliography">' ?>
		<?php echo $bib_data; ?>
		<?php echo '</div>' ?>
	<?php endif; ?>

<!-- issue taxonomy articles  -->

<?php
	global $query_string;
	query_posts( $query_string . '&order=ASC&orderby=menu_order' );

	cfct_loop();

	// Pagination
	cfct_misc('nav-posts');
?>

</div><!-- #primary -->

<?php
/* get_sidebar(); */


get_footer();
?>
