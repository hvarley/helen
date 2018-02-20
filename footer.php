<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package helen
 */

?>

	</div><!-- #content -->

	<footer>

		<p>Copyright  <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved</p>

		<p>
			<a href="tel:07989 323953"><i class="fa fa-phone" aria-hidden="true"></i></a>
			<a href="mailto:hvarley@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
			<a href="https://www.linkedin.com/in/helen-varley-00743314" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>

		</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
