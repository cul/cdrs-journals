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

get_header();

?>

<div class="span-10 prepend-1 content">

<h1>From The Director</h1>
 
<p>

Welcome to the inaugural edition of <em>The Morningside Review</em> formerly <em>the Journal of the Undergraduate Writing Program at Columbia University</em>. In an introductory note for this edition, <a href="http://webdev.cdrs.columbia.edu/tmr/?page_id=364">Undergraduate Writing Program Director Nicole Wallach discusses the impact and value of youth in writing.</a>
</p>

<h1>Featured Contributors</h1>
<?


query_posts( 'post_type=hp-feature');

if (have_posts()) {
	while (have_posts()) {
		the_post();
cfct_template_file('content', 'hp-feature');	}
}


?>

</div>


<div class="span-10">

 


</div>




<?
/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>