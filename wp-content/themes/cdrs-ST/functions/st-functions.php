<?php

//include the main class file

if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = 'st_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'issue_meta_box',          // meta box id, unique per meta box
    'title' => 'Issues Meta',          // meta box title
    'pages' => array('issues', 'periscope_topic'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => true,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => true          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $my_meta =  new Tax_Meta_Class($config);
 
  $my_meta->addText($prefix.'item_number',array('name'=> __('Issue/Topic Number','socialtext')));
  
  $my_meta->addText($prefix.'item_title',array('name'=> __('Issue/Topic Title','socialtext')));
  
  $my_meta->addText($prefix.'item_date',array('name'=> __('Issue/Topic Date','socialtext')));
  
  //Image field
  $my_meta->addImage($prefix.'item_feature_image',array('name'=> 'Cover Image '));
  
 
  $my_meta->addCheckbox($prefix.'item_show_description',array('name'=> 'Show Description on Archive Page')); 
  
  $my_meta->addText($prefix.'item_show_description_sequence',array('name'=> 'Show Description in sequence')); 

  $my_meta->addWysiwyg($prefix.'item_description',array('name'=> __('Issue/Topic Intro Text','socialtext')));
  //taxonomy field
 
  //Finish Meta Box Decleration
  $my_meta->Finish();
}



// the function below will be used to remove redundant category description and title fields as we customize the interface with custom metaboxes. 
// it is currently not being called as we finalize custom fields.

//add_action( 'admin_footer-edit-tags.php', 'remove_cat_tag_description' );


function remove_cat_tag_description(){
    global $current_screen;
    
    echo $current_screen->id;
    switch ( $current_screen->id ) 
    {
        case 'edit-issue':
            // WE ARE AT /wp-admin/edit-tags.php?taxonomy=category
            // OR AT /wp-admin/edit-tags.php?action=edit&taxonomy=category&tag_ID=1&post_type=post
            break;
        case 'edit-post_tag':
            // WE ARE AT /wp-admin/edit-tags.php?taxonomy=post_tag
            // OR AT /wp-admin/edit-tags.php?action=edit&taxonomy=post_tag&tag_ID=3&post_type=post
            break;
    }
    ?>
    <script type="text/javascript">
    jQuery(document).ready( function($) {
        $('#tag-description , #description').remove();
    });
    </script>
    <?php
}

