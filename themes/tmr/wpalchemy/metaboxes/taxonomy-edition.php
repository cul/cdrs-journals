<div class="my_meta_control">
 
EDITION TEST

<?php $mb->the_field('editions'); 

$getEdition = get_the_terms($post->ID, 'edition');
//var_dump($getEdition);

?> <br><br> <?php

$getEdition = wp_get_object_terms($post->ID, 'edition', 'fields=names');
$getFullEdition = get_terms('edition', 'fields=names');

for($checkE=0; $checkE<sizeof($getEdition); $checkE++) {
	if (in_array($getEdition[$checkE], $getFullEdition)) {
		$checkedE = $getEdition[$checkE];
	}
}

?>

<select>
	<?php for($loopE=0; $loopE<sizeof($getFullEdition); $loopE++) {
		if ($getFullEdition[$loopE] == $checkedE) { ?>
			<option value="edition<?php.$loopE if()?>" selected><?php echo "$getFullEdition[$loopE]"; ?></option>
		<?php }
		else { ?>
			<option value="edition<?php.$loopE if()?>"><?php echo "$getFullEdition[$loopE]"; ?></option>
		<?php }
	} ?>
</select>

<?php

/*$editionList = array();

for($loopE=0; $loopE<sizeof($getFullEdition); $loopE++) {
	$editionList[$loopE] = $getFullEdition[$loopE][$stdClass->name];
}

echo "$stdClass->name";

echo "<br><br>edition list: ".var_dump($editionList);*/



?>

<?php /* 
$getTerms = get_the_terms( $post->ID, 'author' );
var_dump($getTerms);

?> <br><br> <?php

$getAuthors = get_terms('author');
var_dump($getAuthors);

?> <br><br> <?php

$getEdition = get_the_terms($post->ID, 'edition');
var_dump($getEdition);

?> <br><br> <?php

$getProgression = get_the_terms($post->ID, 'progression');
var_dump($getProgression);

?> <br><br> <?php

$getSources = get_the_terms($post->ID, 'source');
var_dump($getSources);

?> <br><br> <?php

$getTopic = get_the_terms($post->ID, 'topic');
var_dump($getTopic);

?> <br><br> <?php

$getStrategy = get_the_terms($post->ID, 'strategy');
var_dump($getStrategy);

?> <br><br> <?php

$getAssignment = get_the_terms($post->ID, 'assignment');
var_dump($getAssignment);
*/

$product_terms = wp_get_object_terms($post->ID, 'edition');

if(!empty($product_terms)){
  if(!is_wp_error( $product_terms )){
     
    foreach($product_terms as $term){
            echo '<span class="edition-link">Edition: <a href="'.get_term_link($term->slug, 'edition').'">
            '.$term->name.'</a></span>'; 

    }
  
  }
}


?>

</div>