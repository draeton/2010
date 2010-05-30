<?php
/**
 * MGC functions and definitions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 620;

/** Tell WordPress to run mgc_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'mgc_setup' );

if ( ! function_exists( 'mgc_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails, navigation menus, and automatic feed links.
 * @uses add_editor_style() To style the visual editor.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function mgc_setup() {

    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // set post thumbnail sizes for various post types
    set_post_thumbnail_size( 100, 100, true );
    add_image_size( 'project-feature', 940, 310 ); // Permalink thumbnail size

}
endif;


/*
 * Enqueue scripts and styles
 */
function mgc_enqueue_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js', null, null, true);
        wp_enqueue_script('jquery.validate', 'http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.scrollto', get_bloginfo('template_url').'/scripts/jquery.scrollTo-1.4.2-min.js', array('jquery'), null, true);
        wp_enqueue_script('jquery.localscroll', get_bloginfo('template_url').'/scripts/jquery.localscroll-1.2.7-min.js', array('jquery', 'jquery.scrollto'), null, true);

        wp_enqueue_script('cufon', get_bloginfo('template_url').'/scripts/cufon-yui.js', null, null, true);
        wp_enqueue_script('chunk', get_bloginfo('template_url').'/style/fonts/ChunkFive_400.font.js', array('cufon'), null, true);

        wp_enqueue_script('mgc.main', get_bloginfo('template_url').'/scripts/MGC.main.js', array('jquery', 'jquery.validate', 'jquery.scrollto', 'jquery.localscroll'), null, true);
        wp_enqueue_script('mgc', get_bloginfo('template_url').'/scripts/MGC.js', array('jquery', 'cufon', 'mgc.main'), null, true);
    }
}
/** Register with the init hook */
add_action('init', 'mgc_enqueue_init');


/*
 * Contact Form 7 style & script deregistration
 */
function deregister_cf7_js() {
    if ( !is_page('contact') ) {
        wp_deregister_script( 'contact-form-7' );
    }
}
add_action( 'wp_print_scripts', 'deregister_cf7_js', 100 );

function deregister_ct7_styles() {
    wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'deregister_ct7_styles', 100 );


/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 */
function mgc_widgets_init() {

    // Area 1, located in the sidebar. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Sidebar Widget Area', 'mgc' ),
        'id' => 'first-sidebar-widget-area',
        'description' => __( 'The first sidebar widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widget-title title">',
        'after_title' => '</h2>',
    ) );

    // Area 2, located in the page. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Sidebar Widget Area', 'mgc' ),
        'id' => 'second-sidebar-widget-area',
        'description' => __( 'The second sidebar widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widget-title title">',
        'after_title' => '</h2>',
    ) );

    // Area 3, located in the page. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Page Widget Area', 'mgc' ),
        'id' => 'first-page-widget-area',
        'description' => __( 'The first page widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>',
    ) );

    // Area 4, located in the page. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Page Widget Area', 'mgc' ),
        'id' => 'second-page-widget-area',
        'description' => __( 'The second page widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>',
    ) );

    // Area 5, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area', 'mgc' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>',
    ) );

    // Area 6, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area', 'mgc' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>',
    ) );

    // Area 7, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area', 'mgc' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'mgc' ),
        'before_widget' => '<li id="%1$s" class="widget widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title title">',
        'after_title' => '</h3>',
    ) );

}
/** Register sidebars by running mgc_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'mgc_widgets_init' );