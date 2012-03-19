Strategy of the Article: 

<?php $mb->the_field('strategies'); ?> 

<br><br> 

<?php

$getStrategy = wp_get_object_terms($post->ID, 'strategy', 'fields=names');
$getFullStrategy = get_terms('strategy', 'fields=names&hide_empty=0');

if(sizeof($getStrategy) == NULL) {
	?>
	
	<input type="text" />
	
	<?php
}

else {

	for ($loopS=0; $loopS<sizeof($getStrategy); $loopS++) {
	
?>

		<input type="text" size="20" value='<?php echo $getStrategy[$loopS]; ?>'/>

<?php	

	}
}
	
?>