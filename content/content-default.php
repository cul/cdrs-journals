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
?>
<article id="post-<?php the_ID() ?>" <?php post_class('clearfix') ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink() ?>"  title="<?php printf( esc_attr__( 'Permalink to %s', 'carrington-blueprint' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title() ?></a></h1>
	<h2 class="authors">
	<?php    
        
        
  		$authors =  wp_get_post_terms($post->ID, 'aauthor', array("fields" => "all"));
  		$moreAuthors = array();
  		if($authors){
           foreach ( $authors as $author ) {

    		// The $term is an object, so we don't need to specify the $taxonomy.
    		$term_link = get_term_link( $author );

    		// We successfully got a link. Print it out.
    		array_push( $moreAuthors,  $author->name );
		}
		echo implode(', ', $moreAuthors);

 
   
   }?>
	</h2></br></br>
		
	</header>
	<div class="entry-content">
		<?php
			the_content('<span class="more-link">'.__('Continued&hellip;', 'carrington-blueprint').'</span>');
			$args = array(
				'before' => '<p class="pages-link">'. __('Pages: ', 'carrington-blueprint'),
				'after' => "</p>\n",
				'next_or_number' => 'number'
			);
			wp_link_pages($args);
		?>
	</div>

	<div class="entry-footer entry-meta">
		<?php
			echo the_terms($post->ID, 'issues');

		?>
		
		<?php $args = array(
       			 'post_type' => 'attachment',
       			 'numberposts' => null,
        		 'post_status' => null,
        		 'post_parent' => $post->ID
			);



		$attachments = get_posts($args);
		if ($attachments) {
       			 foreach ($attachments as $attachment) {
         
         

               	  echo '<span class="pdf_link">'.wp_get_attachment_link($attachment->ID, '' , false, false, 'PDF').'</span>'; 
        		}
		}

		?>
	</div>
</article><!-- .post -->
