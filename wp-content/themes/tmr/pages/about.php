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

<div class="span-12 prepend-6 content">

<h1>About</h1>

<ul class="about-nav">
<li><a href="<?php home_url('/')  ?>?page_id=364">From The Director</a></li>
<li><a href="<?php home_url('/')  ?>?page_id=369">University Writing</a></li>
<li><a href="<?php home_url('/')  ?>?page_id=135">Masthead</a></li>


</ul>

<?

cfct_loop();

?>

</div>

<?
/* comments_template(); */

/* get_sidebar(); */
get_footer();

?>