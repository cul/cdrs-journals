
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
<section id="tmr-index" role="main" class="content">


<div class="span-5 prepend-1"> 
<h1>Editions</h1>
<ul id='editions'class='taxonomy-list clearfix'> 
<?php $terms = get_terms( 'edition','order=desc' );



  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'edition' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>';
      } 

 ?>
</ul>
 
</div>
<div class="span-17" id="academic-tax">
 <ul class="clearfix">
 <li class='tax-nav'><a href='#' id=''>Progression</a></li>
 <li class='tax-nav'><a href='#' id=''>Sources</a></li>
 <li class='tax-nav'><a href='#' id=''>Strategy</a></li>
 <li class='tax-nav'><a href='#' id=''>Assignment</a></li>
 <li class='tax-nav'><a href='#' id=''>Topics</a></li>
 </ul>

<div id='progression' class="taxlist-toggle">
<ul id='sources'class='taxonomy-list clearfix'>
<?php $terms = get_terms( 'progression', 'orderby=id' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'progression' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

 
?>

</ul>
</div>


<div id='sources' class="taxlist-toggle">
<ul id='sources' class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'source' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'source' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

?>

</ul>

</div>

      

 
<div id='strategy' class="taxlist-toggle">
<ul id='strategies'class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'strategy' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'strategy' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

?>   


</ul>

</div>

  

 
 <div id='assignment' class="taxlist-toggle">
 <ul id='assignments'class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'assignment' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'assignment' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } ?>
</ul>
</div>


 
 <div id='topics' class="taxlist-toggle">
<?
wp_tag_cloud('taxonomy="topics"');     

?>
</div>
</div>

 

<div class="span-22 prepend-1">
<h1>Authors</h1>
<ul id='author-index'class='taxonomy-list clearfix'>
<?php $terms = get_terms( 'author' );

  foreach($terms as $term) {
  
  $nameArray = explode(" ",$term->name);
  $sortValue = array_pop($nameArray);
   
    echo '<li id="'.$sortValue.'"><a href="' . get_term_link( $term->slug, 'author' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>';
      } 

  
 
 
?>
</ul>
 


</div>


<?
get_footer();

?>