Author of the Article:

<?php $mb->the_field('authors'); ?> 

<br><br> 

<?php

$getAuthor = wp_get_object_terms($post->ID, 'author', 'fields=names');
$getFullAuthor = get_terms('author', 'fields=names&hide_empty=0');

if(sizeof($getAuthor) == NULL) {
	?>
	
	<input type="text" />
	
	<?php
}

else {

	for ($loopA=0; $loopA<sizeof($getAuthor); $loopA++) {
	
?>

		<input type="text" size="20" value='<?php echo $getAuthor[$loopA]; ?>' />

<?php	

	}
}
	
?>