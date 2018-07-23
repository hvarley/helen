<?php
/**
 * The template for displaying posts
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package helen
 */

get_header(); ?>



	<div id="primary" class="content-area">

		<div class="title-bar" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/images/about-me-header.jpg')">
			<div class="container">
        <h1 class="entry-title">Blog</h1>
			</div>
		</div>

		<div class="container main_content">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', '' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<?php
		get_sidebar();
		?>

	</div>
	</div><!-- #primary -->

<?php

get_footer();
