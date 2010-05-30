<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="stage"> or <div id="page">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo bloginfo('template_url'); ?>/favicon.ico" />
    <meta name="google-site-verification" content="vFDniUFRImUkTjpkH8lU0eqM8SJPLa5oiORG4rmZcAw" />
<?php
    /* We add some JavaScript to pages with the comment form
     * to support sites with threaded comments (when in use).
     */
    if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    /* Always have wp_head() just before the closing </head>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to add elements to <head> such
     * as styles, scripts, and meta tags.
     */

    wp_head();
?>
</head>

<body <?php body_class(); ?>  id="top">

    <div id="toolbar">
        <div class="container">
            <p class="alignleft breadcrumbs pad-sides"><?php yoast_breadcrumb(); ?></p>
<?php
if ( is_user_logged_in() ) : global $current_user; get_currentuserinfo(); ?>
            <p class="alignright login pad-sides"><a href="<?php echo wp_logout_url( get_bloginfo('url') ); ?>" title="Logout">Logout</a> &bull;
                Welcome, <a href="/wp-admin/"><?php echo $current_user->display_name; ?></a>!</p>
<?php else : ?>
            <p class="alignright login pad-sides"><a href="<?php echo wp_login_url( get_bloginfo('url') ); ?>" title="Login">Login</a></p>
<?php endif; ?>
        </div>
    </div><!-- end #toolbar -->

    <div id="header" class="container">
        <a id="logo" href="<?php bloginfo('url'); ?>/" class="selected"><?php bloginfo('name'); ?>
            <img src="<?php bloginfo('template_url'); ?>/style/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
        <a id="bloglink" href="<?php bloginfo('url'); ?>/blog/">/ blog
            <img src="<?php bloginfo('template_url'); ?>/style/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" /></a>
        <?php get_search_form(); ?>
    </div><!-- end #header -->