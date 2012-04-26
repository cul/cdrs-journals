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

<div class="span-6 prepend-1 content">


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

</div>










<div class="span-7 prepend-1 content">
<h1 class="homepage-label">Featured Content</h1>
<?php

cfct_loop();

?> 


<!--
<h2>Read Essays</h2>

￼￼Browse essays by category or do a keyword search. You can also view the complete TMR index in Archive.
Assignment type
Citation
Progression
Year	 

-->

</div>
<div class="span-7 prepend-1 content last">

<h1 class="homepage-label">From The Director</h1>
 
<p>
<a href="?page_id=364">Our university's first classes in 1754 were taught by an essayist: Samuel Johnson. The essaying tradition at Columbia has continued unbroken, but not untested, until today.</a>
 
</p>

<h1 class="homepage-label">Connect With TMR</h1>

<a href="http://twitter.com/MorningsideRev"><img src="<? bloginfo('stylesheet_directory') ?>/img/twitter02_dark.png "></a>
<a href="https://www.facebook.com/pages/The-Morningside-Review/172928982807872"><img src="<? bloginfo('stylesheet_directory') ?>/img/facebook_dark.png "></a>
<img src="<? bloginfo('stylesheet_directory') ?>/img/rss_dark.png ">

<br>

<?php get_search_form(); ?>
</div>



<?
/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>