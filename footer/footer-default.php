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
        $ac_partner = get_theme_mod('ac_partner');
        $school_opt = get_theme_mod('school_affiliation');
        if($ac_partner == "0" && !$school_opt){
            $offset = "col-sm-offset-4";
        }
    ?>
    <div class="container" id="footer_container">
    <footer id="footer" class="row site-footer" role="contentinfo">
        <div class="row" id="footer_row">

            <div class="col-sm-4" id="cdrs_logo_footer">
                <h5 class="partner" >Published in partnership with</h5>
                <a href="http://cdrs.columbia.edu"> 
                    <div id="cdrs_full"><h5>
                    Center For Digital Research & Scholarship</h5>
                    <span class="small"><h6>Columbia University Libraries/Information Services</h6></span>
                    </div>
                </a>
            </div>


            <?php 
               $checked = get_theme_mod('ac_partner');
             $school = get_theme_mod('school_affiliation');
             $school_url = get_theme_mod('school_affiliation_url');
            ?>
            
            <div class="col-sm-4" id="ac_logo_footer">
                 <?php if($school){ ?>
                    <h5><a href="<?php echo $school_url; ?>"> <?php echo $school ?> </a></h5>
                <?php } 
                    if($checked != "0" && $school){ 
                        echo "<h5> and</h5>"; 
                    }
                    if($checked != "0"){ ?>
                        <a href='http://academiccommons.columbia.edu'>
                        <div id='ac_logo_space'>

                                 <img src="<?php echo get_template_directory_uri() ?>/assets/img/ac_2015.png" >

                        </div>
                        </a>
                    <?php } else{ ?>
                        <div id='ac_logo_space'>

                                 <img src="<?php echo get_template_directory_uri() ?>/assets/img/asfalt-light.png" id="ac_filler_logo">

                        </div>
                    <?php } ?>
            </div>

            


            <div class="col-sm-4"  id="issn_copyright">
                <?php 
                      $print = get_theme_mod('print_issn');
                      $online = get_theme_mod('online_issn');
                      if($print && $online){
                ?>
                    <h5>ISSN (Print): <?php echo $print ?></h5>
                    <h5>ISSN (Online): <?php echo $online; ?></h5>
                <?php } ?>

                <?php
                      if($print && !$online){
                ?>
                <h5>ISSN: <?php echo $print ?></h5>
                <?php } ?>

                <?php 
                      if($online && !$print){
                ?>
                <h5>ISSN: <?php echo $online; ?></h5>
                
                <?php } ?>

                <?php 
                      $copyright_url = get_theme_mod('copyright_url');
                      if($copyright_url && get_theme_mod('copyright')){
                ?>
                <h5>This work is Licensed under a <a rel="license" href="<?php echo $copyright_url; ?>"><em> <?php echo get_theme_mod('copyright'); ?> </em></a> License. </h5>

                <?php } ?>

                <?php if(!$copyright_url && get_theme_mod('copyright')){ ?>
                    <h5>This work is Licensed under a <?php echo get_theme_mod('copyright'); ?> License. </h5>
                <?php }?>

                <?php if(get_theme_mod('custom_copyright')){ ?>
                    <h5> <?php echo get_theme_mod('custom_copyright') ?> </h5>
                <?php } ?>
           </div>
        
        </div><!-- .c1-12 -->
    </footer><!--#footer -->

</div><!-- .container -->

<?php wp_footer() ?>

</body>
</html>
