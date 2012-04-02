Theme of the Article: 

<?php $mb->the_field('themes'); ?> 

<br><br> 

<?php

$getTopic = wp_get_object_terms($post->ID, 'theme', 'fields=names');
$getFullTopic = get_terms('theme', 'fields=names&hide_empty=0');

if(sizeof($getTheme) == NULL) {
	?>
	
	<input type="text" />
	
	<?php
}

else {

	for ($loopTh=0; $loopTh<sizeof($getTheme); $loopTh++) {
	
?>

		<input type="text" size="20" value='<?php echo $getTheme[$loopTh]; ?>'/>

<?php	

	}
}
	
?>