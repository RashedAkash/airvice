<?php
if ( ! function_exists( 'airvice_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function airvice_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'airvice', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded  tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main-menu' => __( 'Main Menu','airvice' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'gallery', 'audio'
	) );

	remove_theme_support( 'widgets-block-editor' );

}
endif; // airvice_setup
add_action( 'after_setup_theme', 'airvice_setup' );




/**
 * Add a sidebar.
 */
function airvice_widget_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'airvice' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'Widgets in this area will be shown blog sidebar', 'airvice' ),
		'before_widget' => '<div id="%1$s" class="ablog__sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar__widget--title mb-30">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Fiiter Widget 01', 'airvice' ),
		'id'            => 'footer-widget-1',
		'description'   => __( 'Widgets in this area will be shown footer', 'airvice' ),
		'before_widget' => '<div id="%1$s" class="footer__widget mb-30 wow fadeInUp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer__widget--title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Fiiter Widget 02', 'airvice' ),
		'id'            => 'footer-widget-2',
		'description'   => __( 'Widgets in this area will be shown footer', 'airvice' ),
		'before_widget' => '<div id="%1$s" class="footer__widget mb-30  wow fadeInUp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer__widget--title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Fiiter Widget 03', 'airvice' ),
		'id'            => 'footer-widget-3',
		'description'   => __( 'Widgets in this area will be shown footer', 'airvice' ),
		'before_widget' => '<div id="%1$s" class="footer__widget mb-30 pl-30 wow fadeInUp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer__widget--title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Fiiter Widget 04', 'airvice' ),
		'id'            => 'footer-widget-4',
		'description'   => __( 'Widgets in this area will be shown footer', 'airvice' ),
		'before_widget' => '<div id="%1$s" class="footer__widget mb-30 wow fadeInUp %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="footer__widget--title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'airvice_widget_init' );




function airvice_theme_scripts() {
	
	// CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.2.3', 'all' );
	wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/venobox.min.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '8.2.2', 'all' ); // fixed
	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'icon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '8.2.2', 'all' );	
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'custom-animate', get_template_directory_uri() . '/assets/css/custom-animation.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'airvice-main', get_template_directory_uri() . '/assets/css/main.css', array(), '8.2.2', 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );



	// JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.1.3', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/venobox.min.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '5.1.3', true );	
	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.min.js', array('jquery'), '5.1.3', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery','imagesloaded'), '3.0.6', true );
	wp_enqueue_script( 'airvice-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery','isotope'), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'airvice_theme_scripts' );


include_once('inc/template-function.php');
include_once('inc/nav-walker.php');
include_once('inc/nav-walker.php');


if ( class_exists( 'Kirki' ) ) {
	function airvice_kirki() {
		include_once('inc/airvice-kirki.php');
	}
	add_action( 'after_setup_theme', 'airvice_kirki' );
}
