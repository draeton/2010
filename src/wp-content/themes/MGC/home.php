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
                <a id="minus">Back<img src="style/images/stage-directions.png" alt="Back" /></a>
                <a id="plus">Forward<img src="style/images/stage-directions.png" alt="Forward" /></a>

                <div class="slidesWrap">
                    <div class="slides">
                        <div class="slide" id="s1">
                            <blockquote class="callout">
                                <h2 class="title">PHP, Javascript, CSS, HTML, XML, SQL, JQuery, Wordpress, XHTML, Drupal...</h2>
                                <p>Either you learn someting new, every day, or you get left behind. I come armed with a bottomless satchel of tools, an onion on my belt and <a href="#about">a thirst for adventure &raquo;</a></p>
                            </blockquote>
                        </div>
                        <div class="slide" id="s2">
                            <img src="style/images/ss-hg.jpg" alt="Hantz Group" />
                            <blockquote class="callout">
                                <h2 class="title">Hantz Group (2008)</h2>
                                <p><em>Solo&mdash;Designer, Developer</em></p>
                                <p>Complete design and production of static website, with interactive enhancements using JQuery, JSON and the Google Maps API.</p>
                                <p class="textright"><a href="#project-1">Learn more &raquo;</a></p>
                            </blockquote>
                        </div>
                        <div class="slide" id="s3">
                            <img src="style/images/ss-mg.jpg" alt="Media Genesis" />
                            <blockquote class="callout">
                                <h2 class="title">Media Genesis (2010)</h2>
                                <p><em>Team&mdash;Developer</em></p>
                                <p>Front-end development and back-end programming, to develop features for a custom PHP CMS, and to fully realize the designer's vision using CSS and JQuery.</p>
                                <p class="textright"><a href="#project-2">Learn more &raquo;</a></p>
                            </blockquote>
                        </div>
                        <div class="slide" id="s4">
                            <img src="style/images/ss-cbi.jpg" alt="Creative Breakthroughs" />
                            <blockquote class="callout">
                                <h2 class="title">Creative Breakthroughs (2007)</h2>
                                <p><em>Solo&mdash;Designer, Developer</em></p>
                                <p>First full realization of a project using the Drupal open-source CMS. Complete design and development, including porting a community module from Drupal 5 to 6.</p>
                                <p class="textright"><a href="#project-3">Learn more &raquo;</a></p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- end #stage -->

    <div id="page">
        <div class="container">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

            <div class="maincol" id="sobre">

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

            <div class="maincol project" id="project-1">
                <h2 class="title pad-sides">Hantz Group (2008)</h2>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Contribution</a></h3></li>
                        <li><h3><a href="#">Screenshots</a></h3></li>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <p>CONTRIBUTION ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                        <div class="panel">
                            <p>SCREENSHOTS ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
            </div><!-- end .maincol -->

            <div class="maincol project" id="project-2">
                <h2 class="title pad-sides">Media Genesis (2010)</h2>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Contribution</a></h3></li>
                        <li><h3><a href="#">Screenshots</a></h3></li>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <p>CONTRIBUTION ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                        <div class="panel">
                            <p>SCREENSHOTS ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
            </div><!-- end .maincol -->

            <div class="maincol project" id="project-3">
                <h2 class="title pad-sides">Creative Breakthroughs (2007)</h2>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Contribution</a></h3></li>
                        <li><h3><a href="#">Screenshots</a></h3></li>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <p>CONTRIBUTION ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                        <div class="panel">
                            <p>SCREENSHOTS ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
            </div><!-- end .maincol -->

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