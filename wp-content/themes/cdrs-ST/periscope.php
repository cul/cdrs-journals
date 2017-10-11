<?php
/**
 * Template Name: Periscope
 *
 * Description: Homepage for Periscope Issues
 *
 *
 */

     $topics = get_terms('periscope_topic', 'hide_empty');

$max = 4;
        $showTopics = array();
foreach ($topics as $topic) {


	$topicValues = array();
	$topicValues[topic] = $topic;
	$src = get_tax_meta($topic->term_id, 'st_item_feature_image');
	$topicValues[img_src] = $src[src];
	$topicValues[thmb_src] = z_taxonomy_image_url($topic->term_id, 'single-image');
	$topicValues[description] = get_tax_meta($topic->term_id, 'st_item_description');
	$topicValues[link] = get_term_link($topic);
	$topicValues[title] = $topic->name;
	$topicValues[articles_count] = $topic->count;
	$topicValues[show_link] = true;

	array_push($showTopics, $topicValues);


if(count($showTopics) == $max) break;
}


get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	
<div class="article-info-box clear periscope-info-box">
<div class="interior" style="padding: 18px">
<span class="feed_item_cat">Featured Periscope</span>
<?php $currentTopic = $showTopics[0]; ?>
<?php include 'periscope-topic-cover.php'; ?>
</div>
</div>

<!-- second topic start -->

<div class="clear periscope-box periscope-second-box">
<span class="feed_item_cat">Recent Periscopes</span>
<?php $currentTopic = $showTopics[1]; ?>
<?php include 'periscope-topic-cover.php'; ?>
</div>

<!-- second topic end -->

<!-- third topic start -->

<div class="clear periscope-box periscope-second-box">
<?php $currentTopic = $showTopics[2]; ?>
<?php include 'periscope-topic-cover.php'; ?>
</div>

<!-- third topic end -->

<!-- fourth topic start -->

<div class="clear periscope-box">
<?php $currentTopic = $showTopics[3]; ?>
<?php include 'periscope-topic-cover.php'; ?>
</div>

<!-- fourth topic end -->

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar( 'periscope-archive' ); ?>
<?php get_footer(); ?>
