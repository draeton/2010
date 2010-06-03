<?php
/**
 * Template Name: Home
 *
 */
?>

<?php get_header(); ?>

    <div id="stage">
        <div class="container">

            <div class="slideshow">
                <?php get_template_part( 'loop', 'project-stage' ); ?>
            </div><!-- end .slideshow -->


        </div>
    </div><!-- end #stage -->

    <div id="page">
        <div class="container">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div class="maincol post" id="sobre">

                <h1 class="title pad-sides"><?php the_title(); ?></h1>

<?php
$experience = trim(get('Experience'));
$contact = trim(get('Contact'));
?>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Synopsis</a></h3></li>
<?php if ($experience) : ?>
                        <li><h3><a href="#">Experience</a></h3></li>
<?php endif; ?>
<?php if ($contact) : ?>
                        <li><h3><a href="#">Contact</a></h3></li>
<?php endif; ?>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <?php the_content(); ?>
                            <?php edit_post_link( __( 'Edit', 'mgc' ), '<span class="edit-link">', '</span>' ); ?>
                        </div><!-- end .panel -->
<?php if ($experience) : ?>
                        <div class="panel">
                            <?php echo $experience; ?>
                        </div><!-- end .panel -->
<?php endif; ?>
<?php if ($contact) : ?>
                        <div class="panel">
                            <?php echo $contact; ?>
                        </div><!-- end .panel -->
<?php endif; ?>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
                
            </div><!-- end .maincol -->

<?php endwhile; ?>

            <div class="sidebar">
<?php if ( is_active_sidebar( 'second-sidebar-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'second-sidebar-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div><!-- end .sidebar -->

            <div class="breakout">
<?php if ( is_active_sidebar( 'first-page-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'first-page-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div><!-- end .breakout -->

            <div class="sidebar">
                <?php get_sidebar(); ?>
            </div><!-- end .sidebar -->

            <?php get_template_part( 'loop', 'project' ); ?>

            <div class="breakout">
<?php if ( is_active_sidebar( 'second-page-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'second-page-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div><!-- end .breakout -->

        </div>
    </div><!-- end #page -->

<?php get_footer(); ?>