<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package sparkling
 */
?>
</div><!-- close .row -->
</div><!-- close .container -->
</div><!-- close .site-content -->

<div id="footer-area">
    <div class="container footer-inner">
        <div class="row">
            <?php get_sidebar('footer'); ?>
        </div>
    </div>

    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info container">
            <div class="footer-widget-area">
                
                    <?php dynamic_sidebar('MY_SIDE_BAR') ?>
                
            </div>
        </div><!-- .site-info -->
        <div class="scroll-to-top"><i class="fa fa-angle-up"></i></div><!-- .scroll-to-top -->
    </footer><!-- #colophon -->
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>