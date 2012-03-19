<?php

// This file is part of the Carrington Blog Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
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


/* add support for native wordpress menu */


function mytheme_addmenus() {

	register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

}

add_action( 'init', 'mytheme_addmenus' );

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' ); 
	}

/* begin adding custom post types and taxonomies */

add_action( 'init', 'register_cpt_essay' );

function register_cpt_essay() {

    $labels = array( 
        'name' => _x( 'Essays', 'essay' ),
        'singular_name' => _x( 'Essay', 'essay' ),
        'add_new' => _x( 'Add New', 'essay' ),
        'add_new_item' => _x( 'Add New Essay', 'essay' ),
        'edit_item' => _x( 'Edit Essay', 'essay' ),
        'new_item' => _x( 'New Essay', 'essay' ),
        'view_item' => _x( 'View Essay', 'essay' ),
        'search_items' => _x( 'Search Essays', 'essay' ),
        'not_found' => _x( 'No essays found', 'essay' ),
        'not_found_in_trash' => _x( 'No essays found in Trash', 'essay' ),
        'parent_item_colon' => _x( 'Parent Essay:', 'essay' ),
        'menu_name' => _x( 'Essays', 'essay' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'post-formats' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'Editions' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'essay', $args );
}


add_action( 'init', 'register_taxonomy_edition' );

function register_taxonomy_edition() {

    $labels = array( 
        'name' => _x( 'Editions', 'edition' ),
        'singular_name' => _x( 'Edition', 'edition' ),
        'search_items' => _x( 'Search Editions', 'edition' ),
        'popular_items' => _x( 'Popular Editions', 'edition' ),
        'all_items' => _x( 'All Editions', 'edition' ),
        'parent_item' => _x( 'Parent Edition', 'edition' ),
        'parent_item_colon' => _x( 'Parent Edition:', 'edition' ),
        'edit_item' => _x( 'Edit Edition', 'edition' ),
        'update_item' => _x( 'Update Edition', 'edition' ),
        'add_new_item' => _x( 'Add New Edition', 'edition' ),
        'new_item_name' => _x( 'New Edition Name', 'edition' ),
        'separate_items_with_commas' => _x( 'Separate editions with commas', 'edition' ),
        'add_or_remove_items' => _x( 'Add or remove editions', 'edition' ),
        'choose_from_most_used' => _x( 'Choose from the most used editions', 'edition' ),
        'menu_name' => _x( 'Editions', 'edition' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'edition', array('essay'), $args );

 $labels = array( 
        'name' => _x( 'Authors', 'author' ),
        'singular_name' => _x( 'Author', 'author' ),
        'search_items' => _x( 'Search Authors', 'author' ),
        'popular_items' => _x( 'Popular Authors', 'author' ),
        'all_items' => _x( 'All Authors', 'author' ),
        'parent_item' => _x( 'Parent Author', 'author' ),
        'parent_item_colon' => _x( 'Parent Author:', 'author' ),
        'edit_item' => _x( 'Edit Author', 'author' ),
        'update_item' => _x( 'Update Author', 'author' ),
        'add_new_item' => _x( 'Add New Author', 'author' ),
        'new_item_name' => _x( 'New Author Name', 'author' ),
        'separate_items_with_commas' => _x( 'Separate authors with commas', 'author' ),
        'add_or_remove_items' => _x( 'Add or remove authors', 'author' ),
        'choose_from_most_used' => _x( 'Choose from the most used authors', 'author' ),
        'menu_name' => _x( 'Authors', 'author' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'author', array('essay'), $args );
    
    
     $labels = array( 
        'name' => _x( 'Progressions', 'progression' ),
        'singular_name' => _x( 'Progression', 'progression' ),
        'search_items' => _x( 'Search Progressions', 'progression' ),
        'popular_items' => _x( 'Popular Progressions', 'progression' ),
        'all_items' => _x( 'All Progressions', 'progression' ),
        'parent_item' => _x( 'Parent Progression', 'progression' ),
        'parent_item_colon' => _x( 'Parent Progression:', 'progression' ),
        'edit_item' => _x( 'Edit Progression', 'progression' ),
        'update_item' => _x( 'Update Progression', 'progression' ),
        'add_new_item' => _x( 'Add New Progression', 'progression' ),
        'new_item_name' => _x( 'New Progression Name', 'progression' ),
        'separate_items_with_commas' => _x( 'Separate progressions with commas', 'progression' ),
        'add_or_remove_items' => _x( 'Add or remove progressions', 'progression' ),
        'choose_from_most_used' => _x( 'Choose from the most used progressions', 'progression' ),
        'menu_name' => _x( 'Progressions', 'progression' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'progression', array('essay'), $args );

  $labels = array( 
        'name' => _x( 'Sources', 'source' ),
        'singular_name' => _x( 'Source', 'source' ),
        'search_items' => _x( 'Search Sources', 'source' ),
        'popular_items' => _x( 'Popular Sources', 'source' ),
        'all_items' => _x( 'All Sources', 'source' ),
        'parent_item' => _x( 'Parent Source', 'source' ),
        'parent_item_colon' => _x( 'Parent Source:', 'source' ),
        'edit_item' => _x( 'Edit Source', 'source' ),
        'update_item' => _x( 'Update Source', 'source' ),
        'add_new_item' => _x( 'Add New Source', 'source' ),
        'new_item_name' => _x( 'New Source Name', 'source' ),
        'separate_items_with_commas' => _x( 'Separate sources with commas', 'source' ),
        'add_or_remove_items' => _x( 'Add or remove sources', 'source' ),
        'choose_from_most_used' => _x( 'Choose from the most used sources', 'source' ),
        'menu_name' => _x( 'Sources', 'source' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'source', array('essay'), $args );


 $labels = array( 
        'name' => _x( 'Topics', 'topic' ),
        'singular_name' => _x( 'Topic', 'topic' ),
        'search_items' => _x( 'Search Topics', 'topic' ),
        'popular_items' => _x( 'Popular Topics', 'topic' ),
        'all_items' => _x( 'All Topics', 'topic' ),
        'parent_item' => _x( 'Parent Topic', 'topic' ),
        'parent_item_colon' => _x( 'Parent Topic:', 'topic' ),
        'edit_item' => _x( 'Edit Topic', 'topic' ),
        'update_item' => _x( 'Update Topic', 'topic' ),
        'add_new_item' => _x( 'Add New Topic', 'topic' ),
        'new_item_name' => _x( 'New Topic Name', 'topic' ),
        'separate_items_with_commas' => _x( 'Separate topics with commas', 'topic' ),
        'add_or_remove_items' => _x( 'Add or remove topics', 'topic' ),
        'choose_from_most_used' => _x( 'Choose from the most used topics', 'topic' ),
        'menu_name' => _x( 'Topics', 'topic' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'topic', array('essay'), $args );


 $labels = array( 
        'name' => _x( 'Strategies', 'strategy' ),
        'singular_name' => _x( 'Strategy', 'strategy' ),
        'search_items' => _x( 'Search Strategies', 'strategy' ),
        'popular_items' => _x( 'Popular Strategies', 'strategy' ),
        'all_items' => _x( 'All Strategies', 'strategy' ),
        'parent_item' => _x( 'Parent Strategy', 'strategy' ),
        'parent_item_colon' => _x( 'Parent Strategy:', 'strategy' ),
        'edit_item' => _x( 'Edit Strategy', 'strategy' ),
        'update_item' => _x( 'Update Strategy', 'strategy' ),
        'add_new_item' => _x( 'Add New Strategy', 'strategy' ),
        'new_item_name' => _x( 'New Strategy Name', 'strategy' ),
        'separate_items_with_commas' => _x( 'Separate strategys with commas', 'strategy' ),
        'add_or_remove_items' => _x( 'Add or remove strategys', 'strategy' ),
        'choose_from_most_used' => _x( 'Choose from the most used strategys', 'strategy' ),
        'menu_name' => _x( 'Strategies', 'strategy' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'strategy', array('essay'), $args );
    
    
    
    $labels = array( 
        'name' => _x( 'Assignments', 'assignment' ),
        'singular_name' => _x( 'Assignment', 'assignment' ),
        'search_items' => _x( 'Search Assignments', 'assignment' ),
        'popular_items' => _x( 'Popular Assignments', 'assignment' ),
        'all_items' => _x( 'All Assignments', 'assignment' ),
        'parent_item' => _x( 'Parent Assignment', 'assignment' ),
        'parent_item_colon' => _x( 'Parent Assignment:', 'assignment' ),
        'edit_item' => _x( 'Edit Assignment', 'assignment' ),
        'update_item' => _x( 'Update Assignment', 'assignment' ),
        'add_new_item' => _x( 'Add New Assignment', 'assignment' ),
        'new_item_name' => _x( 'New Assignment Name', 'assignment' ),
        'separate_items_with_commas' => _x( 'Separate assignments with commas', 'assignment' ),
        'add_or_remove_items' => _x( 'Add or remove assignments', 'assignment' ),
        'choose_from_most_used' => _x( 'Choose from the most used assignments', 'assignment' ),
        'menu_name' => _x( 'Assignments', 'assignment' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => false,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( 'assignment', array('essay'), $args );


}

include_once CFCT_PATH.'wpalchemy/metaboxes/setup.php';

$custom_works_cited = new WPAlchemy_MetaBox(array
(
	'id' => '_works_cited',
	'title' => 'Work Citation',
	'template' =>  CFCT_PATH.'wpalchemy/metaboxes/simple-meta.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE 
)); 

$custom_taxonomy_edition = new WPAlchemy_MetaBox(array
(
	'id' => '_edition',
	'title' => 'Editions',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-edition.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_author = new WPAlchemy_MetaBox(array
(
	'id' => '_author',
	'title' => 'Authors',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-author.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_progression = new WPAlchemy_MetaBox(array
(
	'id' => '_progression',
	'title' => 'Progressions',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-progression.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_source = new WPAlchemy_MetaBox(array
(
	'id' => '_source',
	'title' => 'Sources',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-source.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_topic = new WPAlchemy_MetaBox(array
(
	'id' => '_topic',
	'title' => 'Topics',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-topic.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_strategy = new WPAlchemy_MetaBox(array
(
	'id' => '_strategy',
	'title' => 'Strategies',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-strategy.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

$custom_taxonomy_assignment = new WPAlchemy_MetaBox(array
(
	'id' => '_assignment',
	'title' => 'Assignments',
	'template' => CFCT_PATH.'wpalchemy/metaboxes/taxonomy-assignment.php',
	'types' => array('essay', 'Essay'),
	'autosave' => TRUE
));

//recreate the default filters on the_content
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );

//use my override wpautop
if(function_exists('override_wpautop')){
	add_filter( 'meta_content', 'override_wpautop' );
	} else {
	add_filter( 'meta_content', 'wpautop' );
}
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );






//include the main class file

 
/*
* configure taxonomy custom fields
*/
$config = array(
   'id' => 'demo_meta_box',                         // meta box id, unique per meta box
   'title' => 'Demo Meta Box',                      // meta box title
   'pages' => array('author'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => true,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => true                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);
 
/*
* Initiate your taxonomy custom fields
*/
 
$my_meta = new Tax_Meta_Class($config);
 
/*
* Add fields
*/
 
 
//Image field
$my_meta->addImage('author_image',array('name'=> 'Author Image '));
 
//wysiwyg field
$my_meta->addWysiwyg('author_bio',array('name'=> 'Author Bio '));
//taxonomy field
 
 
 
/*
* Don't Forget to Close up the meta box deceleration
*/
//Finish Taxonomy Extra fields Deceleration
$my_meta->Finish();

/* Remove "Categories" and "Tags" Taxonomy */
function unregister_taxonomy(){
    register_taxonomy('post_tag', array());
    register_taxonomy('category', array());
}
add_action('init', 'unregister_taxonomy');


?>