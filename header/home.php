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
	<?php $current_favicon = get_theme_mod('favicon_url');
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
				'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>



	<header id="masthead" class="row site-header clearfix">



<img src="<?php echo get_theme_mod( 'your_theme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="front-cover">

<?php
  if(get_theme_mod('site_title_setting') == "1"){
?>
<h1 id="site-name"><?php bloginfo('name'); ?></h1>
<?php }else{
  echo '<br>';
} ?>

<p class="tagline">

 <?php $blog_info =  get_theme_mod( 'site_desc' );
    $str = str_replace('\\', '', $blog_info);
    echo $str;
   ?>

</p>

<div class="home-nav-wrap">

 <nav id="home-access-nav" role="navigation">

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

   <?php 
          $twitter_name =  get_theme_mod('twitter_name');
          $fb_name = get_theme_mod('fb_name');
          $linked_in = get_theme_mod('linkedin_name');
    ?>


    <?php if($twitter_name !== ""): ?>
    <li id="twitter-link"  class="menu-item"><a href="http://twitter.com/<?php echo $twitter_name ?>" target="_blank"> <i class="fa fa-twitter"></i></a></li>
    <?php endif;
    if($fb_name !== ""): ?>
    <li id="fb-link"  class="menu-item"><a href="http://facebook.com/<?php echo $fb_name ?>" target="_blank"> <i class="fa fa-facebook"></i></a></li>
  <?php endif; ?>

       <form class="navbar-form" id="home-search" role="search">
        <div class="form-group">
          <?php if ( is_active_sidebar( 'site-search' ) ) : ?>
            <?php dynamic_sidebar( 'site-search' ); ?>
            <button type="submit" class="btn btn-default" id="searchsubmit"><i class="fa fa-search"></i></button>
          <?php endif; ?>
        </div>
      </form>

      <form class="navbar-form navbar-right" id="home-search-top" role="search">
        <div class="form-group">
          <?php if ( is_active_sidebar( 'site-search' ) ) : ?>
            <?php dynamic_sidebar( 'site-search' ); ?>
            <button type="submit" class="btn btn-default" id="searchsubmit"><i class="fa fa-search"></i></button>
          <?php endif; ?>
        </div>
      </form>

</nav>

</div>
<script type="text/javascript">

jQuery("#home-search").appendTo("#cujo-home-navbar");
jQuery("#home-search-top").appendTo("#bs-example-navbar-collapse-1");

jQuery("#twitter-link").appendTo("#menu-homepage-nav");
jQuery("#fb-link").appendTo("#menu-homepage-nav");

</script>

	</header><!-- #masthead -->

	<div id="main" class="row clearfix">
