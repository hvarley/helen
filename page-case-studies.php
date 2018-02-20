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

		<div class="title-bar" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/images/case-studies-header-grey.jpg')">

			<div class="container">
				<div class="entry-title"><h1 class="entry-title">Case Studies</h1></div>
			</div>
		</div>

		<div class="container">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-page', get_post_type() );


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


		</div>

		<div class="wrapper2">
		  <?php
		  	$args = array( 'post_type' => 'casestudies', 'posts_per_page' => 20 );
		  	$loop = new WP_Query( $args );
		  		if ( $loop->have_posts() ) : while($loop->have_posts()) : $loop->the_post();
		      ?>

		      <?php

		      $image = get_field('background_image');

		      if( !empty($image) ): ?>

		      <div class="box one" style="background-image: url('<?php echo $image['url']; ?>')">

		      <?php endif; ?>

		      <?php

		      $logo = get_field('logo');

		      if( !empty($logo) ): ?>

				    <img src="<?php echo $logo['url']; ?>">

		      <?php endif; ?>

				<a href="<?php the_permalink(); ?>">
					<div class="overlay">
						<?php the_field('intro'); ?>
					</div>
				</a>
			</div>

		<?php endwhile;
			wp_reset_postdata();?>
		<?php endif; ?>

</div>

		<?php get_footer(); ?>

</html>
