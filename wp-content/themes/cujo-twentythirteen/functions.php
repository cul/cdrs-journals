<?php


define('WP_DEBUG', true);
define('WP_DEBUG', false);

if ( ! function_exists( 'custom_taxonomy' ) ) {

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Editions', 'Taxonomy General Name', 'cdrs_text' ),
		'singular_name'              => _x( 'Edition', 'Taxonomy Singular Name', 'cdrs_text' ),
		'menu_name'                  => __( 'Edition', 'cdrs_text' ),
		'all_items'                  => __( 'All Items', 'cdrs_text' ),
		'parent_item'                => __( 'Parent Item', 'cdrs_text' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cdrs_text' ),
		'new_item_name'              => __( 'New Item Name', 'cdrs_text' ),
		'add_new_item'               => __( 'Add New Item', 'cdrs_text' ),
		'edit_item'                  => __( 'Edit Item', 'cdrs_text' ),
		'update_item'                => __( 'Update Item', 'cdrs_text' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cdrs_text' ),
		'search_items'               => __( 'Search Items', 'cdrs_text' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cdrs_text' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'cdrs_text' ),
		'not_found'                  => __( 'Not Found', 'cdrs_text' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'edition', array( 'articles' ), $args );
	
	
	
		$labelz = array(
		'name'                       => _x( 'Rubrics', 'Taxonomy General Name', 'cdrs_text' ),
		'singular_name'              => _x( 'Rubric', 'Taxonomy Singular Name', 'cdrs_text' ),
		'menu_name'                  => __( 'Rubric', 'cdrs_text' ),
		'all_items'                  => __( 'All Items', 'cdrs_text' ),
		'parent_item'                => __( 'Parent Item', 'cdrs_text' ),
		'parent_item_colon'          => __( 'Parent Item:', 'cdrs_text' ),
		'new_item_name'              => __( 'New Item Name', 'cdrs_text' ),
		'add_new_item'               => __( 'Add New Item', 'cdrs_text' ),
		'edit_item'                  => __( 'Edit Item', 'cdrs_text' ),
		'update_item'                => __( 'Update Item', 'cdrs_text' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'cdrs_text' ),
		'search_items'               => __( 'Search Items', 'cdrs_text' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'cdrs_text' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'cdrs_text' ),
		'not_found'                  => __( 'Not Found', 'cdrs_text' ),
	);
	$argz = array(
		'labels'                     => $labelz,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'rubric', array( 'articles' ), $argz );
	
	
	
	
	
	
	
	

}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );

}


// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Articles', 'Post Type General Name', 'cdrs_text' ),
		'singular_name'       => _x( 'Article', 'Post Type Singular Name', 'cdrs_text' ),
		'menu_name'           => __( 'Articles', 'cdrs_text' ),
		'parent_item_colon'   => __( 'Parent Item:', 'cdrs_text' ),
		'all_items'           => __( 'All Items', 'cdrs_text' ),
		'view_item'           => __( 'View Item', 'cdrs_text' ),
		'add_new_item'        => __( 'Add New Item', 'cdrs_text' ),
		'add_new'             => __( 'Add New', 'cdrs_text' ),
		'edit_item'           => __( 'Edit Item', 'cdrs_text' ),
		'update_item'         => __( 'Update Item', 'cdrs_text' ),
		'search_items'        => __( 'Search Item', 'cdrs_text' ),
		'not_found'           => __( 'Not found', 'cdrs_text' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'cdrs_text' ),
	);
	$args = array(
		'label'               => __( 'article', 'cdrs_text' ),
		'description'         => __( 'Articles, Essays, Papers, and other Content published in an official edition of the journal.', 'cdrs_text' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'          => array( 'edition', ' category', ' tags' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'articles', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );







function add_tags_categories() {
register_taxonomy_for_object_type('category', 'articles');
register_taxonomy_for_object_type('post_tag', 'articles');
}
add_action('init', 'add_tags_categories');





?>
