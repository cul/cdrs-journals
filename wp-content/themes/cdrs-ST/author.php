<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

	if ( ($curauth->user_url == '') && ($curauth->user_description == '') ) {
	} else {

    ?>

	<div class="article-info-box clear">
	<?php 	if (validate_gravatar(get_the_author_meta( 'user_email' ))) { ?>
		<div class="article-info">
			<div class="article-info-content">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 200 ); ?>
				
			</div>
		</div>
		<div class="article-image">
			<div class="article-image-content">
	<?php } else {	?>
		<div class="article-no-image">
			<div class="article-no-image-content">	
	<?php } ?>
				<?php echo '<p>' . $curauth->user_description . '</p>';
				if ( $curauth->user_url != '' ) { ?>
				<p class="weblink"><em>Website:</em> &nbsp;<a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
				<?php } ?>
			</div>
		</div>
	</div>
	
<?php } ?>
	
	<h3 class="author-articles-header">Authored by <?php echo $curauth->display_name; ?></h3>

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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
