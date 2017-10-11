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
	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
	<?php $st_recent_query = new WP_Query(
		array(
			'post_type'		=> 'post',
			'posts_per_page' 	=> '4',
			'cat' 	=> '-14,-2566,-2568'
			)
		);
						
if ( $st_recent_query->have_posts() ) {
?>
		<section id="recent_content" class="widget widget_recent_content">		
			<h2 class="widget-title">Recent Content</h2>	
				<div class="recent-content-block">
					<ul class="recent-ul">
<?php
	while ( $st_recent_query->have_posts() ) {
		$st_recent_query->the_post();

?>	
					
					<li class="recent-li recent-clearfix">
		<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>" class="recent-img" rel="bookmark">
						<img class="recent-alignleft recent-thumb" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="<?php the_title(); ?>" />
						</a>
		<?php } ?>	
						<h3 class="recent-title">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
							<?php the_title(); ?>
							</a>
						</h3>
						<time class="recent-time published"><?php echo get_the_date('F j, Y'); ?></time>
					</li>
<?php	}  ?>
				
					</ul>
				</div>
		</section>
<?php

} else {

} ?>



	<?php $st_sidejournal_query = new WP_Query(
		array(
			'post_type'		=> 'journal',
			'posts_per_page' 	=> '1',
			'orderby'		=> 'meta_value_num',
			'meta_key'		=> 'journal_issue_number',
			'order'		=> 'DESC'
			)
		);
						
if ( $st_sidejournal_query->have_posts() ) {

	while ( $st_sidejournal_query->have_posts() ) {
		$st_sidejournal_query->the_post();

			if ( get_field('journal_title') == "" ) {
			$j_date = DateTime::createFromFormat('Ymd', get_field('journal_date'));
			$j_title = $j_date->format('F Y');
			} else {
			$j_title = get_field('journal_title');
			}
?>	
		<section id="current_journal" class="widget widget_current_journal">		
			<h2 class="widget-title">Current Journal Issue</h2>	
			<a href="<?php the_field('journal_url'); ?>"><span class="feed_item_title">Issue <?php the_field('journal_issue_number'); ?> | <?php echo $j_title; ?></span></a>
		<div class="side-journal-cover">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_field('journal_url'); ?>"><?php the_post_thumbnail('journal-feat'); ?></a>
		<?php } ?>	
		</div>
			<a href="http://www.dukeupress.edu/socialtext" class="journal-subscribe-button">Subscribe</a>

		</section>
<?php	}

} else {

} ?>

    <?php wp_reset_postdata();
	
		$topics = get_terms('periscope_topic', 'number=1&hide_empty');
	foreach ($topics as $topic) {

	$per_title = $topic->name;
	$per_description = get_tax_meta($topic->term_id, 'st_item_description');
	$per_trimmed = wp_trim_words( $per_description, 100);
	$per_link = get_term_link($topic);
	$per_count = $topic->count;
	$per_src = z_taxonomy_image_url($topic->term_id, 'single-image');

	}

	?>

		<section id="current_per" class="widget widget_current_per">		
			<h2 class="widget-title">Recent Periscope Topic</h2>	
		<div class="side-periscope">
			<a href="<?php echo $per_link; ?>"><img src="<?php echo $per_src; ?>" /></a>
			<a href="<?php echo $per_link; ?>" class="feed_item_title"><?php echo $per_title; ?></a>
<span class="per_home_links"><a href="<?php echo $per_link; ?>">Browse this Periscope (<?php echo $per_count; ?> Articles)</a></span>
		</div>
		</section>
		
    <?php wp_reset_postdata(); ?>
	
	<?php if(is_singular( 'editorsblog' ) || is_archive( 'editorsblog' ) ) {
	
	} else { ?>
	
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
			<h2 class="widget-title">Editor's Blog</h2>	
		<div class="side-periscope">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>editorsblog"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/editorsblog.jpg" /></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>editorsblog" class="feed_item_title"><?php the_title(); ?><span class="current_ed_date"><?php the_date('F j, Y'); ?></span></a>
		</div>
		</section>
<?php	}

} else {

} 

} ?>



	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
