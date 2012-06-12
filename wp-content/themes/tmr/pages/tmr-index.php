
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
<div id="tmr-index" role="main" class="content">
<div class="span-14 prepend-7" id='tmr-index-content'>
<?
cfct_loop();

?>
</div>

<div class="span-6 prepend-3" id="index-left-col"> 

<h1>Edition</h1>

<ul id='editions'class='taxonomy-list clearfix'> 
<?php $terms = get_terms( 'edition','order=desc&hierarchical=0&hide_empty=1' );



  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'edition' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>';
      } 

 ?>
</ul>

 
<h1>Progression</h1>
<ul id='sources' class='taxonomy-list clearfix'>

<?php $terms = get_terms( 'progression', 'orderby=id' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'progression' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

 
?>

</ul>
 




      
<!--

 
<div id='strategy' class="taxlist-toggle">
<ul id='strategies'class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'strategy' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'strategy' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

?>   


</ul>

</div>

-->
  

 
 
  <h1>Assignment</h1>
 <ul id='assignments'class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'assignment' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'assignment' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } ?>
</ul>
 
</div>

<div id="academic-tax">

 


<!--  <li class='tax-nav'><a href='#' id=''>Strategy</a></li> -->

<!--  <li class='tax-nav'><a href='#' id=''>Topics</a></li> -->
 


<div id='sources' class="span-10 prepend-1 taxlist-toggle">
<h1>On Writing</h1>

<ul id='on-writing' class='taxonomy-list clearfix'>
<?php  $ow_essays = new WP_Query( 'category_name=on-writing&post_type=essay' );

 

while ( $ow_essays->have_posts() ) : $ow_essays->the_post();
	 ?> <li><a href="<? the_permalink() ?>"> <? the_title()?></a></li> <?php
	 
	 endwhile;

 
wp_reset_postdata();


 

?>

</ul>


 <h1>Highlighted Source</h1>
<ul id='sources' class='taxonomy-list clearfix'>
<?php  $terms = get_terms( 'source' );

  foreach($terms as $term) { 
    echo '<li><a href="' . get_term_link( $term->slug, 'source' ) . '" title="' . sprintf( __( "View archive of %s content" ), $term->name ) . '" ' . '>' . $term->name.'</a></li>  ';
      } 

?>

</ul>

</div>

 
 <div id='topics' class="taxlist-toggle">
<?
wp_tag_cloud('taxonomy="topics"');     

?>
</div>
</div>

 

<div class="span-17 prepend-3">
<h1>Author</h1>
<?php 

//$terms = get_terms('author', 'fields=names&hide_empty=0&orderby=name');
$terms = get_terms( 'author', 'orderby=name');

foreach ($terms as $term) {
	$slug[] = $term->slug;
	$name[] = $term->name;
}

//echo print_r($terms)."<br><br>";

/* echo "number of terms: ".sizeof($terms)."<br><br>"; */

$columnLength = round(count($terms)/3);

/* echo "columnLength: ".$columnLength."<br><br>"; */

$count = 0;

for ($iCol=0; $iCol<3; $iCol++) {
	echo "<div class='authors-column'>";
	echo "<ul id='author-index' class='taxonomy-list clearfix'>";
	
	if ($iCol==0) {
		$start = 0;
		$finish = $columnLength;
	}
	elseif ($iCol==1) {
		$start = $columnLength;
		$finish = $columnLength + $columnLength;
	}
	elseif ($iCol==2) {
		$start = $columnLength + $columnLength;
		$finish = count($terms);
	}
	
/* 	echo "iCol: ".$iCol."<br>"; */
/* 	echo "start: ".$start."<br>"; */
/* 	echo "finish: ".$finish."<br><br><br>";	 */
	
	for ($i=$start; $i<$finish; $i++) {
		$nameArray = explode(",",$name[$i]);
		$sortValue = array_pop(array_reverse($nameArray));
		
		echo '<li id="'.$sortValue.'"><a href="' . get_term_link( $slug[$i], 'author' ) . '" title="' . sprintf( __( "View archive of %s content" ), $name[$i] ) . '" ' . '>' . $name[$i].'	</a></li>';
		
	}
	echo "</ul>";
	echo "</div>";
}

?>


</div>
</div>

<?
get_footer();

?>