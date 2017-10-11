<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2014 Crowd Favorite, Ltd. All rights reserved.
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

<article id="post-<?php the_ID() ?>" <?php post_class('excerpt clearfix') ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink() ?>"  title="<?php printf( esc_attr__( 'Permalink to %s', 'carrington-blueprint' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title() ?></a></h2>
		<time class="entry-date" datetime="<?php the_time('c'); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>
		
	</header>
	<div class="entry-content">

		<?php
			the_excerpt();
		?>

	</div>
	<div class="entry-footer entry-meta">
		<?php
			printf(__('<p><strong>Categories</strong> %s</p>', 'carrington-blueprint'), get_the_category_list(', '));
			the_tags(__('<p><strong>Tags</strong> ', 'carrington-blueprint'), ', ', '</p>');
		?>
		<p><?php edit_post_link(); ?></p>
	</div>
</article><!-- .post -->