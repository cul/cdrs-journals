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
<div class="col-sm-2" id="left-bar">

<div id="scrolled-head" class="hidden-xs" style="display:none">
	
	<h1 class="entry-title"><?php the_title() ?></h1>
	<h2 class="authors">
	<?php    
        
        
  		$authors =  wp_get_post_terms($post->ID, 'authors', array("fields" => "all"));
  		$moreAuthors = array();
  		if($authors){
           foreach ( $authors as $author ) {

    		// The $term is an object, so we don't need to specify the $taxonomy.
    		$term_link = get_term_link( $author );
    		
    		// If there was an error, continue to the next term.
			if ( is_wp_error( $term_link ) ) {
				continue;
			}

    		// We successfully got a link. Print it out.
    		array_push( $moreAuthors, '<a href="' . esc_url( $term_link ) . '">' . $author->name . '</a>');
		}
		echo implode(', ', $moreAuthors);

 
   
   }?>
	</h2>
	
	<hr>
	<?php
	echo the_terms($post->ID, 'issues');	
	?>
</div>


</div>
<div id="primary" class="col-sm-8">

<article id="post-<?php the_ID() ?>" <?php post_class('clearfix') ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title() ?></h1>
	<h2 class="authors">
	<?php    
        
        
  		$authors =  wp_get_post_terms($post->ID, 'authors', array("fields" => "all"));
  		$moreAuthors = array();
  		if($authors){
           foreach ( $authors as $author ) {

    		// The $term is an object, so we don't need to specify the $taxonomy.
    		$term_link = get_term_link( $author );
    		
    		// If there was an error, continue to the next term.
			if ( is_wp_error( $term_link ) ) {
				continue;
			}

    		// We successfully got a link. Print it out.
    		array_push( $moreAuthors, '<a href="' . esc_url( $term_link ) . '">' . $author->name . '</a>');
		}
		echo implode(', ', $moreAuthors);

 
   
   }?>
	</h2></br>
	<?php


		$citation_info = get_post_custom($post->ID);
  		$the_citation = $citation_info['citation'];
  		echo $the_citation[0];
  		echo '</br>';

  		if ( has_post_thumbnail() ) {
				echo the_post_thumbnail();
		}

	?>
		
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
	</div>
	
	 
	
</article><!-- .post -->
</div>

<div class="col-sm-2" id="right-bar">
<div id="article-tools">
	download pdf
<?php

	$pdf_link = get_post_meta(get_the_id(), '_cmb_pdf', true);
	
		if($pdf_link){
		foreach ($pdf_link as $pdf) {
			echo '<span class="pdf"><a href="' . $pdf . '"> PDF </a></span>';
		}
		}

?>
</div>
</div>