// Register Custom Post Type
function periscope_cpt() {

	$labels = array(
		'name'                => _x( 'Periscope Articles', 'Post Type General Name', 'socialtext' ),
		'singular_name'       => _x( 'Periscope Article', 'Post Type Singular Name', 'socialtext' ),
		'menu_name'           => __( 'Periscope Content', 'socialtext' ),
		'parent_item_colon'   => __( 'Article Parent:', 'socialtext' ),
		'all_items'           => __( 'All Periscope Content', 'socialtext' ),
		'view_item'           => __( 'View Periscope Article', 'socialtext' ),
		'add_new_item'        => __( 'Add New Periscope Article', 'socialtext' ),
		'add_new'             => __( 'New Periscope Article', 'socialtext' ),
		'edit_item'           => __( 'Edit Periscope Article', 'socialtext' ),
		'update_item'         => __( 'Update Periscope Article', 'socialtext' ),
		'search_items'        => __( 'Search Periscope Article', 'socialtext' ),
		'not_found'           => __( 'No Periscope Articles Found', 'socialtext' ),
		'not_found_in_trash'  => __( 'No Periscope Articles found in trash', 'socialtext' ),
	);
	$args = array(
		'label'               => __( 'periscope_article', 'socialtext' ),
		'description'         => __( 'Periscope articles and content', 'socialtext' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'page-attributes', ),
		'taxonomies'          => array( 'post_tag', ' periscope_topic' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'periscope_article', $args );

}

// Hook into the 'init' action
add_action( 'init', 'periscope_cpt', 0 );


// Register Custom Taxonomy
function register_pscope_topics()  {

	$labels = array(
		'name'                       => _x( 'Periscope Topics', 'Taxonomy General Name', 'socialtext' ),
		'singular_name'              => _x( 'Periscope Topic', 'Taxonomy Singular Name', 'socialtext' ),
		'menu_name'                  => __( 'Periscope Topics', 'socialtext' ),
		'all_items'                  => __( 'All Topics', 'socialtext' ),
		'parent_item'                => __( 'Parent Topic', 'socialtext' ),
		'parent_item_colon'          => __( 'Parent Topic:', 'socialtext' ),
		'new_item_name'              => __( 'New Topic Name', 'socialtext' ),
		'add_new_item'               => __( 'Add New Periscope Topic', 'socialtext' ),
		'edit_item'                  => __( 'Edit Topic', 'socialtext' ),
		'update_item'                => __( 'Update Topic', 'socialtext' ),
		'separate_items_with_commas' => __( 'Separate topics with commas', 'socialtext' ),
		'search_items'               => __( 'Search topics', 'socialtext' ),
		'add_or_remove_items'        => __( 'Add or remove topics', 'socialtext' ),
		'choose_from_most_used'      => __( 'Choose from the most used topics', 'socialtext' ),
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
	register_taxonomy( 'periscope_topic', 'periscope_article', $args );

}

// Hook into the 'init' action
add_action( 'init', 'register_pscope_topics', 0 );



add_action( 'init', 'register_cpt_article' );

function register_cpt_article() {

    $labels = array( 
        'name' => _x( 'Articles', 'article' ),
        'singular_name' => _x( 'Article', 'article' ),
        'add_new' => _x( 'Add New', 'article' ),
        'add_new_item' => _x( 'Add New Article', 'article' ),
        'edit_item' => _x( 'Edit Article', 'article' ),
        'new_item' => _x( 'New Article', 'article' ),
        'view_item' => _x( 'View Article', 'article' ),
        'search_items' => _x( 'Search Articles', 'article' ),
        'not_found' => _x( 'No articles found', 'article' ),
        'not_found_in_trash' => _x( 'No articles found in Trash', 'article' ),
        'parent_item_colon' => _x( 'Parent Article:', 'article' ),
        'menu_name' => _x( 'Articles', 'article' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Articles published in socialtext journal. distinct from blog posts or other content',
        'supports' => array( 'title', 'author', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies' => array( 'publications' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'article', $args );
}


add_action( 'init', 'register_taxonomy_issues' );

function register_taxonomy_issues() {

    $labels = array( 
        'name' => _x( 'Issues', 'issues' ),
        'singular_name' => _x( 'Issue', 'issues' ),
        'search_items' => _x( 'Search Issues', 'issues' ),
        'popular_items' => _x( 'Popular Issues', 'issues' ),
        'all_items' => _x( 'All Issues', 'issues' ),
        'parent_item' => _x( 'Parent Issue', 'issues' ),
        'parent_item_colon' => _x( 'Parent Issue:', 'issues' ),
        'edit_item' => _x( 'Edit Issue', 'issues' ),
        'update_item' => _x( 'Update Issue', 'issues' ),
        'add_new_item' => _x( 'Add New Issue', 'issues' ),
        'new_item_name' => _x( 'New Issue', 'issues' ),
        'separate_items_with_commas' => _x( 'Separate issues with commas', 'issues' ),
        'add_or_remove_items' => _x( 'Add or remove issues', 'issues' ),
        'choose_from_most_used' => _x( 'Choose from the most used issues', 'issues' ),
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
}



// Register Journal Custom Post Type
add_action( 'init', 'register_cpt_journal' );

function register_cpt_journal() {

    $labels = array( 
        'name' => _x( 'Journals', 'twentysixteen' ),
        'singular_name' => _x( 'Journal', 'twentysixteen' ),
        'add_new' => _x( 'Add New', 'twentysixteen' ),
        'add_new_item' => _x( 'Add New Journal', 'twentysixteen' ),
        'edit_item' => _x( 'Edit Journal', 'twentysixteen' ),
        'new_item' => _x( 'New Journal', 'twentysixteen' ),
        'view_item' => _x( 'View Journal', 'twentysixteen' ),
        'search_items' => _x( 'Search Journals', 'twentysixteen' ),
        'not_found' => _x( 'No journals found', 'twentysixteen' ),
        'not_found_in_trash' => _x( 'No journals found in Trash', 'twentysixteen' ),
        'parent_item_colon' => _x( 'Parent Journal:', 'twentysixteen' ),
        'menu_name' => _x( 'Journals', 'twentysixteen' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Journal issues with brief description and cover image.',
        'supports' => array( 'title', 'author', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'journal', $args );
}




?>