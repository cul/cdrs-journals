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
if (CFCT_DEBUG) { cfct_banner(__FILE__); }

get_header();

?>

<div id="primary" class="col-sm-12">
	<?php $the_obj = get_queried_object();
		  $their_school = get_tax_meta( (int) $the_obj->term_id, 'institution');
	      $their_email = get_tax_meta($the_obj->term_id, 'email');
	      $headshot = get_tax_meta($the_obj->term_id, 'author_pic');
	?>
	<h1 class="archive-title"><?php
	
			printf(__('Articles by: ', 'carrington-blueprint'), '<span>' . single_cat_title('', false ) . '</span>'); ?>
	</h1>
	
	<div class="author_info">
	<?php if( isset($headshot['src'])){ ?>
	<a href="<?php echo $headshot['src'] ?>" class="fancybox"><img src="<?php echo $headshot['src'] ?>"></a>
	<?php } ?>
	<h2>
		<?php
		echo '' . $the_obj->name;
		 if(!empty($their_email) ){  echo '<sup><a title="' . $their_email . '" href="mailto:'. $their_email .'"><span class="glyphicon glyphicon-envelope"></span></a></sup>'; }
		
		?>
	</h2>
	<h3><?php if(!empty($their_school) ){ echo $their_school; } ?></h3>
	<p><?php if($the_obj->description){ echo $the_obj->description; } ?></p>
	</div>

	<?php
		
		// For the loop used, look in /loops
		cfct_loop();

		// Pagination
		cfct_misc('nav-posts');
	?>

</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
?>
