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

<!-- footer options -->

<?php
  $foot_opt = get_option( 'my-footer-options' );
  $ac_partner = $foot_opt['ac_partner'];
  $school_opt = $foot_opt['school_affiliation'];
  $options = get_option( 'my-footer-options' );
  $checked = $options['ac_partner'];
  $school = $options['school_affiliation'];
  $school_url = $options['school_affiliation_url'];
  $logo = get_option('logo_url');
?>

<!-- footer -->

<footer>

<!-- logo-->

<div class="footer-logo">
  <a href="<?php echo home_url(); ?>">
    <img src="<?php echo $logo ?>">
  </a>
</div>

<!-- links-->

<ul class="footer-links">
  <li><a href="<?php echo home_url(); ?>">Home</a></li>
  <li><a href="<?php echo home_url(); ?>/about">About</a></li>
  <?php if($checked != null){ ?>
    <li><a href="<?php echo home_url(); ?>/copyright">Copyright</a></li>
  <?php } else{ ?>
  <?php } ?>
</ul>

<div class="footer-text">

<!-- partnership-->

<p>
  Published in partnership with <a href="http://library.columbia.edu">Columbia University Libraries</a><?php if($school){ ?>
    and <a href="<?php echo $school_url; ?>"> <?php echo $school ?></a>.
    <?php } else{ ?>.
  <?php } ?>

  <!-- ac -->

  <?php if($checked != null){ ?>
    Distributed through Columbia University’s <a href="http://academiccommons.columbia.edu">Academic Commons</a>.
    <?php } else{ ?>
  <?php } ?>

  <!-- copyright -->

  <?php $options = get_option( 'my-footer-options' );
    $copyright_url = $options['copyright_url'];
    if($copyright_url && $options['copyright']){
  ?>

  This work is Licensed under a <a rel="license" href="<?php echo $copyright_url; ?>"><?php echo $options['copyright']; ?></a> License.

  <?php } ?>

  <?php if(!$copyright_url && $options['copyright']){ ?>

  This work is Licensed under a <?php echo $options['copyright']; ?> License.

  <?php }?>

  <?php if($options['custom_copyright']){ ?>
  <?php echo $options['custom_copyright'] ?>
  <?php } ?>
</p>

<!-- issn -->

<p>
  <?php $options = get_option( 'my-footer-options' );
    $print = $options['print_issn'];
    $online = $options['online_issn'];
    if($print && $online){
  ?>

  <span class="issn">ISSN (Print): <?php echo $print ?> &nbsp;
  <span class="issn">ISSN (Online): <?php echo $online; ?></span>

  <?php } ?>

  <?php if($print && !$online){ ?>

  <span class="issn">ISSN: <?php echo $print ?></span>

  <?php } ?>

  <?php if($online && !$print){ ?>

  <span class="issn">ISSN: <?php echo $online; ?></span>

  <?php } ?>
</p>

</div>

</footer>

<?php wp_footer() ?>

</body>
</html>
