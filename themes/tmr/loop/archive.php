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

<<<<<<< HEAD
=======
?>


<div class="span-18 prepend-4">

<?

>>>>>>> dee42723254fcc49c539c5869aa12823ae9b0597
global $term;
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  

$tax = $term->taxonomy;
$name= $term->name;
<<<<<<< HEAD
echo($tax);
 
=======
echo "Morningside Review Content by ". $tax;
 
/*
>>>>>>> dee42723254fcc49c539c5869aa12823ae9b0597
switch ($tax) {
    case "source":
        echo "<h1>Essays based on ".$name."</h1>";
        break;
    case "progression":
        echo "<h1>Essays in progression ".$name."</h1>";
        break;
    case "writing-strategy":
        echo "<h1>Essays using writing strategy ".$name."</h1>";
        break;
    case "assignment":
        echo "<h1>Essays written for assignment ".$name."</h1>";
        break;
}
 
<<<<<<< HEAD


if (have_posts()) {
	echo '<ol>';
=======
*/

echo "<h1>".$name."</h1>";

 
if (have_posts()) {
	echo '<ul>';
>>>>>>> dee42723254fcc49c539c5869aa12823ae9b0597
	while (have_posts()) {
		the_post();
?>
	<li>
<?php
		cfct_excerpt();
?>
	</li>
<?php
	}
<<<<<<< HEAD
	echo '</ol>';
}

?>
=======
	echo '</ul>';
}

?>

</div>
>>>>>>> dee42723254fcc49c539c5869aa12823ae9b0597
