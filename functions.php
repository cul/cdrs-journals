<?php

// This file is part of the Carrington Blueprint Theme for WordPress
//
// Copyright (c) 2008-2014 Crowd Favorite, Ltd. All rights reserved.
// http://crowdfavorite.com
//
// Released under the GPL license
// http://www.opensource.org/licenses/gpl-license.php
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die(); }

define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

/**
 * Set this to "true" to turn on debugging mode.
 * Helps with development by showing the paths of the files loaded by Carrington.
 */
define('CFCT_DEBUG', false);

/**
 * Theme version.
 */
define('CFCT_THEME_VERSION', '1.3.2');

/**
 * Theme URL version.
 * Added to query var at the end of assets to force browser cache to reload after upgrade.
 */
if (!(defined('CFCT_URL_VERSION'))) {
	define('CFCT_URL_VERSION', '0.4.1');
}

/**
 * Includes
 */
include_once(CFCT_PATH.'carrington-core/carrington.php');

include_once(CFCT_PATH.'functions/wp_bootstrap_navwalker.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (! isset($content_width)) {
	$content_width = 600;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as
 * indicating support post thumbnails.
 */
if (! function_exists('cfct_theme_setup')) {
	function cfct_theme_setup() {
		/**
		 * Make theme available for translation
		 * Use find and replace to change 'carrington-blueprint' to the name of your theme.
		 */
		load_theme_textdomain('carrington-blueprint');

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support('automatic-feed-links');

		/**
		 * Enable post thumbnails support.
		 */
		add_theme_support('post-thumbnails');

		/**
		 * New image sizes that are not overwrote in the admin.
		 */
		// add_image_size('thumb-img', 160, 120, true);
		// add_image_size('medium-img', 510, 510, false);
		// add_image_size('large-img', 710, 700, false);

		/**
		 * Add navigation menus
		 */
		register_nav_menus(array(
			'primary' => 'Main Navigation',
			'footer' => 'Footer Navigation'
		));

		/**
		 * Add post formats
		 */
		// add_theme_support( 'post-formats', array('image', 'link', 'gallery', 'quote', 'status', 'video'));
	}
}
add_action('after_setup_theme', 'cfct_theme_setup');


/**
 * Register widgetized area and update sidebar with default widgets.
 */
function cfct_widgets_init() {
	// Sidebar Defaults
	$sidebar_defaults = array(
		'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>'
	);
	// Copy the following code and replace values to create more widget areas
	register_sidebar(array_merge($sidebar_defaults, array(
		'id' => 'sidebar-default',
		'name' => __('Default Sidebar', 'carrington-blueprint'),
	)));
}
add_action( 'widgets_init', 'cfct_widgets_init' );

/**
 * Enqueue's scripts and styles
 */
function cfct_load_assets() {
	//Variable for assets url
	$cfct_assets_url = get_template_directory_uri() . '/assets/';

	// Styles
	wp_enqueue_style('styles', $cfct_assets_url . 'css/bootstrap.min.css', array(), CFCT_URL_VERSION);
	wp_enqueue_style('styles', $cfct_assets_url . 'css/cdrs.css', array(), CFCT_URL_VERSION);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Scripts
	wp_enqueue_script('modernizr', $cfct_assets_url . 'js/modernizr-2.8.2.min.js', array(), CFCT_URL_VERSION);
	wp_enqueue_script('placeholder', $cfct_assets_url . 'js/jquery.placeholder.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('bootstrap', $cfct_assets_url . 'js/bootstrap.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('script', $cfct_assets_url . 'js/script.js', array('jquery', 'placeholder', 'bootstrap'), CFCT_URL_VERSION);
}
add_action('wp_enqueue_scripts', 'cfct_load_assets');

add_action( 'init', 'register_cpt_article' );

function register_cpt_article() {

    $labels = array( 
        'name' => _x( 'articles', 'article' ),
        'singular_name' => _x( 'article', 'article' ),
        'all_items'           => __( 'All Articles', 'article' ),
        'add_new' => _x( 'Add New', 'article' ),
        'add_new_item' => _x( 'Add New article', 'article' ),
        'edit_item' => _x( 'Edit article', 'article' ),
        'new_item' => _x( 'New article', 'article' ),
        'view_item' => _x( 'View article', 'article' ),
        'search_items' => _x( 'Search articles', 'article' ),
        'not_found' => _x( 'No articles found', 'article' ),
        'not_found_in_trash' => _x( 'No articles found in Trash', 'article' ),
        'parent_item_colon' => _x( 'Parent article:', 'article' ),
        'menu_name' => _x( 'Articles', 'article' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'issues', 'sections', 'aauthor' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'public'              => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'page'
    );

    register_post_type( 'article', $args );
};


function register_taxonomy_issues() {

    $labels = array( 
        'name' => _x( 'issues', 'issues' ),
        'singular_name' => _x( 'issue', 'issues' ),
        'search_items' => _x( 'Search issues', 'issues' ),
        'popular_items' => _x( 'Popular issues', 'issues' ),
        'all_items' => _x( 'All issues', 'issues' ),
        'parent_item' => _x( 'Parent issue', 'issues' ),
        'parent_item_colon' => _x( 'Parent issue:', 'issues' ),
        'edit_item' => _x( 'Edit issue', 'issues' ),
        'update_item' => _x( 'Update issue', 'issues' ),
        'add_new_item' => _x( 'Add New issue', 'issues' ),
        'new_item_name' => _x( 'New issue', 'issues' ),
        'separate_items_with_commas' => _x( 'Separate issues with commas', 'issues' ),
        'add_or_remove_items' => _x( 'Add or remove issues', 'issues' ),
        'choose_from_most_used' => _x( 'Choose from most used issues', 'issues' ),
        'menu_name' => _x( 'Issues', 'issues' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'issues', array('article'), $args );
};

add_action( 'init', 'register_taxonomy_issues' );


function register_taxonomy_sections() {

    $labels = array( 
        'name' => _x( 'sections', 'sections' ),
        'singular_name' => _x( 'section', 'sections' ),
        'search_items' => _x( 'Search sections', 'sections' ),
        'popular_items' => _x( 'Popular sections', 'sections' ),
        'all_items' => _x( 'All sections', 'sections' ),
        'parent_item' => _x( 'Parent section', 'sections' ),
        'parent_item_colon' => _x( 'Parent section:', 'sections' ),
        'edit_item' => _x( 'Edit section', 'sections' ),
        'update_item' => _x( 'Update section', 'sections' ),
        'add_new_item' => _x( 'Add New section', 'sections' ),
        'new_item_name' => _x( 'New section', 'sections' ),
        'separate_items_with_commas' => _x( 'Separate sections with commas', 'sections' ),
        'add_or_remove_items' => _x( 'Add or remove sections', 'sections' ),
        'choose_from_most_used' => _x( 'Choose from most used sections', 'sections' ),
        'menu_name' => _x( 'Sections', 'sections' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'sections', array('article'), $args );
};

add_action( 'init', 'register_taxonomy_sections' );

function register_taxonomy_authors() {
$labels = array(
		'name'                       => _x( 'Authors', 'Content Authors', 'cdrs_text' ),
		'singular_name'              => _x( 'Author', 'Content Author', 'cdrs_text' ),
		'menu_name'                  => __( 'Authors', 'cdrs_text' ),
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
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'authors', array( 'article','post' ), $args );
};
add_action( 'init', 'register_taxonomy_authors' );


//allowing custom logo upload for use in the header
$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

//allowing custom background image/COLOR

add_theme_support( 'custom-background' );

//change excerpt box name to 'abstract' for articles

function custom_article_type_boxes(){
    remove_meta_box( 'postexcerpt', 'article', 'normal' );
    add_meta_box( 'postexcerpt', __( 'Abstract' ), 'post_excerpt_meta_box', 'article', 'normal', 'high' );
}
add_action('do_meta_boxes', 'custom_article_type_boxes');

//allow for custom login page

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/login/login-styles.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//adding term meta to an issue
  require_once('Tax-Meta-Class/Tax-meta-class/Tax-meta-class.php');

$config_issues = array(
   'id' => 'issues_print_date',
   'title' => 'Print Date ',                      // meta box title
   'pages' => array('issues'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$my_meta = new Tax_Meta_Class($config_issues);
$my_meta->addText('print_date' ,array('name'=> 'Print Date (YYYY/MM/DD)'));
$my_meta->Finish();

//add doi meta box to article page
add_action( 'load-post.php', 'doi_setup' );
add_action( 'load-post-new.php', 'doi_setup' );

function doi_setup() {
  add_action( 'add_meta_boxes', 'doi_meta_boxes' );
  add_action( 'save_post', 'doi_save', 10, 2 );
}

function doi_meta_boxes() {

  add_meta_box(
    'doi_box',      // Unique ID
    esc_html__( 'DOI', 'DOI' ),    // Title
    'doi_meta_box',   // Callback function
    'article',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}

function doi_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'doi_class_nonce' ); ?>

  <p>
	 <input type="text" id="doi_add" name="doi_add" value=""></br>
  </p>
<?php }

function doi_save($post_id){
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
if ( ! isset( $_POST['doi_add'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['doi_add'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'doi', $my_data );
}

//add first/last name to authors page
$config_auths = array(
   'id' => 'auths_name',
   'title' => 'Print Date ',                      // meta box title
   'pages' => array('authors'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$new_meta = new Tax_Meta_Class($config_auths);
$new_meta->addText('first_name' ,array('name'=> 'First Name'));
$new_meta->addText('last_name' ,array('name'=> 'Last Name'));
$new_meta->Finish();

//add first/last name boxes to articles page
add_action( 'load-post.php', 'auths_setup' );
add_action( 'load-post-new.php', 'auths_setup' );

function auths_setup() {
  add_action( 'add_meta_boxes', 'auths_meta_boxes' );
  add_action( 'save_post', 'auths_save', 10, 2 );
}

function auths_meta_boxes() {

  add_meta_box(
    'auths_class',      // Unique ID
    esc_html__( 'Add Author', 'Add Author' ),    // Title
    'auths_meta_box',   // Callback function
    'article',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}

/* Display the post meta box. */
function auths_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'auths_class_nonce' ); ?>

  <p>
    <label for="auths_class">Add Author</label></br>
    <br />
	First Name: <input type="text" id='auths_first' name="auths_first" value=""></br>
	Last Name: <input type="text" id='auths_last' name="auths_last" value=""></br>
	<div id="add_new_auths">
	<input type="button" id="new_auths" class="button" value="Add">
  	</div>
  </p>
<?php }

//saving a new user as author
function auths_save(){
	$args = array(
	"fist_name" => $_POST['first_name'],
	"last_name" => $_POST['last_name'],
	);
	wp_insert_term($_POST['first_name'], 'authors');
	

}

wp_enqueue_script( 'function', get_template_directory_uri().'/assets/js/journals.js', 'jquery', true);
wp_localize_script( 'function', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

add_action("wp_ajax_auths_save", "auths_save");


