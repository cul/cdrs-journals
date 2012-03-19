Select the Edition: 

<?php $mb->the_field('editions'); ?> 

<br><br> 

<?php

$getEdition = wp_get_object_terms($post->ID, 'edition', 'fields=names');
$getFullEdition = get_terms('edition', 'fields=names&hide_empty=0');

for($checkE=0; $checkE<sizeof($getEdition); $checkE++) {
	if (in_array($getEdition[$checkE], $getFullEdition)) {
		$checkedE = $getEdition[$checkE];
	}
}

?>

<select>
	<?php for($loopE=0; $loopE<sizeof($getFullEdition); $loopE++) {
		if ($getFullEdition[$loopE] == $checkedE) { ?>
<<<<<<< HEAD
			<option value="edition<?php.$loopE  ?>" selected><?php echo "$getFullEdition[$loopE]"; ?></option>
		<?php }
		else { ?>
			<option value="edition<?php.$loopE ?>"><?php echo "$getFullEdition[$loopE]"; ?></option>
=======
			<option value="edition<?php.$loopE?>" selected><?php echo $getFullEdition[$loopE]; ?></option>
		<?php }
		else { ?>
			<option value="edition<?php.$loopE?>"><?php echo $getFullEdition[$loopE]; ?></option>
>>>>>>> dee42723254fcc49c539c5869aa12823ae9b0597
		<?php }
	} ?>
</select>