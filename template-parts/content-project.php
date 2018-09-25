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
	?>
    <header class="entry-header">
		<?php
		izzy_project_slider();
		echo '<br>';
		the_title( '<h1 class="entry-title title-project" align="center">', '</h1>' );

		//Display the gallery slider of the specific project
		?>
    </header><!-- .entry-header -->
	<?php
	//Display the details of the project

	izzy_project_details();

	//End of the display
	?>

    <!--        Display project content-->
    <div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'izzy' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>

    </div><!-- .entry-content -->
	<?php
	}
	else{
		the_title( '<h2 class="entry-title" align="center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		the_post_thumbnail( 'medium', [ 'class' => 'project-archive-thumbnail' ] );
		?>
        <div class="details-block">
        <?php
        izzy_project_details();
        izzy_custom_excerpt( 25 );
        ?>
            <div class="continue-reading">
                <a href=" <?php echo esc_url( get_permalink() ) ?>" rel="bookmark">Continue Reading</a>
            </div>
        </div>
		<?php }
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'izzy' ),
			'after'  => '</div>',
		) );
		?>

    <footer class="entry-footer">
		<?php izzy_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
