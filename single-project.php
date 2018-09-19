<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package izzy
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				//Display the custom fields here

				//Year custom field
				global $wp_query;
				$postid = $wp_query->post->ID;
				$string=str_split(get_post_meta($postid, 'year', true),4);
				$string1=str_split($string[1],2);
				$year = $string[0];
				$month =$string1[0];
				$day =$string1[1];

				echo 'Release date: '. $year. '.' . $month. '.' . $day. '.' . '<br>';
				wp_reset_query();

				//Customer custom field
				global $wp_query;
				$postid = $wp_query->post->ID;
				if( get_post_meta($postid, 'customer', true) == false)
					echo '<br>' . 'No customer for this theme yet' ;
				else
					echo '<br>' . 'Customer: '. get_post_meta($postid, 'customer', true) . '<br>';
				wp_reset_query();

				//End of the display

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
