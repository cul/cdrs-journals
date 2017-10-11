<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


	<?php $st_homeposts_query = new WP_Query(
		array(
			'post_type'		=> 'post',
			'posts_per_page' 	=> '9',
			'cat'		=> '-51,'
/*			'cat'		=> '-14,' */
			)
		);

		if( $st_homeposts_query->posts ) { ?>


			<?php
				$homefirstpost = '';
				$homepostblock = '';
				$st_count=0; ?>
			<?php foreach( $st_homeposts_query->posts as $post ) : setup_postdata( $post ); ?>
			<?php $st_count++;

				if ( in_category( 'reviews' )) {
				$catname = 'Features: Reviews';
				$catlink = get_category_link( '31' );
				} elseif ( in_category( 'events' )) {
				$catname = 'Features: Events';
				$catlink = get_category_link( '22' );
				} elseif ( in_category( 'fiction' )) {
				$catname = 'Fiction';
				$catlink = get_category_link( '1646' );
				} elseif ( in_category( 'podcasts' )) {
				$catname = 'Podcasts';
				$catlink = get_category_link( '1677' );
				} elseif ( in_category( 'poetry' )) {
				$catname = 'Features: Poetry';
				$catlink = get_category_link( '2604' );
				} elseif ( in_category( 'interviews' )) {
				$catname = 'Features: Interviews';
				$catlink = get_category_link( '46' );
				} else {
				$catname = 'Features';
				$catlink = get_permalink( get_option('page_for_posts' ) );
				}

				if ($st_count == 1) {
				$homefirstpost .= '<div class="feed_item"><div class="feed_item_inner">';
				if( has_post_thumbnail() ) {
				$homefirstpost .= '<a href="' . get_the_permalink() . '" class="feed_item_image">' . get_the_post_thumbnail( $post,'feed-image' ) . '</a>';
				}

				$homefirstpost .= '<a href="' . get_the_permalink() . '" class="feed_item_title"><span>' . get_the_title();
					if ( get_field('misc_article_subtitle') != "" ) {
				$subtitle = get_field('misc_article_subtitle');
				$homefirstpost .= '<span class="feed_item_subtitle">' . $subtitle . '</span>';
					}
				$homefirstpost .= '</span></a>';
				$homefirstpost .= '<span class="feed_item_cat">';
				$homefirstpost .=  coauthors(', ', ',and ', null, null, false) . '</span>';
				$homefirstpost .= '<div class="feed_item_excerpt">';
				$homefirstpost .= '<p>' . get_the_excerpt() . '</p></div>';
				$homefirstpost .= '<span class="feed_item_details">';
				$homefirstpost .= '<span class="feed_item_author"><time class="feed_item_date" datetime="">' . get_the_date('F j, Y') . '</time> | <a href="' . esc_url( $catlink ) . '">' . $catname . '</a>';
				$homefirstpost .= '</span></div></div>';

				} else {

				if ($st_count % 2 == 0) {
					$st_col = 'left';
				} else {
					$st_col = 'right';
				}

				$homepostblock .= '<div class="feed_item feed_col_' . $st_col . '"><div class="feed_item_inner">';
				if( has_post_thumbnail() ) {
				$homepostblock .= '<a href="' . get_the_permalink() . '" class="feed_item_image">' . get_the_post_thumbnail( $post,'feed-image' ) . '</a>';
				}

				$homepostblock .= '<a href="' . get_the_permalink() . '" class="feed_item_title"><span>' . get_the_title();
					if ( get_field('misc_article_subtitle') != "" ) {
				$subtitle = get_field('misc_article_subtitle');
				$homepostblock .= '<span class="feed_item_subtitle">' . $subtitle . '</span>';
					}
				$homepostblock .= '</span></a>';
				$homepostblock .= '<span class="feed_item_cat">';
				$homepostblock .=  get_the_author() . '</span>';
				$homepostblock .= '<div class="feed_item_excerpt">';
				$homepostblock .= '<p>' . get_the_excerpt() . '</p></div>';
				$homepostblock .= '<span class="feed_item_details">';
				$homepostblock .= '<span class="feed_item_author"><time class="feed_item_date" datetime="">' . get_the_date('F j, Y') . '</time> | <a href="' . esc_url( $catlink ) . '">' . $catname . '</a>';
				$homepostblock .= '</span></div></div>';

				}
			 endforeach; ?>


    <?php } ?>

    <?php wp_reset_postdata();

		$topics = get_terms('periscope_topic', 'number=1&hide_empty');
	foreach ($topics as $topic) {

	$per_title = $topic->name;
	$per_description = get_tax_meta($topic->term_id, 'st_item_description');
	$per_trimmed = wp_trim_words( $per_description, 100);
	$per_link = get_term_link($topic);
	$per_count = $topic->count;
	$per_src = z_taxonomy_image_url($topic->term_id, 'large');

	}

	?>


	<div class="site-inner">
		<div class="home-section-one site-content clear">

		<div class="home-first-post">
			<?php echo $homefirstpost; ?>
		</div>

		<div class="home-periscope clear">
			<img src="<?php echo $per_src; ?>" />
			<div class="home-periscope-details">
			<div class="home-per-strap"><h4>Periscope: Critical Perspectives on Contemporary Issues</h4></div>
			<div class="home-per-details-inner">
			<a href="<?php echo $per_link; ?>" class="feed_item_title"><?php echo $per_title; ?></a>
			<div class="feed_item_excerpt"><p><?php echo $per_trimmed; ?></p></div>
			<ul class="per_home_links"><li><a href="<?php echo $per_link; ?>">Browse this Periscope (<?php echo $per_count; ?> Articles)</a></li><li><a href="<?php echo site_url(); ?>/periscope/">Periscope Archives</a></li></ul>
			</div>
			</div>
		</div>

		</div>
	</div><!-- .site-inner HOME SECTION ONE -->

	<?php $st_homejournal_query = new WP_Query(
		array(
			'post_type'		=> 'journal',
			'posts_per_page' 	=> '1',
			'orderby'		=> 'meta_value_num',
			'meta_key'		=> 'journal_issue_number',
			'order'		=> 'DESC'
			)
		);

