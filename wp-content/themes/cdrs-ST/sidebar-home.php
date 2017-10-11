<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">

		<?php dynamic_sidebar( 'homepage-sidebar' ); ?>


    <?php wp_reset_postdata(); ?>

	<?php 	$edblog_query = new WP_Query(
		array(
			'post_type'		=> 'editorsblog',
			'posts_per_page' 	=> '1'
			)
		);

if ( $edblog_query->have_posts() ) {

	while ( $edblog_query->have_posts() ) {
		$edblog_query->the_post();

?>
		<section id="current_ed" class="widget widget_current_per">
			<h2 class="widget-title">Web Editor's Blog</h2>	
		<div class="side-periscope">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>editorsblog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/editorsblog.jpg" /></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>editorsblog" class="feed_item_title"><?php the_title(); ?><span class="current_ed_date"><?php the_date('F j, Y'); ?></span></a>
		</div>
		</section>
<?php	}

} else {

} ?>

    <?php wp_reset_postdata(); ?>



		<?php dynamic_sidebar( 'about-sidebar' ); ?>

	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
