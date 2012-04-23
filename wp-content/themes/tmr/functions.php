<?php

// This file is part of the Carrington JAM Theme for WordPress
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

load_theme_textdomain('carrington-jam');

define('CFCT_DEBUG', false);
define('CFCT_PATH', trailingslashit(TEMPLATEPATH));

include_once(CFCT_PATH.'carrington-core/carrington.php');
 
include_once(CFCT_PATH.'functions/sidebars.php');
 
include_once(CFCT_PATH."Tax-meta-class/Tax-meta-class.php");
 
include_once(CFCT_PATH.'functions/morningsidereview.php');

add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
	<script type="text/javascript"> 

  		var _gaq = _gaq || []; 
  		_gaq.push(['_setAccount', 'UA-30803824-1']); 
 		_gaq.push(['_trackPageview']); 

  		(function() { 
    		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
    		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; 
    		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
  		})(); 

	</script> 
<?php }

?>