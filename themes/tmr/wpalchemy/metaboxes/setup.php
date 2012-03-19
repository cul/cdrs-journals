<?php

include_once CFCT_PATH.'wpalchemy/MetaBox.php';
 
// global styles for the meta boxes
if (is_admin()) wp_enqueue_style('wpalchemy-metabox', get_stylesheet_directory_uri() . '/wpalchemy/metaboxes/meta.css');

/* eof */