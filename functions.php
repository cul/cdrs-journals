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

include_once(CFCT_PATH.'functions/journals_dash.php');


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
			'home' => 'Home Nav',
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
	wp_enqueue_style('fontawesome', $cfct_assets_url . 'fonts/font-awesome/css/font-awesome.css', array(), CFCT_URL_VERSION);
	wp_enqueue_style('cdrs', $cfct_assets_url . 'css/cdrs.css', array(), CFCT_URL_VERSION);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Scripts
	wp_enqueue_script('modernizr', $cfct_assets_url . 'js/modernizr-2.8.2.min.js', array(), CFCT_URL_VERSION);
	wp_enqueue_script('placeholder', $cfct_assets_url . 'js/jquery.placeholder.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('bootstrap', $cfct_assets_url . 'js/bootstrap.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('waypoints', $cfct_assets_url . 'js/waypoints/waypoints.min.js', array('jquery'), CFCT_URL_VERSION);
	wp_enqueue_script('script', $cfct_assets_url . 'js/script.js', array('jquery', 'placeholder', 'bootstrap', 'waypoints'), CFCT_URL_VERSION);

  wp_enqueue_media();
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

		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
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

add_action( 'init', 'register_cpt_masthead' );

function register_cpt_masthead() {

    $labels = array(
        'name' => _x( 'Mastheads', 'masthead' ),
        'singular_name' => _x( 'masthead', 'masthead' ),
        'all_items'           => __( 'All mastheads', 'masthead' ),
        'add_new' => _x( 'Add New', 'masthead' ),
        'add_new_item' => _x( 'Add New masthead', 'masthead' ),
        'edit_item' => _x( 'Edit masthead', 'masthead' ),
        'new_item' => _x( 'New masthead', 'masthead' ),
        'view_item' => _x( 'View masthead', 'masthead' ),
        'search_items' => _x( 'Search mastheads', 'masthead' ),
        'not_found' => _x( 'No mastheads found', 'masthead' ),
        'not_found_in_trash' => _x( 'No mastheads found in Trash', 'masthead' ),
        'parent_item_colon' => _x( 'Parent masthead:', 'masthead' ),
        'menu_name' => _x( 'mastheads', 'masthead' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,

    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category' ),
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

    register_post_type( 'masthead', $args );
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
        'show_admin_column' => true,
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
        'show_admin_column' => true,
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
    'sort'                       => true,
	);
	register_taxonomy( 'authors', array( 'article','post' ), $args );
};
add_action( 'init', 'register_taxonomy_authors' );


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
$my_meta->addSelect('cc_id',array('None' => 'None', 'CC BY' => 'CC BY', 'CC BY-SA' => 'CC BY-SA', 'CC BY-ND' => 'CC BY-ND', 'CC BY-NC' => 'CC BY-NC', 'CC BY-NC-SA' => 'CC BY-NC-SA', 'CC BY-NC-ND' => 'CC BY-NC-ND'),array('name'=> 'CC License ', 'std'=> array('selectkey2')));
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
    'advanced',         // Context
    'default'         // Priority
  );
}

function doi_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'doi_class_nonce' ); ?>

  <?php $post_doi  = get_post_custom($post->ID);
        $doi = $post_doi['doi'];
  ?>

  <p>
	 <input type="text" id="doi_add" name="doi_add" value="<?php echo $doi[0]; ?>"></br>
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

//adding custom citation box to articles
add_action( 'load-post.php', 'citation_setup' );
add_action( 'load-post-new.php', 'citation_setup' );

function citation_setup() {
  add_action( 'add_meta_boxes', 'citation_meta_boxes' );
  add_action( 'save_post', 'citation_save', 10, 2 );
}

function citation_meta_boxes() {

  add_meta_box(
    'citation_box',      // Unique ID
    esc_html__( 'Citation', 'Citation' ),    // Title
    'citation_meta_box',   // Callback function
    'article',         // Admin page (or post type)
    'advanced',         // Context
    'default'         // Priority
  );
}

function citation_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'citation_class_nonce' ); ?>

  <?php $the_cite  = get_post_custom($post->ID);
        $cite = $the_cite['citation'];
  ?>
  <p>
   <input type="text" id="citation_add" name="citation_add" value="<?php echo $cite[0]; ?>"></br>
  </p>
<?php }

function citation_save($post_id){
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
if ( ! isset( $_POST['citation_add'] ) ) {
    return;
  }

  // Sanitize user input.
  $citation_data = sanitize_text_field( $_POST['citation_add'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, 'citation', $citation_data );
}

//ensures category can be used with both post and custom post type
function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'article', 'post' ) );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

