<?php
/**
 * The template for displaying all pages
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
				<h1 class="page-title"></h1>
			</div>
		</div>

		<div class="container main_content">
		<main id="main" class="site-main">

			<h1>Oops! That page can't be found.</h1>

			</main><!-- #main -->


		</div>
		</div><!-- #primary -->

	<?php

	get_footer();
