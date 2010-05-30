<?php
/**
 * The template for displaying the footer.
 */
?>

    <div id="footer">
        <div class="container">
            <div class="maincol">
                <div class="col-about">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                    <ul>
                        <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    </ul>
<?php endif; ?>
                </div>
                <div class="col-pages">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
                    <ul>
                        <?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    </ul>
<?php endif; ?>
                </div>
            </div>
            <div class="sidebar">
<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                </ul>
<?php endif; ?>
            </div>
            <p class="copyright">&copy; Matthew Cobbs 2010. All rights reserved. <span class="alignright"><strong><a href="#top">Back to the top!</a></strong></span></p>
        </div>
    </div><!-- end #footer -->

<?php wp_footer(); ?>

<?php if ( !is_user_logged_in() ) : ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16683389-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<?php endif; ?>
    
</body>
</html>