
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
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
		
<link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
	
	<link rel="shortcut icon" type="image/x-icon" href="http://morningsidereview-dev.cul.columbia.edu/wp-content/uploads/2012/06/icon.ico">


	<title>
	 <?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ); ?></title>

 
	 
	

		<link rel="stylesheet" type="text/css" media="screen"  href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/blueprint/screen.css" />
		<link rel="stylesheet" type="text/css" media="screen, print" href="<?php bloginfo('stylesheet_url') ?>" />

<?php

function my_scripts_method() {
   
      wp_register_script('pnumb', get_template_directory_uri() .'/js/jquery.numberedParagraphs.js');
   
   wp_register_script('tmr_js',
       get_template_directory_uri() . '/js/tmr.js',
       array('jquery',  'pnumb'),
       
       '1.0' );
   
   wp_enqueue_script('tmr_js');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');
?>
	
	 
	
<link rel="profile" href="http://gmpg.org/xfn/11" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="container" id="search">

<div class="span-24">

<?php get_search_form(); ?>

</div>
</div>
 
<div class="container" id="main">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/print-header.png" width="100%"  id="print-header">
		<nav id="access" class="span-17 prepend-7 clearfix" role="navigation">
		
		<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
		
		<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a>
 
<?php	wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>	</nav><!-- #access -->
 
		<div id="header" class="span-16 prepend-7" role="banner">
		<!-- <div id="cu-writing"><a href="http://www.college.columbia.edu/core/uwp"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/columbia_university_writing.png"></a></div> -->
		
<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><span class='light'>The</span><br/>Morningside<br/><span class='bottom'>Review</span></a></h1>
			
		</div>
<div class="span-6 prepend-1"><div id="cu-writing"  ><a href="http://www.college.columbia.edu/core/uwp"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/selected-essays-home.png"></a></div> </div>