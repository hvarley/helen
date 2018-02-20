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
<header>
  <div class="container">
    <div class="wrapper aligned">
      <div class="box1 item1"></div>
      <div class="box1 item2">

			</div>
      <div class="box1 item3">
				<?php the_title( '<h1>', '</h1>' ); ?>

					<?php if ( have_posts() ) : ?>
		        <?php while ( have_posts() ) : the_post(); ?>
		          <?php the_content(); ?>
		        <?php endwhile; ?>
		      <?php endif; ?>

				<p class="downArrow"><a href="#case-studies"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></a></p>
			</div>
    </div>
  </div>
</header>


<div class="logo-bar">
  <?php

// check if the repeater field has rows of data
if( have_rows('icons_bar') ):

 	// loop through the rows of data
    while ( have_rows('icons_bar') ) : the_row();

        // display a sub field value
        the_sub_field('icons');

    endwhile;

else :

    // no rows found

endif;

?>

</div>

<a name="case-studies"></a>
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


<?php get_footer(); ?>

</html>
