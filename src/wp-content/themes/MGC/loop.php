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
                <h2 class="title pad-sides"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

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

                <div class="pad-sides">
                    <p class="post-meta">
                        <?php if ( count( get_the_category() ) ) : ?>
                        <span class="cat-links">
                                <span class="entry-utility-prep entry-utility-prep-cat-links"><?php printf( __('Posted in %s', 'twentyten' ), '</span> ' . get_the_category_list( ', ' ) ); ?>
                        </span>
                        <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <?php
                        $tags_list = get_the_tag_list( '', ', ' );
                        if ( $tags_list ):
                        ?>
                        <span class="tag-links">
                            <span class="entry-utility-prep entry-utility-prep-tag-links"><?php printf( __('Tagged %s', 'twentyten'), '</span> ' . $tags_list ); ?>
                        </span>
                        <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
                        <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

                        <a href="#top" class="top title">Top</a>
                    </p>
                </div>

<?php if (is_single()) : ?>
               <?php comments_template( '', true ); ?>
<?php endif; ?>
                
            </div><!-- end .maincol -->

<?php else : // not projects ?>

            <div class="maincol post" id="post-<?php the_ID(); ?>">

                <h2 class="title pad-sides"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <div class="pad-sides">
                    <?php the_content('Read more&hellip;'); ?>
                </div>

                <div class="pad-sides">
                    <p class="post-meta">
                        <?php if ( count( get_the_category() ) ) : ?>
                        <span class="cat-links">
                                <span class="entry-utility-prep entry-utility-prep-cat-links"><?php printf( __('Posted in %s', 'twentyten' ), '</span> ' . get_the_category_list( ', ' ) ); ?>
                        </span>
                        <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <?php
                        $tags_list = get_the_tag_list( '', ', ' );
                        if ( $tags_list ):
                        ?>
                        <span class="tag-links">
                            <span class="entry-utility-prep entry-utility-prep-tag-links"><?php printf( __('Tagged %s', 'twentyten'), '</span> ' . $tags_list ); ?>
                        </span>
                        <span class="meta-sep">|</span>
                        <?php endif; ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
                        <?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>

                        <a href="#top" class="top title">Top</a>
                    </p>
                </div>

<?php if (is_single()) : ?>
               <?php comments_template( '', true ); ?>
<?php endif; ?>

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