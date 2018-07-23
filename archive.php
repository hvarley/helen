<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package helen
 */

get_header(); ?>


<div id="primary" class="content-area">
	<?php
	if ( have_posts() ) : ?>

	<div class="title-bar" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/images/about-me-header.jpg')">
		<div class="container">

			<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>

		</div>
	</div>

	<div class="container main_content">
	<main id="main" class="site-main">

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', get_post_format() );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

	</main><!-- #main -->

	<?php
	get_sidebar();
	?>

</div>
</div><!-- #primary -->

<?php

get_footer();
