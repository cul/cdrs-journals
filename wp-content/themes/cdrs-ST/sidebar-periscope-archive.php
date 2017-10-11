<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<aside id="secondary" class="sidebar widget-area" role="complementary">
	
		<section id="current_per" class="widget widget_current_per">	
			<div class="per-archive-item">
			<h2 class="widget-title">Periscope Archive</h2>	

<?php
$page = get_page_by_title('Periscope Archive Sidebar');
$content = apply_filters('the_content', $page->post_content);
echo $content;
?>

			</div>
		</section>


	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
