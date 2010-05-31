<?php
/**
 * The loop that displays project excerpts for the stage.
 */
?>

<?php query_posts('category_name=Project&showposts=-1'); ?>

<?php if (have_posts()) : ?>

<?php /* Display navigation to next/previous projects when applicable */ ?>
<?php if ( $wp_query->post_count >= 1 ) : ?>
                <a id="minus">Back<img src="<?php bloginfo('template_url'); ?>/style/images/stage-directions.png" alt="Back" /></a>
                <a id="plus">Forward<img src="<?php bloginfo('template_url'); ?>/style/images/stage-directions.png" alt="Forward" /></a>
<?php endif; ?>

                <div class="slidesWrap">
                    <div class="slides">
                        <div class="slide" id="s0">
                            <blockquote class="callout">
                                <h2 class="title">PHP, Javascript, CSS, HTML, XML, SQL, JQuery, Wordpress, XHTML, Drupal...</h2>
                                <p>Either you learn someting new, every day, or you get left behind. I come armed with a bottomless satchel of tools, an onion on my belt and <a href="#sobre">a thirst for adventure &raquo;</a></p>
                            </blockquote>
                        </div>

<?php while (have_posts()) : the_post(); ?>

<?php
$team = get('Team') ? "Team" : "Solo";
?>

                        <div class="slide" id="s<?php the_ID(); ?>">
                            <?php the_post_thumbnail('project-feature'); ?>
                            <blockquote class="callout">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <p><em><?php echo $team; ?>&mdash;<?php echo get_the_term_list( $post->ID, 'Role', '', ', ', '' ); ?></em></p>
                                <p><?php the_excerpt(); ?></p>
                                <p class="textright"><a href="#project-<?php the_ID(); ?>">Learn more &raquo;</a></p>
                            </blockquote>
                        </div>

<?php endwhile; endif; ?>

                    </div><!-- end .slides -->
                </div><!-- end .slidesWrap -->

<?php wp_reset_query(); ?>