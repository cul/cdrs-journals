Sources Used in Article: 

<?php $mb->the_field('sources'); ?> 

<br><br> 

<?php

$getSource = wp_get_object_terms($post->ID, 'source', 'fields=names');
$getFullSource = get_terms('source', 'fields=names&hide_empty=0&orderby=id');
$getFullAlpha = get_terms('source', 'fields=names&hide_empty=0&orderby=name');

if (sizeof($getSource)!=0) {
	for($checkS=0; $checkS<sizeof($getSource); $checkS++) {
		if (in_array($getSource[$checkS], $getFullSource)) {
			$checkedS[] = $getSource[$checkS];
		}
	}
}
else {
	$checkedS = $getFullSource[3];
}

for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
		if ($getFullAlpha[$loopS] == $checkedS) { ?>
 			<input type="checkbox" name="sourceCheck" checked="yes" value="source<?php.$loopS?>" /> <?php echo $getFullAlpha[$loopS]."<br>";
		}
		else { ?>
			<input type="checkbox" name="sourceCheck" value="source<?php.$loopS?>" /> <?php echo $getFullAlpha[$loopS]."<br>";
		}
} ?>


