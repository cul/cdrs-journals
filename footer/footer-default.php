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

	</div>
	<?php
        $foot_opt = get_option( 'my-footer-options' );
        $ac_partner = $foot_opt['ac_partner'];
        if($ac_partner == null){
            $offset = "col-sm-offset-4";
        }
    ?>
	<div class="container">
	<footer id="footer" class="row site-footer" role="contentinfo">
		<div class="row">

			<div class="col-sm-4" id="cdrs_logo_footer">
				<h6>Published in partnership with</h6>
				<a href="http://cdrs.columbia.edu">
					<div id="cdrs_logo_space">
                        <div class="col-xs-6" id="cdrs_crab">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/cdrs-icon.png" alt="cdrs logo"  />
						</div>
                        <div class="col-xs-6">
                        <p>CDRS</p>
					   </div>
					</div></br>
                    <div id="cdrs_full">
					Center For Digital Research & Scholarship
					<span class="small">Columbia University Libraries/Information Services</span>
				    </div>
                </a>
			</div>

			<div class="col-sm-4 <?php echo $offset ?>"  id="issn_copyright">

			<?php $options = get_option( 'my-theme-options' );
    			  $print = $options['print_issn'];
    			  if($print){
    		?>
			<h5>ISSN(PRINT): <?php echo $print ?></h5>
    		<?php } ?>

    		<?php $options = get_option( 'my-theme-options' );
    			  $online = $options['online_issn'];
    			  if($online){
    		?>
    		<h5>ISSN(Online): <?php echo $online; ?></h5>
    		<?php } ?>

    		<?php $options = get_option( 'my-footer-options' );
    			  $copyright_url = $options['copyright_url'];
    			  if($copyright_url && $options['copyright']){
    		?>
    		<h5>This work is Licensed under a <a href="<?php echo $copyright_url; ?>"> <?php echo $options['copyright']; ?> </a> license. </h5>

    		<?php } ?>

    		<?php if(!$copyright_url && $options['copyright']){ ?>
    			<h5>This work is Licensed under a <?php echo $options['copyright']; ?> </a> license. </h5>
    		<?php }?>

    		<?php if($options['custom_copyright']){ ?>
    			<h5> <?php echo $options['custom_copyright'] ?> </h5>
    		<?php } ?>


    	</div>
        <?php $options = get_option( 'my-footer-options' );
                                 $checked = $options['ac_partner'];
                                 if($checked != null){ ?>
    	<div class="col-sm-4" id="ac_logo_footer">
    		

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
