<?php

function add_taxboxes() {
	remove_meta_box( 'editiondiv', 'essay', 'side' );
	add_meta_box('edition', __('Editions'),'edition_layout','essay');
	
	remove_meta_box( 'authordiv', 'essay', 'side' );
	add_meta_box('author', __('Authors'),'author_layout','essay');
	
	remove_meta_box( 'progressiondiv', 'essay', 'side' );
	add_meta_box('progression', __('Progressions'),'progression_layout','essay');
	
	remove_meta_box( 'sourcediv', 'essay', 'side' );
	add_meta_box('source', __('Sources'),'source_layout','essay');
	
	remove_meta_box( 'themediv', 'essay', 'side' );
	add_meta_box('theme', __('Themes'),'theme_layout','essay');
	
	remove_meta_box( 'strategydiv', 'essay', 'side' );
	add_meta_box('strategy', __('Strategies'),'strategy_layout','essay');
	
	remove_meta_box( 'assignmentdiv', 'essay', 'side' );
	add_meta_box('assignment', __('Assignments'),'assignment_layout','essay');
}

/*
CUSTOM METABOX FOR EDITION
*/
function edition_layout($post) {	
   wp_nonce_field(__FILE__,'edition_nonce');

	echo "Select the Edition:<br>";

	$getEdition = wp_get_object_terms($post->ID, 'edition', 'fields=names');
	$getFullEdition = get_terms('edition', 'fields=names&hide_empty=0');

	for($checkE=0; $checkE<sizeof($getEdition); $checkE++) {
		if (in_array($getEdition[$checkE], $getFullEdition)) {
			$checkedE = $getEdition[$checkE];
		}
	}
	?>

	<select name="post_edition">
		<?php for($loopE=0; $loopE<sizeof($getFullEdition); $loopE++) {
			if ($getFullEdition[$loopE] == $checkedE) { ?>
				<option value="<?php echo $getFullEdition[$loopE]; ?>" selected><?php echo $getFullEdition[$loopE]; ?></option>
			<?php }
			else { ?>
				<option value="<?php echo $getFullEdition[$loopE]; ?>"><?php echo $getFullEdition[$loopE]; ?></option>
			<?php }
		} ?>
	</select>
<?php }

/*
CUSTOM METABOX FOR AUTHOR
*/
function author_layout($post) {
	wp_nonce_field(__FILE__,'author_nonce');
	
	echo "Enter the Author Name:<br>";
	
	$getAuthor = wp_get_object_terms($post->ID, 'author', 'fields=names');
	$getFullAuthor = get_terms('author', 'fields=names&hide_empty=0');

	if(sizeof($getAuthor) == NULL) { ?>
		<input name="tax_author" type="text" value="" />
	<?php }

	else {
		for ($loopA=0; $loopA<sizeof($getAuthor); $loopA++) { ?>
			<input name="tax_author" type="text" size="20" value='<?php echo $getAuthor[$loopA]; ?>' />
	<?php	}
	}
}

/*
CUSTOM METABOX FOR PROGRESSION
*/
function progression_layout($post) {	
   wp_nonce_field(__FILE__,'progression_nonce');

	echo "Select the Progression:<br>";

	$getProgression = wp_get_object_terms($post->ID, 'progression', 'fields=names');
	$getFullProgression = get_terms('progression', 'fields=names&hide_empty=0&orderby=id');

	for($checkP=0; $checkP<sizeof($getProgression); $checkP++) {
		if (in_array($getProgression[$checkP], $getFullProgression)) {
			$checkedP = $getProgression[$checkP];
		}
	}

	?>

	<select name="post_progression">
		<?php for($loopP=0; $loopP<sizeof($getFullProgression); $loopP++) {
			if ($getFullProgression[$loopP] == $checkedP) { ?>
				<option value="<?php echo $getFullProgression[$loopP]; ?>" selected><?php echo $getFullProgression[$loopP]; ?></option>
			<?php }
			else { ?>
				<option value="<?php echo $getFullProgression[$loopP];?>"><?php echo $getFullProgression[$loopP]; ?></option>
			<?php }
		} ?>
	</select>
<?php }