function cmb_sample_metaboxes( array $meta_boxes ) {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_cmb_';

  /**
   * Sample metabox to demonstrate each field type included
   */
  $meta_boxes['pdf_metabox'] = array(
    'id'         => 'pdf_metabox',
    'title'      => __( 'PDF Upload', 'cmb' ),
    'pages'      => array( 'post', 'article' ), // Post type
    'context'    => 'normal',
    'priority'   => 'high',
    'show_names' => true, // Show field names on the left
    // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
    'fields'     => array(
            array(
              'name'         => __( 'Upload Your PDF(s)', 'cmb' ),
              'desc'         => __( 'Upload or add multiple PDFs.', 'cmb' ),
              'id'           => $prefix . 'pdf',
              'type'         => 'file_list',
              'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
            ),
        ),
    );

    return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

  if ( ! class_exists( 'cmb_Meta_Box' ) )
    require_once 'Custom-Metaboxes-and-Fields-for-WordPress-master/init.php';

}

function search_widgets_init() {

  register_sidebar( array(
    'name' => 'Article Search',
    'id' => 'site-search',
  ) );
}
add_action( 'widgets_init', 'search_widgets_init' );

function remove_default_authors_meta(){
  remove_meta_box( 'tagsdiv-authors', 'article', 'normal' );
}
add_action('admin_menu', 'remove_default_authors_meta');

//add custom authors metabox to article page
add_action( 'load-post.php', 'authors_setup' );
add_action( 'load-post-new.php', 'authors_setup' );

function authors_setup() {
  add_action( 'add_meta_boxes', 'authors_meta_boxes' );
  add_action( 'save_post', 'authors_save', 10, 2 );
}

function authors_meta_boxes() {

  add_meta_box(
    'authors_box',      // Unique ID
    esc_html__( 'Authors', 'Authors' ),    // Title
    'authors_meta_box',   // Callback function
    'article',         // Admin page (or post type)
    'advanced',         // Context
    'default'         // Priority
  );
}

function authors_meta_box( $object, $box ) {
  global $post;
  wp_nonce_field( basename( __FILE__ ), 'authors_class_nonce' );
  ?>

  <p>
   <textarea id="authors_add" name="authors_add" value="" cols="50" rows="5">
    <?php

     $the_authors =  wp_get_object_terms($post->ID, 'authors', array('orderby' => 'term_order'));
     $authors_schools = array();
      foreach ($the_authors as $the_author) {
        $school = get_tax_meta($the_author->term_id, 'institution');
        $email = get_tax_meta($the_author->term_id, 'email');
        if(!empty($school) && !empty($email)){
          array_push($authors_schools, $the_author->name . "(" . $school . ")" . "[" . $email . "]");
        }elseif( !empty($school) && empty($email)){
          array_push($authors_schools, $the_author->name . "(" . $school . ")");
        }elseif( empty($school) && !empty($email)){
          array_push($authors_schools, $the_author->name . "[" . $email . "]");
        }
        else{
          array_push($authors_schools, $the_author->name);
        }

      }
      echo implode("; ", $authors_schools);

    ?>
  </textarea></br>
  <p>Separate authors with a semicolon. If adding an author's institution, please enter that information next to the author's name in parenthesis. When entering an author's email, please enter that information next to the author's name in brackets.</p>
   <input type="submit" value="add" id="add_authors">
  </p>
<?php }

function authors_save($post_id){
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    if ( ! isset( $_POST['authors_add'] ) ) {
        return;
      }


  $my_data = sanitize_text_field( $_POST['authors_add'] );
  $more_authors = explode(";", $my_data);
  $id_array = array();

  // sets the authors for the article, and creates the term if it doesn't exist
  foreach ($more_authors as $author) {
    if( strpos($author, ")") !== false){
      $school_name = explode("(", $author);
      $school = strtok($school_name[1], ')');
    }else{
      $school_name = explode("[", $author);
      $school = "";
    }
    $the_term = term_exists($school_name[0], 'authors');
    $their_school = get_tax_meta($author->term_id, 'institution');
    $their_email = explode("[", $author);
    $email = strtok($their_email[1], ']');

    if($school_name[0] !== ""){
      if($the_term !== 0 && $the_term !== null){
        update_tax_meta($the_term['term_id'],'institution', $school);
        update_tax_meta($the_term['term_id'], 'email', $email);
        array_push($id_array, intval($the_term['term_id']));
      }else{
        $new_term = wp_insert_term($school_name[0], 'authors');
        update_tax_meta($new_term['term_id'],'institution', $school);
        update_tax_meta($new_term['term_id'], 'email', $email);
        array_push($id_array, $new_term['term_id'] );
      }
    }
    

  }

  wp_set_object_terms( $post_id, $id_array, 'authors');


}

