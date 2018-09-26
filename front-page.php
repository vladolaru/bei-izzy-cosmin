<?php
//Front Page

get_header();
?>

	<div id="primary" class="no-sidebar content-area ">
		<main id="main" class="site-front-page">

			<?php
            get_sidebar('front-page-widgets');
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
