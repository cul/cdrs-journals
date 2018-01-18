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

get_header();

?>

<div id="primary" class="col-sm-12">

<header role="page-title">
	<h1 class="archive-title"><?php
		if (is_day()) {
			printf(__('Daily Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date() . '</span>');
		} elseif (is_month()) {
			printf(__('Monthly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'carrington-blueprint')) . '</span>');
		} elseif (is_year()) {
			printf(__('Yearly Archives: %s', 'carrington-blueprint'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'carrington-blueprint')) . '</span>');
		}  elseif (is_tax('issues')) {
			printf(__('Issue: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		} elseif (is_tax('authors')) {
			printf(__('Articles by: %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		}elseif (is_tax('sections')) {
			printf(__(' %s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		}elseif (is_category()) {
			printf(__('%s', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>');
		}
	?></h1>
</header>

	<?php
		// Show an optional category description
		if (is_category) {
			$category_description = category_description();
			if ($category_description) {
				echo '<div class="archive-description">' . $category_description . '</div>';
			}
		} elseif (is_tag()) {
			$tag_description = tag_description();
			if ($tag_description) {
				echo '<div class="archive-description">' . $tag_description . '</div>';
			}
		}
	?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID() ?>" <?php post_class('excerpt clearfix') ?>>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>"  title="<?php printf( esc_attr__( 'Permalink to %s', 'carrington-blueprint' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title() ?></a></h2>

		<p class="excerpt-byline">
			<?php
			  		$authors =  wp_get_object_terms($post->ID, 'authors', array("fields" => "all", 'orderby' => 'term_order'));
			  		$more_authors = array();
			  		if($authors){
							echo '';
			           foreach ( $authors as $author ) {

			    		// The $term is an object, so we don't need to specify the $taxonomy.
			    		$term_link = get_term_link( $author );

			    		// If there was an error, continue to the next term.
						if ( is_wp_error( $term_link ) ) {
							continue;
						}

			    		// We successfully got a link. Print it out.
			    		array_push( $more_authors, '<a href="' . esc_url( $term_link ) . '">' . $author->name . '</a>');
					}
					echo implode(', ', $more_authors);
			   }?>
		</p>

		<p class="pubdate">Published <?php the_time('M j, Y'); ?></p>

		<p class="excerpt-text"><?php the_excerpt(); ?></p>

		</article><!-- .post -->

<?php endwhile; else : ?>
<?php endif; ?>

<div class="pagination">
	<span class="next"><?php next_posts_link(__('Next &raquo;', 'carrington-blueprint')) ?></span>
	<span class="previous"><?php previous_posts_link(__('&laquo; Previous', 'carrington-blueprint')) ?></span>
</div>

</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
?>