$config_authors = array(
   'id' => 'authors_institution',
   'title' => 'Author\'s Institution ',                      // meta box title
   'pages' => array('authors'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);

$my_meta = new Tax_Meta_Class($config_authors);
$my_meta->addText('institution' ,array('name'=> 'Institution Name'));
$my_meta->addText('email' ,array('name'=> 'Email'));
$my_meta->addImage('author_pic',array('name'=> 'Headshot '));
$my_meta->Finish();

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );

function wpse73190_gist_adjacent_post_where($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;

  $the_post = get_post( get_the_ID() );
  $patterns = array();
  $patterns[] = '/post_date/';
  $patterns[] = '/\'[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}\'/';
  $replacements = array();
  $replacements[] = 'menu_order';
  $replacements[] = $the_post->menu_order;
  return preg_replace( $patterns, $replacements, $sql );
}
add_filter( 'get_next_post_where', 'wpse73190_gist_adjacent_post_where' );
add_filter( 'get_previous_post_where', 'wpse73190_gist_adjacent_post_where' );

function wpse73190_gist_adjacent_post_sort($sql) {
  if ( !is_main_query() || !is_singular() )
    return $sql;

  $pattern = '/post_date/';
  $replacement = 'menu_order';
  return preg_replace( $pattern, $replacement, $sql );
}
add_filter( 'get_next_post_sort', 'wpse73190_gist_adjacent_post_sort' );
add_filter( 'get_previous_post_sort', 'wpse73190_gist_adjacent_post_sort' );

//add doi meta box to article page
add_action( 'load-post.php', 'ac_pdf_setup' );
add_action( 'load-post-new.php', 'ac_pdf_setup' );

function ac_pdf_setup() {
  add_action( 'add_meta_boxes', 'ac_pdf_meta_boxes' );
  add_action( 'save_post', 'ac_pdf_save', 10, 2 );
}

function ac_pdf_meta_boxes() {

  add_meta_box(
    'ac_pdf_box',      // Unique ID
    esc_html__( 'AC PDF', 'AC PDF' ),    // Title
    'ac_pdf_meta_box',   // Callback function
    'article',         // Admin page (or post type)
    'advanced',         // Context
    'default'         // Priority
  );
}

function ac_pdf_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'ac_pdf_class_nonce' ); ?>

  <?php $post_doi  = get_post_custom($post->ID);
        $doi = $post_doi['ac_pdf'];
  ?>

  <p>
   <input type="text" id="ac_pdf_add" name="ac_pdf_add" value="<?php echo $doi[0]; ?>"></br>
  </p>
<?php }

function ac_pdf_save($post_id){
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
if ( ! isset( $_POST['ac_pdf_add'] ) ) {
    return;
  }

  // Sanitize user input.
  $my_data = sanitize_text_field( $_POST['ac_pdf_add'] );

  // Update the meta field in the database.
  update_post_meta( $post_id, 'ac_pdf', $my_data );
}

add_action('manage_edit-article_columns', 'add_new_header_text_column');

add_action('manage_article_posts_custom_column','show_order_column', 10, 1);

function add_new_header_text_column($header_text_columns) {
  $header_text_columns['menu_order'] = "Order";
  return $header_text_columns;
}

function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}

function get_cc_status($name){
  $cc_deeds = array('CC BY' => array( "deed" => "http://creativecommons.org/licenses/by/4.0/", "image" => get_template_directory_uri() . "/assets/img/cc_by.png"), 'CC BY-SA' => array( "deed" => "http://creativecommons.org/licenses/by-sa/4.0/", "image" => get_template_directory_uri() . "/assets/img/by-sa.png"), 'CC BY-ND' => array("deed" => "http://creativecommons.org/licenses/by-nd/4.0/", "image" => get_template_directory_uri() . "/assets/img/by-nd.png"), 'CC BY-NC' => array("deed" => "http://creativecommons.org/licenses/by-nc/4.0/", "image" => get_template_directory_uri() . "/assets/img/by-nc.png"), 'CC BY-NC-SA' => array("deed" => "http://creativecommons.org/licenses/by-nc-sa/4.0/", "image" => get_template_directory_uri() . "/assets/img/by-nc-sa.png"), 'CC BY-NC-ND' => array("deed" => "http://creativecommons.org/licenses/by-nc-nd/4.0/", "image" => get_template_directory_uri() . "/assets/img/by-nc-nd.png"));
  if($cc_deeds[$name] != null){
    echo '<a rel="license" href="'. $cc_deeds[$name]["deed"] . '"><img class="cc_img" src="' . $cc_deeds[$name]["image"] . '"></a>';
  }
}
