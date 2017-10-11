<div>
  <div>



	<h2 class="content-list-title entry-title"> 
		<?php if ($currentTopic[show_link]) { ?><a href="<?php echo $currentTopic[link]; ?>" title="<?php echo 'View all posts filed under ' . $currentTopic[title]; ?>"><?php } ?>
                   <?php echo $currentTopic[title]; ?>
               <?php if ($currentTopic[show_link]) { ?> </a><?php } ?>
	</h2> 
  </div>
  <div style="float:right;">
        <?php if($currentTopic[title]) { ?>
		<span class="st_sharethis" st_title='<?php echo $currentTopic[title]; ?>' st_url='<?php echo $currentTopic[link] ?>' displayText="ShareThis"></span>
        <?php } ?>
  </div>
</div>

	<?php if($currentTopic[thmb_src]) { ?>

		<?php if ($currentTopic[show_link]) { ?><a href="<?php echo $currentTopic[link] ?>"><?php } ?>
                   <img src="<?php echo $currentTopic[thmb_src]; ?>" class="periscope_topic_cover_img" />
                <?php if ($currentTopic[show_link]) { ?></a><?php } ?>

        <?php } ?>
                                    
	<div class="periscope_topic_description_box">
		<?php  echo stripslashes($currentTopic[description]); ?>
	</div>

        <?php if ($currentTopic[articles_count]) { ?>
        <div class="periscope_more_links">
		<a href="<?php echo $currentTopic[link] ?>" rel="bookmark" title="Link to <?php echo $currentTopic[title]; ?>">Browse this Periscope (<?php echo $currentTopic[articles_count]; ?> Articles)</a>
        </div>
	<?php } ?>

