
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

cfct_template_file('header', 'header-essay.php');
  ?>
<section id="tmr-index" role="main" class="span-22 prepend-1">



<div class="clearfix">
<h1>Editions</h1>
<ul> 
<?php $terms = get_terms( 'edition','order=desc' );



  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'edition' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>';
      } 

 ?>
</ul>
</div> <!-- //editions -->
<div class="clearfix">
<h1>Authors</h1>
<ul id='author-index'>
<?php $terms = get_terms( 'author' );

  foreach($terms as $term) {
  
  $nameArray = explode(" ",$term->name);
  $sortValue = array_pop($nameArray);
   
    echo '<li id="'.$sortValue.'"><a href="' . get_term_link( $term->slug, 'author' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  </li>';
      } 

  
 
 
?>
</ul>
</div>

 
<h1>Progression</h1>
 
<?php $terms = get_terms( 'progression' );

  foreach($terms as $term) { 
    echo '<a href="' . get_term_link( $term->slug, 'progression' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  ';
      } 

 
?>

 

<h1>Sources</h1>
 
<?php  $terms = get_terms( 'source' );

  foreach($terms as $term) { 
    echo '<a href="' . get_term_link( $term->slug, 'source' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  ';
      } 

?>
 

<h1>Topics</h1>
 <?php  $terms = get_terms( 'topic' );

  foreach($terms as $term) { 
    echo '<a href="' . get_term_link( $term->slug, 'topic' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  ';
      } 
      ?>
<h1>Writing Strategy</h1>
 
<?php  $terms = get_terms( 'strategy' );

  foreach($terms as $term) { 
    echo '<a href="' . get_term_link( $term->slug, 'strategy' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  ';
      } 

?>     
<h1>Assignment</h1>
 
<?php  $terms = get_terms( 'assignment' );

  foreach($terms as $term) { 
    echo '<a href="' . get_term_link( $term->slug, 'assignment' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a>  ';
      } 



get_footer();

?>