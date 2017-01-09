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


?>




<!-- footer -->

<footer>

<!-- partnership-->

Published in Partnership with Columbia University Libraries
<?php if($school){ ?>
  and <a href="<?php echo $school_url; ?>"> <?php echo $school ?></a>.
  <?php } else{ ?>
<?php } ?>

<!-- ac -->

<?php if($checked != null){ ?>
  Journal content made available through Academic Commons.
  <?php } else{ ?>
<?php } ?>

<!-- issn -->

<?php $options = get_option( 'my-footer-options' );
  $print = $options['print_issn'];
  $online = $options['online_issn'];
  if($print && $online){
?>

ISSN (Print): <?php echo $print ?> &nbsp;
ISSN (Online): <?php echo $online; ?>

<?php } ?>

<?php if($print && !$online){ ?>

ISSN: <?php echo $print ?>

<?php } ?>

<?php if($online && !$print){ ?>

ISSN: <?php echo $online; ?>

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

</footer>

<?php wp_footer() ?>

</body>
</html>
