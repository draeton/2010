<?php
/**
 * The loop that displays projects.
 */
?>

<?php query_posts('category_name=Project&showposts=-1'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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
            </div><!-- end .maincol -->

<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>