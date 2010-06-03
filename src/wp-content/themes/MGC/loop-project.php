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

<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>