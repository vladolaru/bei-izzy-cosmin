<?php
/**
 * The template for displaying archive post page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package izzy
 */

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

			<?php if ( have_posts() ) { ?>

                <header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
                </header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) {
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );

				}

				the_posts_navigation();
			}

			else { ?>
                    <header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					echo "<p>". esc_html("No posts are here anymore, either a problem appeared or they were deleted, please try another category!", 'izzy') . "</p>";
					?>
                </header><!-- .page-header -->
			<?php	}
			?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
