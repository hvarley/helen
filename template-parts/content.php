<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package helen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php

		if ( is_singular() ) :
			the_title( '<h1>', '</h1>' );
		else :
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			By <a href="/about-me"><?php the_author(); ?></a> | <?php the_date('F j, Y'); ?> | <?php the_category( ', ' ); ?>
		<?php
		endif; ?>

	<?php helen_post_thumbnail(); ?>

	<div class="entry-content">
	<?php

	if ( is_singular() ) :
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'helen' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'helen' ),
			'after'  => '</div>',
		) );
	else :
		the_excerpt();
	endif; ?>

	</div><!-- .entry-content -->



</article><!-- #post-<?php the_ID(); ?> -->
