<?php

define('CFCT_PATH', trailingslashit(TEMPLATEPATH));


add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}


add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items.get_search_form();

    return $items;
}


function google_fonts() {
	$query_args = array(
		'family' => 'Roboto:400,500,700,400italic,500italic,700italic|Archivo+Narrow:400,700,400italic,700italic',
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }

add_action('wp_enqueue_scripts', 'google_fonts');


function the_category_filter($thelist,$separator=' ') {
	if(!defined('WP_ADMIN')) {
		//list the category names to exclude
		$exclude = array('Blog','Reviews','Events','Topics', 'FeaturedReview' , 'FeaturedEvent');
		$cats = explode($separator,$thelist);
		$newlist = "";
		foreach($cats as $cat) {
			$catname = trim(strip_tags($cat));
			if(!in_array($catname,$exclude))
				$newlist .= $cat.$separator;
		}
		$newlist = rtrim($newlist,$separator);
		return $newlist;
	} else
		return $thelist;
}
add_filter('the_category','the_category_filter',10,2);




add_action( 'wp_enqueue_scripts', 'add_toggle_script' );
function add_toggle_script() {
    wp_enqueue_script(
        'toggle-script', // name your script so that you can attach other scripts and de-register, etc.
        get_stylesheet_directory_uri() . '/js/togglescript.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}



require_once('Tax-meta-class/Tax-meta-class.php');

include_once('functions/st-functions.php');


add_action( 'after_setup_theme', 'st_theme_setup' );
function st_theme_setup() {
	add_image_size('feed-image', 390, 250, true);
	add_image_size('single-image', 576, 369, true);
	add_image_size('journal-feat', 200, 999, false);
	register_nav_menu( 'footer_one', __( 'Footer Menu One', 'twentysixteen-child' ) );
}

function get_content_format($content){
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}


function exclude_category( $query ) {
    if ( ($query->is_home() || $query->is_archive()) && $query->is_main_query() ) {
        $query->set( 'cat', '-51' );
    }
}
add_action( 'pre_get_posts', 'exclude_category' );


function validate_gravatar($email) {
	// Craft a potential url and test its headers
	$hash = md5(strtolower(trim($email)));
	$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
	$headers = @get_headers($uri);
	if (!preg_match("|200|", $headers[0])) {
		$has_valid_avatar = FALSE;
	} else {
		$has_valid_avatar = TRUE;
	}
	return $has_valid_avatar;
}


// Add widgetized areas
function socialtext2016_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Homepage Sidebar', 'twentysixteen-child' ),
		'id' => 'homepage-sidebar',
		'description' => __( 'Sidebar displayed on the homepage.', 'twentysixteen-child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Periscope Contents Sidebar', 'twentysixteen-child' ),
		'id' => 'periscope-contents-sidebar',
		'description' => __( 'Sidebar displayed within a Periscope topic.', 'twentysixteen-child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Masthead', 'twentysixteen-child' ),
		'id' => 'about-sidebar',
		'description' => __( 'Masthead displayed on the Home and About pages.', 'twentysixteen-child' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'init', 'socialtext2016_widgets_init' );




function socialtext_color_options_sections( $wp_customize ) {
     /**
     * Add Panel
     */
     $wp_customize->add_panel( 'stx_colors_panel', array(
      'priority'    => 10,
      'title'       => __( 'SocialText Colors Panel', 'twentysixteen-child' ),
      'description' => __( 'Color options for Social Text theme', 'twentysixteen-child' ),
     ) );


	 /**
     * Add a Section for Colors
     */
     $wp_customize->add_section( 'stx_colors', array(
      'title'       => __( 'Header Colors', 'twentysixteen-child' ),
      'priority'    => 10,
      'panel'       => 'stx_colors_panel',
      'description' => __( 'Header background and logo colors', 'twentysixteen-child' ),
     ) );


     //More code to come
    }
    add_action( 'customize_register', 'socialtext_color_options_sections' );


function socialtext_color_fields( $fields ) {
      /**
    * Add a Field to change the header background color
    */
    $fields[] = array(
      'type'        => 'color',
      'settings'     => 'stx_header_color',
      'label'       => __( 'Header Background Color', 'twentysixteen-child' ),
      'description' => __( 'Background color for the site header', 'twentysixteen-child' ),
      'section'     => 'stx_colors',
      'priority'    => 10,
      'default'     => '#c9c585',
      'output'      => array(
        array(
          'element'  => '#header-container',
          'property' => 'background-color'
		  )
        ),
    );
     /**
    * Add a Field to change the logo and menu item color
    */
    $fields[] = array(
      'type'        => 'color',
      'settings'     => 'stx_logo_color',
      'label'       => __( 'Logo Color', 'twentysixteen-child' ),
      'description' => __( 'Color for the site logo and main menu text', 'twentysixteen-child' ),
      'section'     => 'stx_colors',
      'priority'    => 10,
      'default'     => '#00404f',
      'output'      => array(
        array(
          'element'  => '.logosvg',
          'property' => 'fill'
		  ),
        array(
          'element'  => '.main-navigation a',
          'property' => 'color'
		  ),
        array(
          'element'  => '.site-strapline',
          'property' => 'color'
		  ),
        ),
    );
     /**
    * Add a Field to change the menu item hover color
    */
    $fields[] = array(
      'type'        => 'color',
      'settings'     => 'stx_menu_hover',
      'label'       => __( 'Menu Hover Color', 'twentysixteen-child' ),
      'description' => __( 'Color for main menu text on hover', 'twentysixteen-child' ),
      'section'     => 'stx_colors',
      'priority'    => 10,
      'default'     => '#686868',
      'output'      => array(
        array(
          'element'  => '.main-navigation li:hover > a',
          'property' => 'color'
		  ),
        array(
          'element'  => '.main-navigation button.search-submit:hover',
          'property' => 'background-color'
		  ),
        ),
    );

      return $fields;
    }
    add_filter( 'kirki/fields', 'socialtext_color_fields' );


if ( ! function_exists('custom_editorsblog') ) {

// Register Custom Post Type
function custom_editorsblog() {

	$labels = array(
		'name'                  => _x( 'Editors Blog', 'Post Type General Name', 'twentysixteen' ),
		'singular_name'         => _x( 'Editors Blog', 'Post Type Singular Name', 'twentysixteen' ),
		'menu_name'             => __( 'Editors Blog', 'twentysixteen' ),
		'name_admin_bar'        => __( 'Editors Blog', 'twentysixteen' ),
		'archives'              => __( 'Blog Archives', 'twentysixteen' ),
		'parent_item_colon'     => __( 'Parent Blog:', 'twentysixteen' ),
		'all_items'             => __( 'All Blog Entries', 'twentysixteen' ),
		'add_new_item'          => __( 'Add New Blog Entry', 'twentysixteen' ),
		'add_new'               => __( 'Add New Entry', 'twentysixteen' ),
		'new_item'              => __( 'New Blog Entry', 'twentysixteen' ),
		'edit_item'             => __( 'Edit Blog Entry', 'twentysixteen' ),
		'update_item'           => __( 'Update Blog Entry', 'twentysixteen' ),
		'view_item'             => __( 'View Blog Entry', 'twentysixteen' ),
		'search_items'          => __( 'Search Blog Entries', 'twentysixteen' ),
		'not_found'             => __( 'Not found', 'twentysixteen' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'twentysixteen' ),
		'featured_image'        => __( 'Featured Image', 'twentysixteen' ),
		'set_featured_image'    => __( 'Set featured image', 'twentysixteen' ),
		'remove_featured_image' => __( 'Remove featured image', 'twentysixteen' ),
		'use_featured_image'    => __( 'Use as featured image', 'twentysixteen' ),
		'insert_into_item'      => __( 'Insert into entry', 'twentysixteen' ),
		'uploaded_to_this_item' => __( 'Uploaded to this entry', 'twentysixteen' ),
		'items_list'            => __( 'Blog entries list', 'twentysixteen' ),
		'items_list_navigation' => __( 'Blog entries navigation', 'twentysixteen' ),
		'filter_items_list'     => __( 'Filter Blog entries list', 'twentysixteen' ),
	);
	$args = array(
		'label'                 => __( 'Editors Blog', 'twentysixteen' ),
		'description'           => __( 'Editor\'s Blog Entries', 'twentysixteen' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'editorsblog', $args );

}
add_action( 'init', 'custom_editorsblog', 0 );

}


/**
 * Filter the except length to 20 characters.
 *
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );





?>
