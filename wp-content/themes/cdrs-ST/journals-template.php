<?php
/**
 * Template Name: Journal Archive
 *
 * Description: Archive Page for Journal Issues
 *
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title">Journal Archive</h1>
	</header><!-- .entry-header -->
	
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
	<div class="entry-content">
		<?php
			the_content();
		?>
		
<?php $st_journal_query = new WP_Query(
		array(
			'post_type'		=> 'journal',
			'posts_per_page' 	=> '-1',
			'orderby'		=> 'meta_value_num',
			'meta_key'		=> 'journal_issue_number',
			'order'		=> 'DESC'
			)
		);
						
if ( $st_journal_query->have_posts() ) {

	while ( $st_journal_query->have_posts() ) {
		$st_journal_query->the_post();

			$j_image = '';
			if ( has_post_thumbnail() ) { 
			$j_image = get_the_post_thumbnail($post->ID,'journal-feat');
			}
			if ( get_field('journal_title') == "" ) {
			$j_date = DateTime::createFromFormat('Ymd', get_field('journal_date'));
			$j_title = $j_date->format('F Y');
			} else {
			$j_title = get_field('journal_title');
			}
			$j_content = get_the_content();
			$j_content_format = get_content_format($j_content);
			$j_url = get_field('journal_url');
			$j_linktext = get_field('journal_link_text');
?>
			
			<span class="feed_item_title">Issue <?php the_field('journal_issue_number'); ?> | <?php echo $j_title; ?></span>

			<p class="toggleshow">Show / Hide details</p>
			<div class="journal-archive-container togglehide clear"><?php echo $j_image; ?><div class="journal-archive-details">
				<div class="feed_item_excerpt"><?php echo $j_content_format; ?></div>
			<span class="feed_item_details journal_links"><a href="<?php echo $j_url; ?>"><?php echo $j_linktext; ?></a></span>
				</div>
			</div>

			
<?php	}

	}  ?>
			
		
		
	</div><!-- .entry-content -->
		<?php

			// End of the loop.
		endwhile;
		?>
	
	
</article><!-- #post-## -->

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
