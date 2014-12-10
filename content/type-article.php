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
        
        
  		$authors =  wp_get_object_terms($post->ID, 'authors', array("fields" => "all", 'orderby' => 'term_order'));
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
				echo '<h3 class="super"><span class="super-l">' . $section->name. '</span><span class="super-r">'.$issue_link.'</h3>';
				}
			}else{
				echo '<h3 class="super"><span class="super-l">Article</span><span class="super-r">'.$issue_link.'</h3>';
			}

		if ( has_post_thumbnail() ) {
				echo the_post_thumbnail('full');
		}

		?>
		

		<h1 class="entry-title"><?php the_title() ?></h1>
		<div class="auth_div">
	<?php    
        
        
  		$authors =  wp_get_object_terms($post->ID, 'authors', array("fields" => "all", 'orderby' => 'term_order'));
  		$moreAuthors = array();
  		
  		$schools = array();
  		$num = 1;
  		$auth_count = 1;
  		$school_count = 1;

  		if($authors){
           foreach ( $authors as $author ) {
	           $their_school = get_tax_meta($author->term_id, 'institution');
	           if(!empty($their_school) && $their_school != NULL && !$schools[$their_school]){
	           	 $schools[$their_school] = $num;
	           	 ++$num;
	           }
	           	
	    		// The $term is an object, so we don't need to specify the $taxonomy.
	    		$term_link = get_term_link( $author );
	    		
	    		// If there was an error, continue to the next term.
				if ( is_wp_error( $term_link ) ) {
					continue;
				}


				echo '<h2 class="authors">' . '<a href="' . esc_url( $term_link ) . '">' .  $author->name . '</a>' . ( !empty($schools[$their_school]) ? '<sup>' . $schools[$their_school] . '</sup>' : ''  ) . ($auth_count < count($authors)? ', ' : '') . '</h2>';	
				++$auth_count;
			}
		}
		echo '<br><br>';

 		foreach ($schools as $school => $number) {
 			echo '<h5 class="schools">' . $number . ' ' .$school . ($school_count < count($schools)? ', ' : '') . '</h5>';
 			++$school_count;
 		}

   
   ?>
</div>
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
<!-- 		<?php previous_post_link('%link', 'Previous Article: %title', TRUE, ' ', 'issues'); ?><br><br>    <?php next_post_link('%link', 'Next Article: %title' , TRUE, ' ', 'issues') ?>
 -->
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
	    $fb_name = $options['fb_name'];
	    $linked_in = $options['linkedin_name'];
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
	<?php } 
		if($fb_name){
	?>
<a href="http://facebook.com//sharer/sharer.php?u=<?php echo $link ?>" target="_blank"> <i class="fa fa-facebook"></i>&nbsp;Facebook</a>
	<?php } ?>
<a href="http:///www.linkedin.com/shareArticle?mini=true&url=<?php echo $link ?>&title=<?php echo the_title() ?>" target="_blank"> <i class="fa fa-linkedin-square"></i>&nbsp;LinkedIn</a>

</div>
</div>