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

</div>

<div class="span-7 center content">

<h1 class="homepage-label">On Writing</h1>

<?
$the_query = new WP_Query('category_name=on-writing&post_type=essay');
 
while ( $the_query->have_posts() ) : $the_query->the_post();
cfct_template_file('content', 'hp-ow-feature');
endwhile;


?>

</div>

<div class="span-7 content last">

<h1 class="homepage-label">From The Director</h1>
 
<p>Our university's first classes in 1754 were taught by an essayist: Samuel Johnson. The essaying tradition at Columbia has continued unbroken, but not untested, until today.<a href="?page_id=364">read more...</a></p>




 <!--


<p class="blurb"><em>The Morningside Review</em> is an online journal published by <a href='http://www.college.columbia.edu/core/uwp'>Undergraduate Writing Program at Columbia University</a>. It features exemplary essays written by first-year undergraduates in the Core Curriculum course, <a href="http://webdev.cdrs.columbia.edu/tmr/?page_id=369">University Writing</a>.</p>
--> <!-- <p>Since these essays serve as vivid examples of peer work, they are commonly assigned in University Writing. Students may be prompted by their instructors to identify the rhetorical strategies employed in an essay, contemplate their effectiveness, and attempt to emulate those they admire in their own work. Thus, Columbia University students may make their imprint on University Writing long after they have completed the course.</p> -->
<div class="home-box">
<h1 class="homepage-label">Connect With TMR</h1>

<a href="http://twitter.com/MorningsideRev" class="home-social" id="twitter">twitter</a>
<a href="https://www.facebook.com/pages/The-Morningside-Review/172928982807872" class="home-social" id="facebook">facebook</a>
<a href="mailto:uwp@columbia.edu" class="home-social" id="email">email</a>
</div>

 
</div>



<?php
/* comments_template(); */

/* get_sidebar(); */

cfct_template_file('footer', 'page-home.php'); 

?>