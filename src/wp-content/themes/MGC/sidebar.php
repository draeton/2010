<?php
/**
 * The Sidebar containing the primary widget area.
 */
?>

<ul>

<?php if ( ! dynamic_sidebar( 'first-sidebar-widget-area' ) ) : ?>

    <li id="archives" class="widget widget-container">
        <h2 class="title widget-title"><?php _e( 'Archives', 'twentyten' ); ?></h2>
        <ul>
            <?php wp_get_archives( 'type=monthly' ); ?>
        </ul>
    </li>

<?php endif; ?>

</ul>