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

<div class="span-10 prepend-1 content">

<h1>From The Director</h1>
 
<p>


Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at molestie nulla. Vestibulum accumsan interdum neque at sagittis. Vestibulum quis neque metus. Sed faucibus libero nec est facilisis eu cursus nisl commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

 <a href="http://webdev.cdrs.columbia.edu/tmr/?page_id=364"> Nullam euismod convallis diam, nec mattis nisi aliquet et. Aenean id laoreet tellus.
</a>
 
</p>

<h1>Featured Contributors</h1>
<?

$the_query = new WP_Query('post_type=hp-feature');

// The Loop
while ( $the_query->have_posts() ) : $the_query->the_post();
cfct_template_file('content', 'hp-feature');
endwhile;

// Reset Post Data
wp_reset_postdata();




 

?>

</div>



<div class="span-10">

<ul>
<li>
<a href="<?php home_url('/')  ?>?page_id=123">
Current Issue
</a>
</li>

<li>
<a href="<?php home_url('/')  ?>?page_id=131">
Archive
</a>
</li>


<li>
<a href="<?php home_url('/')  ?>?page_id=129">
About
</a>
</li>


<li>
<a href="<?php home_url('/')  ?>?page_id=133">
Submit Your Essay
</a>
</li>

</ul>

<h1>Featured Content</h1>
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




<?
/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>