<?php
/**
 * The template part for displaying an Author biography
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php

	if ( function_exists( 'coauthors' ) ) {

	$coauthors = get_coauthors();
	foreach( $coauthors as $coauthor ):

	echo '<div class="author-info"><div class="author-avatar">';
	echo get_avatar( $coauthor->user_email, '42' );
	echo '</div><div class="author-description"><h2 class="author-title">';

	$userdata = get_userdata( $coauthor->ID );
	if ( $userdata->display_name ) echo $userdata->display_name;

	echo '</h2><p class="author-bio">';
	if ( $userdata->user_description ) echo $userdata->user_description;

	echo '</p></div></div><br>';

	endforeach;
	} else {
	}
?>
