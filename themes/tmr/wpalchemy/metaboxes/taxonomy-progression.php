Select the progression: 

<?php $mb->the_field('progressions'); ?> 

<br><br> 

<?php

$getProgression = wp_get_object_terms($post->ID, 'progression', 'fields=names');
$getFullProgression = get_terms('progression', 'fields=names&hide_empty=0');

for($checkP=0; $checkP<sizeof($getProgression); $checkP++) {
	if (in_array($getProgression[$checkP], $getFullProgression)) {
		$checkedP = $getProgression[$checkP];
	}
}

?>

<select>
	<?php for($loopP=0; $loopP<sizeof($getFullProgression); $loopP++) {
		if ($getFullProgression[$loopP] == $checkedP) { ?>
			<option value="progression<?php.$loopP ?>" selected><?php echo "$getFullProgression[$loopP]"; ?></option>
		<?php }
		else { ?>
			<option value="progression<?php.$loopE ?>"><?php echo "$getFullProgression[$loopP]"; ?></option>
		<?php }
	} ?>
</select>