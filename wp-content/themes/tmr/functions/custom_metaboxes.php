<?php

function add_taxboxes() {
	remove_meta_box( 'editiondiv', 'essay', 'side' );
	add_meta_box('edition', __('Editions'),'edition_layout','essay');
	
	remove_meta_box( 'authordiv', 'essay', 'side' );
	add_meta_box('author', __('Authors'),'author_layout','essay');
	
	/*remove_meta_box( 'progressiondiv', 'essay', 'side' );
	add_meta_box('progression', __('Progressions'),'progression_layout','essay');
	
	remove_meta_box( 'sourcediv', 'essay', 'side' );
	add_meta_box('source', __('Sources'),'source_layout','essay');
	
	remove_meta_box( 'themediv', 'essay', 'side' );
	add_meta_box('theme', __('Themes'),'theme_layout','essay');
	
	remove_meta_box( 'strategydiv', 'essay', 'side' );
	add_meta_box('strategy', __('Strategies'),'strategy_layout','essay');
	
	remove_meta_box( 'assignmentdiv', 'essay', 'side' );
	add_meta_box('assignment', __('Assignments'),'assignment_layout','essay');*/
}

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

	<div class="post_edition">
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
	</div>
<?php }

function author_layout($post) {
	wp_nonce_field(__FILE__,'author_nonce');
	
	echo "Enter the Author Name:<br>";
	
	$getAuthor = wp_get_object_terms($post->ID, 'author', 'fields=names');
	$getFullAuthor = get_terms('author', 'fields=names&hide_empty=0');

	if(sizeof($getAuthor) == NULL) { ?>
		<input name="post_author" type="text" value="" />
	<?php }

	else {
		for ($loopA=0; $loopA<sizeof($getAuthor); $loopA++) { ?>
			<input name="post_author" type="text" size="20" value='<?php echo $getAuthor[$loopA]; ?>' />
	<?php	}
	}
	
	echo "<br>getAuthor[loopA]: ".$getAuthor[$loopA]."<br>";
	echo "var_dump: ". var_dump($author)."<br>";
	
	echo "POST: ".$_POST['post_author']."<br>";
}


/*
FUNCTION THAT SAVES THE INFORMATION FROM THE NEW TAXONOMY BOXES.
*/
function save_taxboxes($post_id) {
	// verify this came from our screen and with proper authorization.
 	if (!wp_verify_nonce($_POST['edition_nonce'], __FILE__) && !wp_verify_nonce($_POST['author_nonce'], __FILE__)) {
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
           $author = $_POST['post_author'];
           
           wp_set_object_terms( $post_id, $edition, 'edition' );
           wp_set_object_terms( $post_id, $author, 'author' );
   }
	return $edition;
	
	
	
 	return $author;
}

add_action('admin_menu', 'add_taxboxes');
add_action('save_post', 'save_taxboxes');