/*
CUSTOM METABOX FOR SOURCE
*/
function source_layout($post) {
	wp_nonce_field(__FILE__,'source_nonce');

	echo "Select the Highlighted Source(s):<br>";

	$getSource = wp_get_object_terms($post->ID, 'source', 'fields=names');
	$getFullSource = get_terms('source', 'fields=names&hide_empty=0&orderby=id');
	$getFullAlpha = get_terms('source', 'fields=names&hide_empty=0&orderby=name');

	//find position of "none" in array
	$none = array_search("None",$getFullAlpha);

	//get list of sources that need to be "checked"
	if (sizeof($getSource)!=0) {
		for($checkS=0; $checkS<sizeof($getSource); $checkS++) {
			if (in_array($getSource[$checkS], $getFullSource)) {
				$checkedS[] = $getSource[$checkS];
			}
		}
	}
	else {
		$checkedS[0] = $none;
	}

	//check if the values in $checkedS array are strings
	for ($string=0; $string<sizeof($checkedS); $string++) {
		$stringCheck = is_string($checkedS[$string]);
	}

	//check if None or not a string 
	// if true, None checkbox at the top already checked and then list out the rest of the sources
	if(($checkedS[0] == "None") && (sizeof($checkedS)==1) || ($stringCheck==FALSE)) {
		?><input type="checkbox" name="tax_source[]" checked="yes" value='<?php echo $getFullAlpha[$none]; ?>' /> <?php echo $getFullAlpha[$none]."<br>";

		for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
			if ($getFullAlpha[$loopS] == "None") {
				//do nothing
			}
			else {
				?><input type="checkbox" name="tax_source[]" value='<?php echo $getFullAlpha[$loopS]; ?>' /> <?php echo $getFullAlpha[$loopS]."<br>";
			}
		}
	}
	// else None checkbox at the top not checked and then list out the sources (with the appropriate source checked if included in $checkedS array)
	else {
		?><input type="checkbox" name="tax_source[]" value='<?php echo $getFullAlpha[$none]; ?>' /> <?php echo $getFullAlpha[$none]."<br>";
	
		for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
			if (in_array($getFullAlpha[$loopS], $checkedS)) { ?>
 				<input type="checkbox" name="tax_source[]" checked="yes" value='<?php echo $getFullAlpha[$loopS]; ?>' /> <?php echo $getFullAlpha[$loopS] ."<br>";
			}
			else { 
				if ($getFullAlpha[$loopS] == "None") {
					//do nothing
				}
				else { ?>
					<input type="checkbox" name="tax_source[]" value='<?php echo $getFullAlpha[$loopS]; ?>' /> <?php echo $getFullAlpha[$loopS]."<br>";
				}
			}
		}
	}
}

/*
CUSTOM METABOX FOR THEME
*/
function theme_layout($post) {	
   wp_nonce_field(__FILE__,'theme_nonce');

	echo "Select the Theme:<br>";

	$getTheme = wp_get_object_terms($post->ID, 'theme', 'fields=names');
	$getFullTheme = get_terms('theme', 'fields=names&hide_empty=0');

	for($checkTH=0; $checkTH<sizeof($getTheme); $checkTH++) {
		if (in_array($getTheme[$checkTH], $getFullTheme)) {
			$checkedTH = $getTheme[$checkTH];
		}
	} ?>

	<select name="tax_theme">
		<?php for($loopTH=0; $loopTH<sizeof($getFullTheme); $loopTH++) {
			if ($getFullTheme[$loopTH] == $checkedTH) { ?>
 				<option value="<?php echo $getFullTheme[$loopTH]; ?>" selected><?php echo $getFullTheme[$loopTH]; ?></option>
			<?php }
			else { ?>
				<option value="<?php echo $getFullTheme[$loopTH]; ?>"><?php echo $getFullTheme[$loopTH]; ?></option>
 			<?php }
		} ?>
	</select>
<?php }

