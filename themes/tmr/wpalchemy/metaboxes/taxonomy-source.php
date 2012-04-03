Sources Used in Article: 

<?php $mb->the_field('sources'); ?> 

<br><br> 

<?php

$getSource = wp_get_object_terms($post->ID, 'source', 'fields=names');
$getFullSource = get_terms('source', 'fields=names&hide_empty=0');

for($checkS=0; $checkS<sizeof($getSource); $checkS++) {
	if (in_array($getSource[$checkS], $getFullSource)) {
		$checkedS = $getSource[$checkS];
	}
}

?>

<select>
	<?php for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
		if ($getFullSource[$loopS] == $checkedS) { ?>
 
			<option value="progression<?php.$loopS?>" selected><?php echo $getFullSource[$loopS]; ?></option>
		<?php }
		else { ?>
			<option value="progression<?php.$loopS?>"><?php echo $getFullSource[$loopS]; ?></option>
 
		<?php }
	} ?>
</select>