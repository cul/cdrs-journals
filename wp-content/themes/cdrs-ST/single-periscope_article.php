<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php /* twentysixteen_post_thumbnail(); */ ?>

<?php
$term_list = wp_get_post_terms($post->ID, 'periscope_topic', array("fields" => "all"));
$taxname = $term_list[0]->name ;
$taxid = $term_list[0]->term_id ;
$taxlink = get_term_link($taxid);

?>

	<div class="article-info-box clear">
		<div class="periscope-att clear"><span class="feed_item_cat">From: <a href="<?php echo $taxlink; ?>"><?php echo $taxname; ?></a></span></div>
		<div class="article-info">
			<div class="article-info-content">
<!--				<span class="article-type">Online Feature</span>  -->
				<span class="byline"><em>By</em> &nbsp;
					<?php if ( function_exists( 'coauthors_posts_links' ) )
            coauthors();
            else
            	the_author();
          ?>
				</span>
				<span class="posted-on"><?php the_date('F j, Y'); ?></span>
				<?php twentysixteen_entry_taxonomies(); ?>
			</div>
		</div>
		<div class="article-image">
			<div class="article-image-content">
				<?php the_post_thumbnail('single-image'); ?>
			</div>
		</div>
	</div>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

				get_template_part( 'template-parts/biography' );

		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

		<?php
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->


</div><!-- .content-area -->


	<aside id="secondary" class="sidebar widget-area" role="complementary">

		<?php dynamic_sidebar( 'periscope-contents-sidebar' ); ?>


    <?php

	$topic = get_term( $taxid, $periscope_topic );
	$per_title = $topic->name;
	$per_link = get_term_link($topic);
	$per_src = z_taxonomy_image_url($topic->term_id, 'single-image');


	?>

		<section id="current_per" class="widget widget_current_per">
			<h2 class="widget-title">Table of Contents</h2>
<?php 	if (is_singular()) { ?>
		<div class="side-periscope">
			<img src="<?php echo $per_src; ?>" />
			<a href="<?php echo $per_link; ?>" class="feed_item_title">
			<?php echo $per_title; ?>
			</a>
		</div>
<?php 	} ?>

			<ul class="per_toc">
		<?php  $args = array(
					'post_type' => 'periscope_article',
					'posts_per_page' => '-1',
					'tax_query' => array(
						array(
						'taxonomy' => 'periscope_topic',
						'field' => 'id',
						'terms' => $taxid
							),
							),
						);

			$per_query = new WP_Query( $args );

			while ($per_query->have_posts()) : $per_query->the_post(); ?>
			<li>
			<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			</a>
			<div class="per_toc_byline"><span>By</span>
				<?php if ( function_exists( 'coauthors_posts_links' ) )
					coauthors_posts_links();
					else
						the_author_posts_link();
				?>
			</div>
			</li>
			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>

			</ul>

			<div class="per_toc_archive_link"><a href="/periscope/">Periscope Archive</a></div>

		</section>


	</aside><!-- .sidebar .widget-area -->



<?php get_footer(); ?>
