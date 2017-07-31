<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); ?>

			<div id="primary" class="span-15">
			<div id="content" role="main">
			
	 <h5>Current Issue</h5>
 
<?		

	 
				
				
				$args=array(
 'post_type' => array( 'articles', 'essays', 'book-reviews', 'keynotes' ),
'tag' => 'current-issue',
  'posts_per_page' => -1,
  'caller_get_posts'=> 1,
  'orderby'=>'menu_order',
  'order'=>'ASC'
);
		   
		  
		  $loop = new WP_Query( $args ); 
		  
		   $issues = wp_get_object_terms( $post->ID, 'issues', array('orderby' => 'id', 'order' => 'ASC', 'fields' => 'names'));
 
 if($issues){
 
print_r($issues);
 }	
		  
		  
		  
		  
		  
		  
		  
		  while ( $loop->have_posts() ) : $loop->the_post();
		  
		  	$postclass = get_post_type( $post );    
  
	
	if (isset($thisPostclass)){
		
		if ($thisPostclass !== $postclass){
		
		echo '<h2 class="section-label">'.$postclass.'</h2>';
		$thisPostclass = $postclass;
		
		}
		
		
	}
		
	else{
		
		echo '<h2 class="section-label">'.$postclass.'</h2>';
		$thisPostclass = $postclass;
		
		}
				
		  
		  
		  
		

 
 


	 
		?>	
		
				
		<?php get_template_part( 'content-toggle', get_post_format() ); ?>
			 
			 
	    <?php endwhile; ?>

				 
		</div><!-- #content -->
		</div><!-- #primary -->

<div id="sidebar" class="span-9 last">

<?php get_sidebar('brief'); ?>

</div>

<?php get_footer(); ?>