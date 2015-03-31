<?php
// remove unwanted dashboard widgets for relevant users
function wptutsplus_remove_dashboard_widgets() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    
}
add_action( 'wp_dashboard_setup', 'wptutsplus_remove_dashboard_widgets' );

// add new dashboard widgets
function wptutsplus_add_dashboard_widgets() {
    wp_add_dashboard_widget( 'wptutsplus_dashboard_links', 'CDRS News', 'wptutsplus_add_links_widget' );
}

function wptutsplus_add_links_widget() { 
 include_once(ABSPATH.WPINC.'/feed.php');
	echo '<div>';
	wp_widget_rss_output(array(
	'url' => 'http://cdrs.columbia.edu/cdrsmain/?q=index.php/feed/',
	'title' => 'Latest news from CDRS',
	'items' => 3,
	'show_summary' => 1,
	'show_author' => 0,
	'show_date' => 1
	));
	echo "</div>";
 }

add_action( 'wp_dashboard_setup', 'wptutsplus_add_dashboard_widgets' );

function remove_footer_admin () {
    echo "<a href='cdrs.columbia.edu'>Center For Digital Research and Scholarship</a>";
}
 
add_filter('admin_footer_text', 'remove_footer_admin');

add_action( 'admin_head', 'q167372_dash_name' );
function q167372_dash_name(  ){
    if ( $GLOBALS['pagenow'] != 'index.php' ){
        return;
    }

    $GLOBALS['title'] =  __( get_bloginfo('title') . ' Dashboard' ); 
}

add_action('wp_dashboard_setup', 'add_custom_dashboard_activity' );
function add_custom_dashboard_activity() {
    wp_add_dashboard_widget('custom_dashboard_activity', 'Activities', 'custom_wp_dashboard_site_activity');
}

// the new function based on wp_dashboard_recent_posts (in wp-admin/includes/dashboard.php)
function wp_dashboard_recent_post_types( $args ) {

/* Chenged from here */

	if ( ! $args['post_type'] ) {
		$args['post_type'] = 'any';
	}

	$query_args = array(
		'post_type'      => $args['post_type'],

/* to here */

		'post_status'    => $args['status'],
		'orderby'        => 'date',
		'order'          => $args['order'],
		'posts_per_page' => intval( $args['max'] ),
		'no_found_rows'  => true,
		'cache_results'  => false
	);
	$posts = new WP_Query( $query_args );

	if ( $posts->have_posts() ) {

		echo '<div id="' . $args['id'] . '" class="activity-block">';

		if ( $posts->post_count > $args['display'] ) {
			echo '<small class="show-more hide-if-no-js"><a href="#">' . sprintf( __( 'See %s more…'), $posts->post_count - intval( $args['display'] ) ) . '</a></small>';
		}

		echo '<h4>' . $args['title'] . '</h4>';

		echo '<ul>';

		$i = 0;
		$today    = date( 'Y-m-d', current_time( 'timestamp' ) );
		$tomorrow = date( 'Y-m-d', strtotime( '+1 day', current_time( 'timestamp' ) ) );

		while ( $posts->have_posts() ) {
			$posts->the_post();

			$time = get_the_time( 'U' );
			if ( date( 'Y-m-d', $time ) == $today ) {
				$relative = __( 'Today' );
			} elseif ( date( 'Y-m-d', $time ) == $tomorrow ) {
				$relative = __( 'Tomorrow' );
			} else {
				/* translators: date and time format for recent posts on the dashboard, see http://php.net/date */
				$relative = date_i18n( __( 'M jS' ), $time );
			}

 			$text = sprintf(
				/* translators: 1: relative date, 2: time, 4: post title */
 				__( '<span>%1$s, %2$s</span> <a href="%3$s">%4$s</a>' ),
  				$relative,
  				get_the_time(),
  				get_edit_post_link(),
  				_draft_or_post_title()
  			);

 			$hidden = $i >= $args['display'] ? ' class="hidden"' : '';
 			echo "<li{$hidden}>$text</li>";
			$i++;
		}

		echo '</ul>';
		echo '</div>';

	} else {
		return false;
	}

	wp_reset_postdata();

	return true;
}

// The replacement widget
function custom_wp_dashboard_site_activity() {

    echo '<div id="activity-widget">';

    $future_posts = wp_dashboard_recent_post_types( array(
        'post_type'  => 'any',
        'display' => 3,
        'max'     => 7,
        'status'  => 'future',
        'order'   => 'ASC',
        'title'   => __( 'Publishing Soon' ),
        'id'      => 'future-posts',
    ) );

    $recent_posts = wp_dashboard_recent_post_types( array(
        'post_type'  => 'any',
        'display' => 3,
        'max'     => 7,
        'status'  => 'publish',
        'order'   => 'DESC',
        'title'   => __( 'Recently Published' ),
        'id'      => 'published-posts',
    ) );

    $recent_comments = wp_dashboard_recent_comments( 0 );

    if ( !$future_posts && !$recent_posts && !$recent_comments ) {
        echo '<div class="no-activity">';
        echo '<p class="smiley"></p>';
        echo '<p>' . __( 'No activity yet!' ) . '</p>';
        echo '</div>';
    }

    echo '</div>';
}
