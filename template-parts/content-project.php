<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package izzy
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_singular() ){

		izzy_single_project();
	}

		else {

			izzy_archive_project();
		}
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'izzy' ),
			'after'  => '</div>',
		) );
		?>

        <footer class="entry-footer">
			<?php izzy_entry_footer(); ?>
        </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
