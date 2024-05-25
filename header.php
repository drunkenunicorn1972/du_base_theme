<?php
/**
 * The template for displaying the header
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="container">
<header class="rvr-page-header">
    <div class="rvr-top-navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'topmenu', // as registered in functions.php
                'depth' => 1, // as we set up in our CSS
                'container' => 'nav', // html wrapper of the menu ul
                'container_class' => 'rvr-top-navbar-dt', // wrapper class
                'menu_class' => 'rvr-top-menu', // classes of the menu ul tag
                'fallback_cb' => false // if primary menu is not created, then show nothing
            )
        );
        ?>
    </div>
    <div class="rvr-header-image" style="background-image:url('<?php rvr_show_header_image(get_post()); ?>');">
        <div class="rvr-header-logo" id="rvr-header-logo"><?php rvr_show_header_logo(); ?></div>
    </div>
    <div class="rvr-header-menu">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'mainmenu', // as registered in functions.php
                'depth' => 3, // as we set up in our CSS
                'container' => 'nav', // html wrapper of the menu ul
                'container_class' => 'rvr-main-navbar-dt', // wrapper class
                'menu_class' => 'rvr-main-menu', // classes of the menu ul tag
                'fallback_cb' => false // if primary menu is not created, then show nothing
            )
        );
        ?>
        <button type="button" id="rvr-mainnav-button-mb" class="navbar-open"><?php _e('Menu', 'rvrbstheme'); ?></button>
    </div>
</header>

<!-- Mobile Menu -->
<div class="rvr-mobile-menu-container">
    <button id="rvr-mainnav-button-close-mb"><?php _e('Close', 'rvrbstheme'); ?></button>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'mainmenu', // as registered in functions.php
            'depth' => 3, // as we set up in our CSS
            'menu_id' => 'rvr_mobile_menu',
            'container' => 'nav', // html wrapper of the menu ul
            'container_class' => 'nav-drill', // wrapper class
            'menu_class' => 'nav-items nav-level-1', // classes of the menu ul tag
            'fallback_cb' => false, // if primary menu is not created, then show nothing
            'walker' => new rvr_mobile_menu_walker()
        )
    );
    ?>
</div>
