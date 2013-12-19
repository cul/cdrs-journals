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

?>
<div class="row">

<div class="span-6">

<div id="cu-writing">

<a href="http://www.college.columbia.edu/core/uwp"><img id="selected-essays" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/selected-essays-home.png" alt="Selected Essays from the Columbia University Undergraduate Writing Program"></a>

</div>

</div>
<div id="content" role="main" class="span-14">


<h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>

<?php

the_content(); 

wp_link_pages();

the_date();

the_author();

the_category(', ');

the_tags(__('Tagged with ', 'carrington-jam'), ', ', '');

comments_popup_link(__('No comments', 'carrington-jam'), __('1 comment', 'carrington-jam'), __('% comments', 'carrington-jam'));

edit_post_link(__('Edit This', 'carrington-jam'), '', '');

?>

</div>
</div>