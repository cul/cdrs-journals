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

<?php
	
		global $current_section;
		//Displaying the section name, defaults to article if none specified
		$section = wp_get_post_terms($post->ID, 'sections');
 
		if(!empty($section) && $section[0]->name != $current_section){
			$current_section = $section[0]->name;
			echo '<h3 class="section-label">' . '<a href="' . get_term_link($section[0]->term_id, 'sections') . '">' . $section[0]->name . '</a></h3><br style="clear: both">';
		}
	
	
	
	global $options;
				
	if($options['featured_image_setting'] == "yes"){
			
	if ( has_post_thumbnail() ) {
	
		the_post_thumbnail('thumbnail');
 
    }
     
    }
?>

<article id="post-<?php the_ID() ?>" <?php post_class('excerpt clearfix') ?>>
<h2 class="entry-title"><a href="<?php the_permalink() ?>"  title="<?php printf( esc_attr__( 'Permalink to %s', 'carrington-blueprint' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title() ?></a></h2>
<h3 class="authors">
<?php    
  		$authors =  wp_get_object_terms($post->ID, 'authors', array("fields" => "all", 'orderby' => 'term_order'));
  		$more_authors = array();
  		if($authors){
           foreach ( $authors as $author ) {

    		// The $term is an object, so we don't need to specify the $taxonomy.
    		$term_link = get_term_link( $author );
    		
    		// If there was an error, continue to the next term.
			if ( is_wp_error( $term_link ) ) {
				continue;
			}
   

    		// We successfully got a link. Print it out.
    		array_push( $more_authors, '<a href="' . esc_url( $term_link ) . '">' . $author->name . '</a>');
		}
		echo implode(', ', $more_authors);
   }?>
  
	</h3>
 

 
	
</article><!-- .post -->


