<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */

get_header(); ?>

			<div id="primary" class="span-15">
			<div id="content" role="main">
	<H2>Issues:</H2>	
	 	
	 	
	 	<?php 
	 	
	 	
$terms = get_terms('issues',  'orderby=ID&order=DESC');

echo '<ul>';
foreach ($terms as $term) {
    echo '<li><a href="'.get_term_link($term->slug, 'issues').'">'.$term->name.'</a></li>';
}
echo '</ul>';
	
 
	
	


 
 
	 	
	 	
	 	
	 	?>	 	
	 	


<hr>

 

	 	
	 	<?
$args=array(
 'post_type' =>  'symposia'  ,
 'posts_per_page' => -1  
);
		  
		  
$loop = new WP_Query( $args ); 
		  

if($loop->have_posts()){		  
		  
		?>  <h2>Symposia:</h2><ul><?
while ( $loop->have_posts() ) : $loop->the_post();
				 
				 ?> 
				 <li class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></li>
 



				 
				 
				 
				
				 
				 
				 
				 	    <?php endwhile;
				 	    
				 	     } ?>
				 	    
				 	    </ul>
				 	    
				 	   
		</div><!-- #content -->
		</div><!-- #primary -->


<div id="sidebar" class="span-9 last">

<?php get_sidebar('brief'); ?>

</div>

<?php get_footer(); ?>