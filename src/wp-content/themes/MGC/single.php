<?php
/**
 * Single post template
 */
?>

<?php get_header(); ?>

    <div id="page">
        <div class="container">

<?php get_template_part( 'loop', 'index' ); ?>

        </div>
    </div><!-- end #page -->

<?php get_footer(); ?>