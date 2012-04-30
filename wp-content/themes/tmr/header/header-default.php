
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

?>

 <!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
	
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		
				
<!--
		<link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic,400&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Cantarell:700,400,400italic,700italic' rel='stylesheet' type='text/css'>
-->
		
		
		<link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy|Cantarell:700,400,400italic,700italic' rel='stylesheet' type='text/css'>
		
		
		<title>

	 <?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ); ?></title>

	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php printf( __( '%s latest posts', 'carrington-jam' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'carrington-jam' ), wp_specialchars( get_bloginfo('name'), 1 ) ) ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	

		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/screen.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
		<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/print.css"/>
<?php

function my_scripts_method() {
   
   wp_register_script('tmr_js',
       get_template_directory_uri() . '/js/tmr.js',
       array('jquery'),
       '1.0' );
   
   wp_enqueue_script('tmr_js');
}
//add_action('wp_enqueue_scripts', 'my_scripts_method');
?>
	
	 
	
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="container">

<div class="span-24" id='search-form'>
<?php get_search_form(); ?>
</div>
</div>

<div class="container" id="main">
<div id='header' role="banner" class="span-15 prepend-1">		

<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">The<br/>Morningside<br/>Review</a></h1>



</div>

 

		
<nav id="access" role="navigation" class="span-17 prepend-6 clearfix">
<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a>
	 	
<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' )); 	

 ?></nav><!-- #access -->
 
