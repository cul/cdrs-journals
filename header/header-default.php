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
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ).$title_description; ?></title>
  <?php $current_favicon = get_option('favicon_url');
    if($current_favicon != ""){
      echo '<link id="the_favicon" rel="shortcut icon" href="' . $current_favicon .'"  type="image/x-icon" />';  
    }else{
      echo '<link rel="shortcut icon" href="' .  get_stylesheet_directory_uri() . '/assets/img/favicon.ico"  type="image/x-icon" />';
    }
  ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<script src="//use.typekit.net/zum2nkz.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

	
	<?php wp_head(); ?>
	<!--[if lt IE 9]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/ie78-style.css" type="text/css" media="all"><![endif]-->
  <?php
    $heading_color = get_option('heading_color');
    $link_color = get_option('link_color');
    $link_hover = get_option('link_hover');
    $background_color = get_option('background_color');
    $text_color = get_option('text_color');
    $menu_background_color = get_option('menu_background_color');
    $menu_text_color = get_option('menu_text_color');
    $menu_text_hover_color = get_option('menu_text_hover_color');
    $menu_hover_color = get_option('menu_hover_color');
    $active_menu = get_option('active_menu');
    $home_font_hover = get_option('home_font_hover');
    $home_back_hover = get_option('home_back_hover');
  ?>
  <style>
    h1,h2,h3,h4 { color:  <?php echo $heading_color; ?>; }
    a { color: <?php echo $link_color ?>; }
    a:hover {color: <? echo $link_hover ?>;}
    body {background-color: <?php echo $background_color ?>;
          color: <?php echo $text_color ?>;
    }
    div.container-fluid{ background-color: <?php echo $menu_background_color ?>;}
    nav.navbar.navbar-default.navbar-fixed-top div.container-fluid{ background-color: <?php echo $menu_background_color ?>; color: <?php echo $menu_text_color ?>;}
    div#bs-example-navbar-collapse-1 a{ color: <?php echo $menu_text_color ?>;}
    div.navbar-header a.navbar-brand{ color: <?php echo $menu_text_color ?>; }
    #cujo-navbar a {color: <?php echo $menu_text_color ?>;}
    div#bs-example-navbar-collapse-1.collapse.navbar-collapse li:hover,  div#bs-example-navbar-collapse-1 a.dropdown-toggle:hover {
      background-color: <?php echo $menu_hover_color ?>;
    }
    div.navbar-header a.navbar-brand:hover{ background-color: <?php echo $menu_hover_color ?>;
      color: <?php echo $menu_text_hover_color ?>;
    }
    div#bs-example-navbar-collapse-1 a:hover {color: <?php echo $menu_text_hover_color ?>;}
    div#bs-example-navbar-collapse-1 a:checked{
      color: <?php echo $menu_text_hover_color ?>;
      background-color: <?php echo $menu_hover_color ?>;
    }
    .navbar-default .navbar-nav > .open > a .caret,.navbar-default .navbar-nav > .open > a, 
    .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus{
      color: <?php echo $menu_text_hover_color ?>;
      background-color: <?php echo $menu_hover_color ?>;
    }
    div#bs-example-navbar-collapse-1 ul a:hover{
      color: <?php echo $menu_text_hover_color ?>;
      background-color: <?php echo $menu_hover_color ?>;
    }
    #cujo-navbar li.active a, div#bs-example-navbar-collapse-1 li.active a{
      background-color: <?php echo $active_menu ?>; 
    }
    #home-access-nav li a:hover{
      color: <?php echo $home_font_hover ?>;
      background-color: <?php echo $home_back_hover ?> !important;
    }
  </style>
</head>
<body <?php body_class(); ?>>
<div class="breakpoint-context"></div>
<div class="container grid">
	<header id="masthead" class="row site-header clearfix">
	 
 
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#cujo-navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>">
        <?php 
          if(get_option('menu_logo_url')){
            $logo = get_option('menu_logo_url');
          }else{
            $logo = get_option('logo_url');
          }
        ?>
                <img src="<?php echo $logo ?>" class="nav_logo">
            </a>
    </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'cujo-navbar',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>


  <form class="navbar-form navbar-right form-inline" id="site-search" role="search">
        <div class="form-group">
          <?php if ( is_active_sidebar( 'site-search' ) ) : ?>
            <?php dynamic_sidebar( 'site-search' ); ?>
            <button type="submit" class="btn btn-default controlls-row" id="sub"><i class="fa fa-search"></i></button>
          <?php endif; ?>
        </div>
      </form>



<script type="text/javascript">

jQuery("#site-search").appendTo("#cujo-navbar");


	
</script>
<!-- <h1 id="site-name"><a href="<?php echo home_url('/'); ?>" title="<?php _e('Home', 'carrington-blueprint'); ?>"><?php bloginfo('name'); ?></a></h1> -->


 
	</header><!-- #masthead -->

	<div id="main" class="row clearfix">