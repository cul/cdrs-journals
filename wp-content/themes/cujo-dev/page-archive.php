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

get_header();
?>

<div id="primary" class="col-sm-8 col-sm-offset-2">
 
	<H2>Past Issues:</H2>	
	 	
	 	
	 	<?php 
	 	//display issues, avoid showing current issue twice
	 	$term = get_term_by('slug', 'current-issue', 'issues');
		$term_id = $term->term_id;
		$terms = get_terms('issues',  'orderby=ID&order=DESC&hide_empty=0&exclude=' . $term_id);
		echo '<ul class="archive_list">';

		foreach ($terms as $term) {
			echo '<li><a href="'.get_term_link($term->slug, 'issues').'">'.$term->name.'</a></li>';
		}
		echo '</ul>';
		
	 	?>	 	
	 	
	    
				 	    </ul>
 
</div><!-- #primary -->
 
<?php 
// get_sidebar();

 
get_footer();
?>