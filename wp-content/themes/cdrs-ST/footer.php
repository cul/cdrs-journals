<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<!--
		<div id="signupbox">
			<span class="signup-text">Submit a Proposal to Social Text</span>

		</div>--><!-- #signupbox -->

		</div><!-- .site-content -->



	</div><!-- .site-inner -->

	<div id="footer-container" class="clear">
	<div class="site-inner">
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'depth'          => 1,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						) );
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>

			<div class="site-info">
				<div class="site-copy">
				<?php
					/**
					 * Fires before the twentysixteen footer text for footer customization.
					 *
					 * @since Twenty Sixteen 1.0
					 */
					do_action( 'twentysixteen_credits' );
				?>
				<span class="site-title">&copy; <a href="<?php echo esc_url( home_url( '|' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> Collective</a></span>
				<?php echo date("Y"); ?>
				</div>
				<div class="site-footer-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'footer_one' ) ); ?>
				</div>
			</div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
	</div><!-- #footer-container -->
</div><!-- .site -->

<?php wp_footer(); ?>

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(
['_setAccount', 'UA-27720752-7'],
['_trackPageview'],
['aggregate._setAccount', 'UA-27720752-4'],
['aggregate._trackPageview']
);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</body>
</html>
