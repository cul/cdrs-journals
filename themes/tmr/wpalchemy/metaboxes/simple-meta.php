<div class="my_meta_control">
 
	 
 
	<label>Title</label>
 
	<p>
		<?php $mb->the_field('title'); ?>
		<input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/>
		<span>Works Cited or Work Cited</span>
	</p>
 
	<label>Content</label>
 
<p>

<?php $mb->the_field('citation'); 

 
$settings = array(
'wpautop' => true, 
'textarea_rows' => '15',
'media_buttons' => 'false',
'tinymce' => true,
'quicktags' => true
);
 


$val = html_entity_decode($mb->get_the_value() );
 
$id = $mb->get_the_name();

 wp_editor( $val,  $id , $settings );

?>

<!--
<div class="my_meta_control">	
	<div class="customEditor">
			<textarea rows="10" cols="50" name="<?php echo $id ?>" id="<?php echo $id ?>"><?php echo $val ?></textarea>
	</div>
</div>		
 
-->
		 
</p>

</div>