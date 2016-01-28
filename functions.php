<?php
/**
 * ada functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ada
 */

if ( ! function_exists( 'ada_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ada_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on ada, use a find and replace
	 * to change 'ada' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ada', get_template_directory() . '/languages' );

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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'ada_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ada_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ada_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ada_content_width', 1118 );
}
add_action( 'after_setup_theme', 'ada_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ada_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ada' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ada_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ada_enscripts() {
	wp_enqueue_style( 'ada-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ada-global', get_template_directory_uri() . '/style-global.css');
	wp_enqueue_style( 'ada-mini', get_template_directory_uri() . '/style-mini.css');
	wp_enqueue_style( 'ada-medi', get_template_directory_uri() . '/style-medi.css', array(), false, "screen and (min-width: 601px)");
	wp_enqueue_style( 'ada-maxi', get_template_directory_uri() . '/style-maxi.css', array(), false, "screen and (min-width: 1137px)");
	

	wp_enqueue_script( 'ada-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ada-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_dequeue_style( 'open-sans-web-font' );
	wp_deregister_style( 'open-sans-web-font' );
	
	
}
add_action( 'wp_enqueue_scripts', 'ada_enscripts' );




function ada_descripts(){
	wp_dequeue_style( 'open-sans-css' );
}
add_action( 'wp_dequeue_scripts', 'ada_descripts' );




function ada_excerpt_more( $more ) {
	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '… read more &#187;', 'ada' ) . '</a>';
}

add_filter( 'excerpt_more', 'ada_excerpt_more' );





/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




