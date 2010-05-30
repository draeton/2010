<?php
/**
 * The main template file.
 */
?>

<?php get_header(); ?>

    <div id="page">
        <div class="container">

            <div class="maincol" id="about">
                <h1 class="title pad-sides">Todo Sobre Mi Background</h1>

                <div class="tabsPanel">
                    <ul class="tabs">
                        <li class="selected"><h3><a href="#">Synopsis</a></h3></li>
                        <li><h3><a href="#">Experience</a></h3></li>
                        <li><h3><a href="#">Contact</a></h3></li>
                    </ul>
                    <div class="panelsWrap">
                        <div class="panel">
                            <p>SYNOPSIS ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                        <div class="panel">
                            <p>EXPERIENCE ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                        <div class="panel">
                            <p>CONTACT ipsum dolorv sit amet, consectetur adipiscing elit. Nulla nec malesuada dolor. Sed feugiat varius vestibulum. Duis at est justo, vel imperdiet tortor. <a href="#">Aliquam erat volutpat</a>. Praesent a accumsan est. Nullam elit ligula, lobortis eget volutpat ut, vestibulum ut libero. Aliquam erat volutpat. Sed eu mi sit amet odio tempor volutpat et in enim. In hac habitasse platea dictumst. Cras in enim nulla, vel consectetur nibh. Nunc luctus pulvinar nunc, sit amet varius massa pulvinar eget. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                            <p>Proin massa nunc, faucibus pellentesque laoreet quis, vehicula sed ligula. Nulla facilisi. Nulla sagittis, nisl vel tempor euismod, mauris mauris blandit eros, id interdum quam enim sed felis. <a href="#">Phasellus condimentum</a> ultricies enim, ac tempus ante rutrum eget. Nulla a malesuada orci. Curabitur a quam congue purus ultrices pellentesque sed id quam. Praesent elementum tempor sem, at venenatis erat aliquam quis. Etiam mattis volutpat arcu in convallis. </p>
                            <p>Mauris egestas dapibus massa vel placerat. Fusce lacus odio, tincidunt nec consectetur non, hendrerit vitae nisi. In hac habitasse platea dictumst. </p>
                        </div>
                    </div>
                </div>

                <p class="pad-sides textright"><strong><a href="#top">Back to the top!</a></strong></p>
            </div><!-- end .maincol -->

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