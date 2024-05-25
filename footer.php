<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<footer>
    <div class="rvr-footer-widgets">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <?php if (is_active_sidebar('rvr_footer_left')) { ?>
                        <?php dynamic_sidebar('rvr_footer_left'); ?>
                    <?php } ?>
                </div>
                <div class="col-md-4">
                    <?php if (is_active_sidebar('rvr_footer_middle')) { ?>
                        <?php dynamic_sidebar('rvr_footer_middle'); ?>
                    <?php } ?>
                </div>
                <div class="col-md-4">
                    <?php if (is_active_sidebar('rvr_footer_right')) { ?>
                        <?php dynamic_sidebar('rvr_footer_right'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="rvr-footer-legal">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="widget">Copyright &copy; <?php echo date_i18n("Y") ?> – <?php echo get_bloginfo( 'name' ); ?>.</p>
                </div>
                <div class="col-md-6">
                    <?php if (is_active_sidebar('rvr_legal_footer_right')) { ?>
                        <?php dynamic_sidebar('rvr_legal_footer_right'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
<!--rvrcheck2024-->
</body>
</html>