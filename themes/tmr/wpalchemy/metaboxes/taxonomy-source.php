Sources Used in Article: 

<?php $mb->the_field('sources'); ?> 

<br><br> 

<?php

$getSource = wp_get_object_terms($post->ID, 'source', 'fields=names');
$getFullSource = get_terms('source', 'fields=names&hide_empty=0');

if(sizeof($getSource) == NULL) {
	?>
	
	<input type="text" />
	
	<?php
}

else {

	for ($loopS=0; $loopS<sizeof($getSource); $loopS++) {
	
?>

		<input type="text" size="80" value='<?php echo $getSource[$loopS]; ?>'/>

<?php	

	}
}
	
?>