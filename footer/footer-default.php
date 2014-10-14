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
	</div><!-- #main -->
	<hr>
	<footer id="footer" class="row site-footer" role="contentinfo">
		<div class="c1-12">
			
			<div class="col-sm-4" id="cdrs_logo_footer">
				<h6>Published in partnership with</h6>
				<a href="http://cdrs.columbia.edu">
					<div id="cdrs_logo_space">
						
						CDRS
					
					</div>
					Center For Digital Research & Scholarship</br>
					<span class="small">Columbia University Libraries/Information Services</span>
				</a>
			</div>

			<div class="col-sm-4">
			<h5>ISSN(PRINT): <?php $options = get_option( 'my-theme-options' );
    							   $print = $options['print_issn'];
    							   echo $print;
    							   ?>
    		</h5>

    		<h5>ISSN(Online): <?php $options = get_option( 'my-theme-options' );
    							   $online = $options['online_issn'];
    							   echo $online;
    							   ?>
    		</h5>
    		<?php $options = get_option( 'my-footer-options' );
    			  $copyright_url = $options['copyright_url'];
    			  if($copyright_url && $options['copyright']){
    		?>
    		<h5>This work is Licensed under a <a href="<?php echo $copyright_url; ?>"> <?php echo $options['copyright']; ?> </a> liscense. </h5>

    		<?php } ?>
    		
    		<?php if(!$copyright_url && $options['copyright']){ ?>
    			<h5>This work is Licensed under a <?php echo $options['copyright']; ?> </a> liscense. </h5>
    		<?php }?>

    		<?php if($options['custom_copyright']){ ?>
    			<h5> <?php echo $options['custom_copyright'] ?> </h5>
    		<?php } ?>
    		
    		  	
    	</div>
    	<div class="col-sm-4" id="ac_logo_footer">
    		<?php $options = get_option( 'my-footer-options' );
    							 $checked = $options['ac_partner'];
    							 if($checked != null){ ?>
				
				<h6>Also published in partnership with</h6>
				<a href="http://academiccommons.columbia.edu">	
				<div id="ac_logo_space">
						
						Academic Commons
					
				</div>				

    							


    		<?php } ?>
    							    

    							   
    		
    	</div>
    		


		</div><!-- .c1-12 -->
	</footer><!--#footer -->

</div><!-- .container -->

<?php wp_footer() ?>

</body>
</html>