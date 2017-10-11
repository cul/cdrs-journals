<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php /* twentysixteen_post_thumbnail(); */ ?>

<?php if (has_post_thumbnail()) { ?>
	<div class="article-info-box clear">
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
<?php } else { ?>
	<div class="article-info-box clear">
		<div class="article-info-no">
			<div class="article-info-content-no">
<!--				<span class="article-type">Online Feature</span>  -->
				<span class="byline"><em>By</em> &nbsp;
					<?php if ( function_exists( 'coauthors_posts_links' ) )
            coauthors_posts_links();
            else
            	the_author_posts_link();
          ?>
				</span>
				<span class="posted-on"><?php the_date('F j, Y'); ?></span>
				<?php twentysixteen_entry_taxonomies(); ?>
			</div>
		</div>
	</div>
<?php } ?>

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
