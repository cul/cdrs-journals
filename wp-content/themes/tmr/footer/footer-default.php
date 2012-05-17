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

<div class="span-7" id='search-form'>
<?php get_search_form(); ?>
</div>
<div class="span-16">

<hr/>
<p>copyright notice. address, phone. other footer content. goes right here.</p>
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
Powered by the <a href='http://cdrs.columbia.edu'>Center for Digital Research and Scholarship</a> at <a href='http://libraries.columbia.edu'>Columbia University Libraries</a>.
</div>
</body>
</html>