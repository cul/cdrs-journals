Sources Used in Article: 

<?php $mb->the_field('sources'); ?> 

<br><br> 

<?php

$getSource = wp_get_object_terms($post->ID, 'source', 'fields=names');
$getFullSource = get_terms('source', 'fields=names&hide_empty=0&orderby=id');
$getFullAlpha = get_terms('source', 'fields=names&hide_empty=0&orderby=name');

//find position of "none" in array
$none = array_search("None",$getFullAlpha);
$none = $none + 1;

//get list of sources that need to be "checked"
if (sizeof($getSource)!=0) {
	for($checkS=0; $checkS<sizeof($getSource); $checkS++) {
		if (in_array($getSource[$checkS], $getFullSource)) {
			$checkedS[] = $getSource[$checkS];
		}
	}
}
else {
	$checkedS[0] = $none;
}

//check if the values in $checkedS array are strings
for ($string=0; $string<sizeof($checkedS); $string++) {
	$stringCheck = is_string($checkedS[$string]);
}

//check if None or not a string 
// if true, None checkbox at the top already checked and then list out the rest of the sources
// else None checkbox at the top not checked and then list out the sources (with the appropriate source checked if included in $checkedS array)
if(($checkedS[0] == "None") && (sizeof($checkedS)==1) || ($stringCheck==FALSE)) {
	?><input type="checkbox" name="sourceCheck" checked="yes" value="sourceNone" /> <?php echo $getFullSource[$none]."<br>";

	for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
		if ($getFullAlpha[$loopS] == "None") {
			//do nothing
		}
		else {
			?><input type="checkbox" name="sourceCheck" value="source<?php.$loopS?>" /> <?php echo $getFullAlpha[$loopS]."<br>";
		}
	}
}
else {
	?><input type="checkbox" name="sourceCheck" value="sourceNone" /> <?php echo $getFullSource[$none]."<br>";
	
	for($loopS=0; $loopS<sizeof($getFullSource); $loopS++) {
		if (in_array($getFullAlpha[$loopS], $checkedS)) { ?>
 			<input type="checkbox" name="sourceCheck" checked="yes" value="source<?php.$loopS?>" /> <?php echo $getFullAlpha[$loopS]."<br>";
		}
		else { 
			if ($getFullAlpha[$loopS] == "None") {
				//do nothing
			}
			else { ?>
				<input type="checkbox" name="sourceCheck" value="source<?php.$loopS?>" /> <?php echo $getFullAlpha[$loopS]."<br>";
			}
		}
	}
}