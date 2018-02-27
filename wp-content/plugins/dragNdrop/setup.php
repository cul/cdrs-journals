<?php 
/*
	Plugin Name: dragNdrop Articles
	Plugin URI: http://cdrs.columbia.edu
	Description: Drag and Drop your articles into order
	Author: Megan O'Neill
	Version: 0.1-alpha
	Author URI: http://cdrs.columbia.edu
	Domain Path: /lang
 */

add_action('admin_menu', 'add_articles_order');
wp_enqueue_style('style', plugins_url() . '/dragNdrop/css/style.css');


function add_articles_order(){
	add_submenu_page(
	    'edit.php?post_type=article',
	    'Articles Order', /*page title*/
	    'Articles Order', /*menu title*/
	    'manage_options', /*roles and capability needed*/
	    'articles_order',
	    'articles_order_setup' /*replace with your own function*/
	);	
}

add_action( 'admin_init', 'wpse30583_enqueue' );
function wpse30583_enqueue()
{
	
    wp_enqueue_script('dragNdrop', plugins_url() . '/dragNdrop/js/dragNdrop.js', array('jquery', 'jquery-ui-sortable'));
	wp_localize_script( 'dragNdrop', 'fetchArticles', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
	wp_localize_script( 'dragNdrop', 'updateMenuOrder', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'menuOrderNonce' => wp_create_nonce( 'myajax-menu-order-nonce' ) ) );

}

add_action("wp_ajax_fetch_articles", "fetch_articles");
add_action("wp_ajax_update_order", "update_order");

function articles_order_setup(){
	$issues = get_terms('issues');
	echo '<select class="articles_issues">';
	foreach ($issues as $issue) {
		echo '<option value="' . $issue->slug . '">' . $issue->name . '</option>';	
	}
	echo '</select>';
}

function fetch_articles() {
	$the_issue =  $_POST['issue_slug'];

?>
	<ul id="sortable_nav" class="sortable ui-sortable">
	<?php $the_number = 1 ?>
	<?php	$result = query_posts( "post_type=article&issues=$the_issue&orderby=menu_order&order=ASC"); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	    <li id="<?php echo the_title() ?>" class="ui-state-default" style="">
	    	<span class="ui-icon ui-icon-arrowthick-2-n-s">
    		</span><?php the_title(); ?>
    		<div class="ui-state-default sortable-number">
            	<?php echo $the_number ; $the_number++ ?>
        	</div>
        </li>
	<?php endwhile;
	else: ?><p>No Articles.</p>
	<?php endif; ?>


	</ul>
	<?php

	die();
}

function update_order(){
	// return $_POST['the_order'];
	// check nonce
	    global $wpdb;

	$nonce = $_POST['nextNonce']; 	
	if ( ! wp_verify_nonce( $nonce, 'myajax-menu-order-nonce' ) )
		die ( 'Busted!');
		
	// generate the response
	$response =  $_POST["the_order"];

	$titles = explode("--", $response);

	$num = 1;
	foreach($titles as $title){
	  $the_title = str_replace("--", "", $title);
	  $the_order = array_search($title, $titles);
	  $page = get_page_by_title(html_entity_decode($the_title), OBJECT, 'article');
	  // $thispost = get_post($page->ID);
	  // $thispost->menu_order = $the_order;
	  // $wpdb->update( $wpdb->posts, array("menu_order" => $the_order), array("ID" => $page->ID), array("%s"), array("%d") );
		echo $the_order . $title . $page->ID;
		 $my_post = array(
		      'ID'           => $page->ID,
		      'menu_order' => $num
		  );

		// Update the post into the database
		  wp_update_post( $my_post );
		  $num++;
	}
 
	// IMPORTANT: don't forget to "exit"
	die();

}








