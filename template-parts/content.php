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
	if ( is_singular() ) {

		izzy_single_post();

	} else {
		izzy_archive_post();
	}
	?>
</article><!-- #post-<?php the_ID(); ?>-->
