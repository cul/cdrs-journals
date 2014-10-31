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

<div id="scrolled-head" class="hidden-xs hidden-print" style="display:none">
	
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
		
	$issue_link;

	$post_terms = (wp_get_post_terms($post->ID, 'issues'));
	$the_issue = wp_list_filter($post_terms, array('slug'=>'current-issue'),'NOT');
	foreach ($the_issue as $issue) {
		
			$issue_link = '<a href="'.get_term_link($issue->slug, 'issues').'">'.$issue->name.'</a>';
			echo $issue_link;
		}	
	?>
</div>


</div>
<div id="primary" class="col-sm-8">

<article id="post-<?php the_ID() ?>" <?php post_class('clearfix') ?>>
	<header class="entry-header">
		<?php $sections = wp_get_post_terms($post->ID, 'sections'); 
			if(!empty($sections)){
				foreach ($sections as $section) {
					echo '<h3>'. $section->name . '</h3>';
				}
			}else{
				echo '<h3 class="super"><span class="super-l">Article</span><span class="super-r">'.$issue_link.'</h3>';
			}

		if ( has_post_thumbnail() ) {
				echo the_post_thumbnail('full');
		}

		?>
		

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
	<div class="library_data">
	<?php
		$options = get_option( 'my-theme-options' );
    	$color = $options['link_color'];

		$custom_doi = get_post_custom($post->ID);
  		$the_doi = $custom_doi['doi'];
  		$citation_info = get_post_custom($post->ID);
  		$the_citation = $citation_info['citation'];
  		
  		if($the_doi[0]||$the_citation[0]){
  		
  		echo "<table class='lib-data'><tbody>";
  		if($the_doi[0]){
  		echo '<tr><td class="tlabel">DOI:</td><td> <a href="http://dx.doi.org/'. $the_doi[0] . '">' . $the_doi[0] . '</a></td></tr>';
  		}



  		if($the_citation[0]){
  		echo '<tr><td class="tlabel">Citation:</td><td>' . $the_citation[0] . '</td></tr>';
  		};
		
		echo "</tbody></table>";
		}
  		
	?>
	</div>

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
		
	</div>
	
	 
	
</article><!-- .post -->
</div>

<div class="col-sm-2" id="right-bar">
<div id="article-tools" class="hidden-xs hidden-print">
	<h5><i class="fa fa-wrench"></i>&nbsp;Article Tools</h5>
	<a href="javascript:print();"><i class="fa fa-print"></i>&nbsp;Print</a>
	
<?php

	$pdf_link = get_post_meta(get_the_id(), '_cmb_pdf', true);
	
		if($pdf_link){
			foreach ($pdf_link as $pdf) {
				echo '<a href="' . $pdf . '"><i class="fa fa-file-text"></i>&nbsp;Download PDF</a>';
			}
		}

		$options = get_option( 'social-media-options' );
	    $twitter_name =  $options['twitter_name'];
	    $link = get_permalink();

 ?>
<hr>
<!-- <h5><i class="fa fa-share"></i>&nbsp;Share</h5> -->
<a href="mailto:?subject=<?php echo the_title(); ?>&body=<?php echo the_permalink(); ?>"><i class="fa fa-envelope"></i>&nbsp;Email</a>

<!-- example for email link: <a href="mailto:onecooldude@gmail.com?subject=Hey+Dude.+You're+Cool.&cc=anotherdude@gmail.com&bcc=invisibledude@gmail.com&body=Your+awesome+message+goes+here.%0D%0A%0D%0AThis+is+on+a+new+line.+Go+to+http%3A%2F%2Fwww.google.com%2F.">onecooldude@gmail.com</a> -->

	<?php 
		 
	    if($twitter_name){
	?>
<a href="http://twitter.com/intent/tweet?text=<?php echo the_title() ?>&url=<?php echo $link ?>&via=<?php echo $twitter_name ?>" target="_blank"> <i class="fa fa-twitter"></i>&nbsp;Twitter</a>
	<?php } ?>
</div>
</div>