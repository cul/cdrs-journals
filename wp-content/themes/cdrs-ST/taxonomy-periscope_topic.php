<?php
/**
 * The template for individual Periscope pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header tax-header">

			<h1 class="entry-title">
				<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; 
	$per_src = z_taxonomy_image_url($term->term_id, 'single-image');
				
				?>
			</h1>
			<img src="<?php echo $per_src; ?>" />
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>

			</header><!-- .page-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'blog' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


	<aside id="secondary" class="sidebar widget-area" role="complementary">
	



		<section id="current_per" class="widget widget_current_per">		
			<h2 class="widget-title">Table of Contents</h2>

			<ul class="per_toc">
		<?php  $args = array(
					'post_type' => 'periscope_article',
					'posts_per_page' => '-1',
					'tax_query' => array(
						array(
						'taxonomy' => 'periscope_topic',
						'field' => 'id',
						'terms' => $term->term_id
							),
							),
						);
			
			$per_query = new WP_Query( $args );
				
			while ($per_query->have_posts()) : $per_query->the_post(); ?>
			<li>
			<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
			</a>
			<div class="per_toc_byline"><span>By</span> <?php the_author(); ?></div>
			</li>
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>

			</ul>
			
			<div class="per_toc_archive_link"><a href="/periscope/">Periscope Archive</a></div>
		
		</section>


	</aside><!-- .sidebar .widget-area -->


<?php get_footer(); ?>
