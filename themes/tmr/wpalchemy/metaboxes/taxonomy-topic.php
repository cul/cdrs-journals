Topic of the Article: 

<?php $mb->the_field('topics'); ?> 

<br><br> 

<?php

$getTopic = wp_get_object_terms($post->ID, 'topic', 'fields=names');
$getFullTopic = get_terms('topic', 'fields=names&hide_empty=0');

if(sizeof($getTopic) == NULL) {
	?>
	
	<input type="text" />
	
	<?php
}

else {

	for ($loopT=0; $loopT<sizeof($getTopic); $loopT++) {
	
?>

		<input type="text" size="20" value='<?php echo $getTopic[$loopT]; ?>'/>

<?php	

	}
}
	
?>