if ( $st_homejournal_query->have_posts() ) {

	while ( $st_homejournal_query->have_posts() ) {
		$st_homejournal_query->the_post();

			if ( get_field('journal_title') == "" ) {
			$j_date = DateTime::createFromFormat('Ymd', get_field('journal_date'));
			$j_title = $j_date->format('F Y');
			} else {
			$j_title = get_field('journal_title');
			}
?>

	<div id="journal-container">
	<div class="site-inner">
		<div class="site-content">

		<div class="home-journal-cover">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_field('journal_url'); ?>"><?php the_post_thumbnail('journal-feat'); ?></a>
		<?php } ?>
			<a href="http://www.dukeupress.edu/socialtext" class="journal-subscribe-button">Subscribe</a>
		</div>

		<div class="home-journal-contents">
			<span class="feed_item_cat">Current Journal Issue</span>
			<span class="feed_item_title">Issue <?php the_field('journal_issue_number'); ?> | <?php echo $j_title; ?></span>
			<div class="feed_item_excerpt"><?php the_content(); ?></div>
			<span class="feed_item_details journal_links"><a href="<?php the_field('journal_url'); ?>"><?php the_field('journal_link_text'); ?></a></span>
		</div>

		<div class="home-journal-article">
			<span class="feed_item_cat">Featured Journal Article</span>
			<span class="feed_item_title"><?php the_field('featured_article_title'); ?><span class="feed_item_subtitle">
		<?php if ( the_field('featured_article_subtitle') != "" ) { ?>
			<?php the_field('featured_article_subtitle'); ?>
		<?php } ?>
			</span></span>
			<div class="feed_item_excerpt"><?php the_field('featured_article_abstract'); ?></div>
			<span class="feed_item_details"><span class="feed_item_author"><em>By</em>&nbsp; <?php the_field('featured_article_author'); ?></span></span>
			<span class="feed_item_details journal_links"><a href="<?php the_field('featured_article_url'); ?>">Available for free download via Duke University Press</a></span>
		</div>

		</div>
	</div><!-- .site-inner JOURNAL -->
	</div><!-- #journal-container -->

<?php	}

} else {

} ?>

	<div class="site-inner">
		<div id="content" class="site-content">


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php echo $homepostblock; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar( 'home' ); ?>
<?php get_footer(); ?>