/*
CUSTOM METABOX FOR STRATEGY
*/
function strategy_layout($post) {	
   wp_nonce_field(__FILE__,'strategy_nonce');

	echo "Select the Strategy:<br>";

	$getStrategy = wp_get_object_terms($post->ID, 'strategy', 'fields=names');
	$getFullStrategy = get_terms('strategy', 'fields=names&hide_empty=0');
	
	for($checkS=0; $checkS<sizeof($getStrategy); $checkS++) {
		if (in_array($getStrategy[$checkS], $getFullStrategy)) {
			$checkedS = $getTheme[$checkS];
		}
	} ?>

	<select name="tax_strategy">
		<?php for($loopS=0; $loopS<sizeof($getFullStrategy); $loopS++) {
			if ($getFullStrategy[$loopS] == $checkedS) { ?>
 				<option value="<?php echo $getFullStrategy[$loopS]; ?>" selected><?php echo $getFullStrategy[$loopS]; ?></option>
			<?php }
			else { ?>
				<option value="<?php echo $getFullStrategy[$loopS]; ?>"><?php echo $getFullStrategy[$loopS]; ?></option>
 			<?php }
		} ?>
	</select>
<?php }

/*
CUSTOM METABOX FOR ASSIGNMENT
*/
function assignment_layout($post) {	
   wp_nonce_field(__FILE__,'assignment_nonce');

	echo "Select the Assignment:<br>";

	$getAssignment = wp_get_object_terms($post->ID, 'assignment', 'fields=names');
	$getFullAssignment = get_terms('assignment', 'fields=names&hide_empty=0');

	for($checkA=0; $checkA<sizeof($getAssignment); $checkA++) {
		if (in_array($getAssignment[$checkA], $getFullAssignment)) {
			$checkedA = $getAssignment[$checkA];
		}
	} ?>

	<select name="tax_assignment">
		<?php for($loopA=0; $loopA<sizeof($getFullAssignment); $loopA++) {
			if ($getFullAssignment[$loopA] == $checkedA) { ?>
 				<option value="<?php echo $getFullAssignment[$loopA]; ?>" selected><?php echo $getFullAssignment[$loopA]; ?></option>
			<?php }
			else { ?>
				<option value="<?php echo $getFullAssignment[$loopA]; ?>"><?php echo $getFullAssignment[$loopA]; ?></option>
			<?php }
		} ?>
	</select>
<?php }


/*
FUNCTION THAT SAVES THE INFORMATION FROM THE NEW TAXONOMY BOXES.
*/
function save_taxboxes($post_id) {
	// verify this came from our screen and with proper authorization.
 	if (!wp_verify_nonce($_POST['edition_nonce'], __FILE__) && !wp_verify_nonce($_POST['author_nonce'], __FILE__) && !wp_verify_nonce($_POST['progression_nonce'], __FILE__) && !wp_verify_nonce($_POST['source_nonce'], __FILE__) && !wp_verify_nonce($_POST['theme_nonce'], __FILE__) && !wp_verify_nonce($_POST['strategy_nonce'], __FILE__) && !wp_verify_nonce($_POST['assignment_nonce'], __FILE__)) {
    	return $post_id;
  	}
 
  	// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
  	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    	return $post_id;
 
  	// Check permissions
  	if ( 'essay' == $_POST['post_type'] ) {
    	if ( !current_user_can( 'edit_page', $post_id ) )
      		return $post_id;
  	} else {
    	if ( !current_user_can( 'edit_post', $post_id ) )
      	return $post_id;
  	}
 
  	// OK, we're authenticated: we need to find and save the data
	$post = get_post($post_id);
	if (($post->post_type == 'essay')) { 
   	$edition = $_POST['post_edition'];
   	$author = $_POST['tax_author'];
   	$progression = $_POST['post_progression'];
   	$source[] = $_POST['tax_source'];
   	$theme = $_POST['tax_theme'];
   	$strategy = $_POST['tax_strategy'];
   	$assignment = $_POST['tax_assignment'];
           
   	wp_set_object_terms( $post_id, $edition, 'edition' );
   	wp_set_object_terms( $post_id, $author, 'author' );
   	wp_set_object_terms( $post_id, $progression, 'progression' );
   	
   	for ($num=0; $num<sizeof($source); $num++) {
   		wp_set_object_terms( $post_id, $source[$num], 'source' );
   	}
   	
   	wp_set_object_terms( $post_id, $theme, 'theme' );
   	wp_set_object_terms( $post_id, $strategy, 'strategy' );
   	wp_set_object_terms( $post_id, $assignment, 'assignment' );
   }
	return $edition;
 	return $author;
 	return $progression;
 	return $source;
 	return $theme;
 	return $strategy;
 	return $assignment;
}

add_action('admin_menu', 'add_taxboxes');
add_action('save_post', 'save_taxboxes');