<?php
/**
 * The main loop
 */
?>

<?php $i = 0; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); $i++; ?>

<?php if (in_category('3')) : // projects ?>

<?php
$panels = get_group('Panels');
?>

            <div class="maincol project post" id="project-<?php the_ID(); ?>">
                <h2 class="title pad-sides"><?php the_title(); ?></h2>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Contribution</a></h3></li>
<?php foreach ($panels as $panel) : ?>
                        <li><h3><a href="#"><?php echo $panel['Panel_Title'][1]; ?></a></h3></li>
<?php endforeach; ?>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <?php the_content(); ?>
                        </div>
<?php foreach ($panels as $panel) : ?>
                        <div class="panel">
                            <?php echo $panel['Panel_Content'][1]; ?>
                        </div>
<?php endforeach; ?>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
            </div><!-- end .maincol -->

<?php else : // not projects ?>

            <div class="maincol post" id="post-<?php the_ID(); ?>">

                <h2 class="title pad-sides"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="pad-sides">
                    <?php the_content('Read more&hellip;'); ?>
                </div>

            </div><!-- end .maincol -->

<?php endif; ?>

<?php if ($i == 1) : ?>

            <div class="sidebar">
<?php if ( is_active_sidebar( 'second-sidebar-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'second-sidebar-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div><!-- end .sidebar -->

<?php elseif ($i == 3) : ?>

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

<?php endif; ?>

<?php endwhile; endif; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
            <div id="nav-below" class="maincol navigation">
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
            </div><!-- #nav-below -->
<?php endif; ?>

            <div class="breakout">
<?php if ( is_active_sidebar( 'second-page-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'second-page-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div><!-- end .breakout -->