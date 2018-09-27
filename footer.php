<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package izzy
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
<!--            <div class="bottomMenu">-->
                <nav id="site-navigation-3" class="third-navigation">
                    <button class="menu-toggle" aria-controls="third-menu" aria-expanded="false"><?php esc_html_e( 'Third Menu', 'izzy' ); ?></button>
		            <?php
		            wp_nav_menu( array(
			            'theme_location' => 'menu-3',
			            'menu_id'        => 'third-menu',
		            ) );
		            ?>
                </nav><!-- #site-navigation-3 -->
<!--            </div>-->


			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'izzy' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'izzy' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'izzy' ), 'izzy', '<a href="http://underscores.me/">Cosmin Burloiu</a>' );
				?>
		</div><!-- .site-info -->

		<?php get_sidebar('footer');?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
