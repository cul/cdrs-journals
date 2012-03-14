Select an Assignment: 

<?php $mb->the_field('assignments'); ?> 

<br><br> 

<?php

$getAssignment = wp_get_object_terms($post->ID, 'assignment', 'fields=names');
$getFullAssignment = get_terms('assignment', 'fields=names&hide_empty=0');

for($checkA=0; $checkA<sizeof($getAssignment); $checkA++) {
	if (in_array($getAssignment[$checkA], $getFullAssignment)) {
		$checkedA = $getAssignment[$checkA];
	}
}

?>

<select>
	<?php for($loopA=0; $loopA<sizeof($getFullAssignment); $loopA++) {
		if ($getFullAssignment[$loopA] == $checkedA) { ?>
			<option value="edition<?php.$loopA if()?>" selected><?php echo "$getFullAssignment[$loopA]"; ?></option>
		<?php }
		else { ?>
			<option value="edition<?php.$loopA if()?>"><?php echo "$getFullAssignment[$loopA]"; ?></option>
		<?php }
	} ?>
</select>