<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package helen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="nav" class="<?php if ( !is_front_page() ) : ?>nav-white2<?php endif; ?>">
		<div class="container">

			<div class="nav-wrapper">
	      <div class="nav-header-logo-wrapper"><div id="logo-top" class=" <?php if ( is_front_page() ) : ?>logo<?php endif; ?> <?php if ( !is_front_page() ) : ?>logo-red2<?php endif; ?>"></div></div>
	        <div class="nav-toggle-wrapper">
	          <div for="nav-toggle" class="nav-icon nav-toggle">
	              <span></span>
	              <span></span>
	              <span></span>
	              <span></span>
	          </div>
	        </div>
	        <nav id="site-navigation" class="top-navigation" role="navigation">
	            <?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
	        </nav><!-- #site-navigation -->
				</div>
			</div>

		</div>
	</div>
