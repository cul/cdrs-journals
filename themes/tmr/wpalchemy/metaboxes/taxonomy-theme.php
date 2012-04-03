Theme of the Article: 

<?php $mb->the_field('themes'); ?> 

<br><br> 

<?php

$getTheme = wp_get_object_terms($post->ID, 'theme', 'fields=names');
$getFullTheme = get_terms('theme', 'fields=names&hide_empty=0');

for($checkTH=0; $checkTH<sizeof($getTheme); $checkTH++) {
	if (in_array($getTheme[$checkTH], $getFullTheme)) {
		$checkedTH = $getTheme[$checkTH];
	}
}

?>

<select>
	<?php for($loopTH=0; $loopTH<sizeof($getFullTheme); $loopTH++) {
		if ($getFullTheme[$loopTH] == $checkedTH) { ?>
 
			<option value="progression<?php.$loopTH?>" selected><?php echo $getFullTheme[$loopTH]; ?></option>
		<?php }
		else { ?>
			<option value="progression<?php.$loopTH?>"><?php echo $getFullTheme[$loopTH]; ?></option>
 
		<?php }
	} ?>
</select>