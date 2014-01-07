<?php

// This file is part of the Carrington JAM Theme for WordPress
// http://carringtontheme.com
//
// Copyright (c) 2008-2010 Crowd Favorite, Ltd. All rights reserved.
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
<div div id="footer" class="span-24">

 
<div class="span-22 prepend-1" id='copyrights'>
<!--
<hr/>
<p>Essays published in <a href="<?php home_url('/') ?>?page_id=129"><em>The Morningside Review</em></a> are protected by copyright, with all rights reserved by the author unless otherwise indicated. </p>
-->
 </div>

</div>


<?php

wp_footer();


if (CFCT_DEBUG) {
?>

<div style="border: 1px solid #ccc; background: #ffc; padding: 20px;">The <code>CFCT_DEBUG</code> setting is currently enabled, which shows the filepath of each included template file. To hide the file paths, edit this setting in the <?php echo CFCT_PATH; ?>functions.php file.</div>

<?php
}

?>
<!-- <div id="cu-writing"  ><a href="http://www.college.columbia.edu/core/uwp"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/selected-essays-home.png"></a></div> -->
</div>

 
<div class="container" id='colophon'>

<div class="span-6">
<div class="cdrs-colophon">
<h6>Published in Partnership with</h6>

<div id="cdrs-id">

CDRS

</div>

Center For Digital Research &amp; Scholarship<br>
<span class="small">Columbia University Libraries/Information Services</span>
</div>

</div>

<div class="span-14">
<div class="copy-warn">
<span class="copy-sign">&copy;</span> Essays published in <em>The Morningside Review</em> are protected by copyright, with all rights reserved by the author unless otherwise indicated.
</div>
</div>

<div class="container" id='print-colophon'>

The Morningside Review is a partnership between the Undergraduate Writing Program and the Center for Digital Research and Scholarship at Columbia University Libraries.

</div>

</body>

</html>