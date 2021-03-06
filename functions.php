<?php
/**
 * helen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package helen
 */

if ( ! function_exists( 'helen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function helen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on helen, use a find and replace
		 * to change 'helen' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'helen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		function register_my_menus() {
		  register_nav_menus(
		    array(
		      'main_menu' => __( 'main menu' )
		    )
		  );
		}
		add_action( 'init', 'register_my_menus' );
				/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'helen_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'helen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function helen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'helen_content_width', 640 );
}
add_action( 'after_setup_theme', 'helen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function helen_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'helen' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'helen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'helen_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function helen_scripts() {
	wp_enqueue_style( 'helen-style', get_template_directory_uri() . '/dist/css/main.css', array(), filemtime( get_stylesheet_directory() . '/dist/css/main.css' ) );

	wp_enqueue_script( 'helen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'helen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );



	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:200,400,700', false );

	wp_register_script( 'fontawesome', 'https://use.fontawesome.com/9d77e7f046.js' );
	wp_enqueue_script( 'fontawesome' );

	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'helen-js', get_template_directory_uri() . '/js/custom.js', array(), '20170508', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'helen_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function create_post_type() {
  register_post_type( 'casestudies',
    array(
      'labels' => array(
        'name' => __( 'Case Studies' ),
        'singular_name' => __( 'Case Study' )
      ),
      'public' => true,
      'has_archive' => true,
			'supports' => array('thumbnail'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );
}
add_action( 'init', 'create_post_type' );

add_filter( 'widget_tag_cloud_args', 'change_tag_cloud_font_sizes');
/**
 * Change the Tag Cloud's Font Sizes.
 *
 * @since 1.0.0
 *
 * @param array $args
 *
 * @return array
 */
function change_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '12';
    $args['largest'] = '20';

    return $args;
}
