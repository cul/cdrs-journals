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

cfct_template_file('header', 'home.php'); 

?>

<div class="span-8 prepend-1 content">


<h1 class="homepage-label" >Featured Contributors</h1>
<?php

$the_query = new WP_Query('post_type=hp-feature&posts_per_page=3&orderby=rand');

//$the_query = shuffle($the_query);

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
cfct_template_file('content', 'hp-feature');
endwhile;

// Reset Post Data
wp_reset_postdata();

?>

<div id="cdrs-colophon">
<h6>Published in Partnership with</h6>
<a href="http://cdrs.columbia.edu">
<div id="cdrs-id">

CDRS

</div>

Center for Digital Research &amp; Scholarship<br>
<span class="small">Columbia University Libraries/Information Services</span>
</a>
</div>


</div>

<div class="span-7 center content">

<h1 class="homepage-label">On Writing</h1>

 <?php echo get_the_post_thumbnail( 568, 'medium'  ); ?>

<?php
$the_query = new WP_Query('category_name=on-writing&post_type=essay&posts_per_page=2');
 
while ( $the_query->have_posts() ) : $the_query->the_post();
cfct_template_file('content', 'hp-ow-feature');
endwhile;


?>

</div>

<div class="span-7 content last">

<div class="home-box">
<h1 class="homepage-label">Connect with <em>TMR</em></h1>
<div class="home-sm-icons">
<a href="http://twitter.com/MorningsideRev" class="home-social" id="twitter">twitter</a>
<a href="https://www.facebook.com/pages/The-Morningside-Review/172928982807872" class="home-social" id="facebook">facebook</a>
<a href="mailto:uwp@columbia.edu" class="home-social" id="email">email</a>
</div>
<h1 class="homepage-label">From The Director</h1>
 
 <?php
$the_query = new WP_Query('page_id=364');
 
while ( $the_query->have_posts() ) : $the_query->the_post();
the_excerpt();
echo '<a class="read-more" href="'.get_permalink().'">Read More...</a>';
endwhile;


?>
 

</div>
 
</div>



<?php
/* comments_template(); */

/* get_sidebar(); */

cfct_template_file('footer', 'page-home.php'); 

?>