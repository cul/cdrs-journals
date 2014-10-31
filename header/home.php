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

$blog_desc = get_bloginfo('description');
$title_description = (is_home() && !empty($blog_desc) ? ' - '.$blog_desc : '');

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie10 lt-ie9 lt-ie8 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10 oldie" <?php language_attributes() ?>> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" <?php language_attributes() ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ); ?></title>
	<?php $current_favicon = get_option('favicon_url');
    if($current_favicon != ""){
      echo '<link id="the_favicon" rel="shortcut icon" href="' . $current_favicon .'"  type="image/x-icon" />';  
    }else{
      echo '<link rel="shortcut icon" href="' .  get_stylesheet_directory_uri() . '/assets/img/favicon.ico"  type="image/x-icon" />';
    }
  ?>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<script src="//use.typekit.net/gyz5oea.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
	<?php wp_head(); ?>
	<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/ie78-style.css" type="text/css" media="all"><![endif]-->

</head>
<body <?php body_class(); ?>>
<div class="breakpoint-context"></div>
<div class="container grid">
<nav class="navbar navbar-default navbar-fixed-top" style="display:none" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <img src="<?php $logo = get_option('logo_url');
                  echo $logo ?>" class="nav_logo">
            </a>
    </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>



	<header id="masthead" class="row site-header clearfix">
	 
 

<img src="<?php $logo = get_option('logo_url');
   echo $logo ?>" class='front-cover'> 

<h1 id="site-name"><?php bloginfo('name'); ?></h1>

<p class="tagline col-sm-10 col-sm-offset-1">

 <?php $blog_info =  get_option( 'site_desc' );
    $str = str_replace('\\', '', $blog_info);
    echo $str;
   ?>
 
</p>

 <nav class="navbar col-sm-12 col-med-8 col-med-offset-2" role="navigation">
  
    <!-- Brand and toggle get grouped for better mobile display -->
    

        <?php
            wp_nav_menu( array(
                'menu'              => 'home',
                'theme_location'    => 'home',
                'depth'             => 1,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'cujo-home-navbar',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
   
   <?php $options = get_option( 'social-media-options' );
          $twitter_name =  $options['twitter_name']; 
    ?>


		<li id="twitter-link"  class="menu-item"><a href="http://twitter.com/<?php echo $twitter_name ?>" target="_blank"> <i class="fa fa-twitter"></i></a></li>
    


       <form class="navbar-form navbar-right" id="home-search" role="search">
        <div class="form-group">
          <?php if ( is_active_sidebar( 'site-search' ) ) : ?>
            <?php dynamic_sidebar( 'site-search' ); ?>
            <button type="submit" class="btn btn-default" id="searchsubmit"><i class="fa fa-search"></i></button>
          <?php endif; ?>
        </div>
      </form>
      
        
</nav>

<script type="text/javascript">

jQuery("#home-search").appendTo("#cujo-home-navbar");

jQuery("#twitter-link").appendTo("#menu-homepage-nav");
	
</script>

	</header><!-- #masthead -->

	<div id="main" class="row clearfix">