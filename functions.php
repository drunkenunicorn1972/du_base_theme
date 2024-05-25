<?php
include_once "includes/class-rvr-mobile-menu-walker.php";
include_once "includes/theme-customizer.php";

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support( '' );

if ( !function_exists( 'rvr_theme_setup' ) ) {
    function rvr_theme_setup() {

        register_nav_menus(
            array(
                'topmenu'   =>  esc_html__( 'Top Menu', 'rvrbstheme' ),
                'mainmenu'   =>  esc_html__( 'Main Menu', 'rvrbstheme' ),
                'footermenu'   =>  esc_html__( 'Footer Menu', 'rvrbstheme' )
            )
        );
    }
}

add_action( 'after_setup_theme', 'rvr_theme_setup' );

function rvr_load_translations() {
    load_plugin_textdomain('rvrbstheme', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
}
add_action( 'plugins_loaded', 'rvr_load_translations' );

function rvr_register_widget_areas() {
    register_sidebar( array(
        'name'          => __( 'Footer left', 'rvrbstheme' ),
        'id'            => 'rvr_footer_left',
        'description'   => __( 'Top part of footer most left widget', 'rvrbstheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pp-widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer middle', 'rvrbstheme' ),
        'id'            => 'rvr_footer_middle',
        'description'   => __( 'Top part of footer middle widget', 'rvrbstheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pp-widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer right', 'rvrbstheme' ),
        'id'            => 'rvr_footer_right',
        'description'   => __( 'Top part of footer most right widget', 'rvrbstheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pp-widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Legal Footer left', 'rvrbstheme' ),
        'id'            => 'rvr_legal_footer_left',
        'description'   => __( 'Legal part of footer most left widget', 'rvrbstheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pp-widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Legal Footer right', 'rvrbstheme' ),
        'id'            => 'rvr_legal_footer_right',
        'description'   => __( 'Legal part of footer most right widget', 'rvrbstheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="pp-widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action('widgets_init', 'rvr_register_widget_areas');

function rvr_theme_assets() {

    // Enqueue CSS Files
    wp_enqueue_style( 'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css", array(), 'v5.2.3', 'all' );

    // Main CSS File
    wp_enqueue_style( 'rvrbstheme', get_template_directory_uri() . '/dist/css/style.css', array('bootstrap'), '1.1.' . date_i18n("YmdH"), 'all' );

    // Enqueue JS Files
    // Don't enqueue jQuery files it'll be loaded from WordPress when required.

    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array(), 'v5.2.3', true );
    wp_enqueue_script( 'rvrbstheme-js', get_theme_file_uri('dist/js/app.js'), array('jquery','jquery-ui-core','jquery-ui-selectmenu'), '1.1' . date_i18n("YmdH"), true );

    if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}

add_action( 'wp_enqueue_scripts', 'rvr_theme_assets', 999 );

/* Custom readmore text */

function rvr_theme__excerpt_readmore( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'rvr_theme__excerpt_readmore' );

/**
 * @return void
 */
function rvr_page_navi() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
        return;
    echo '<nav class="rvr-pagination">';
    echo paginate_links( array(
        'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var('paged') ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '&larr;',
        'next_text'    => '&rarr;',
        'type'         => 'list',
        'end_size'     => 3,
        'mid_size'     => 3
    ) );
    echo '</nav>';
} /* end page navi */


//function rvr_register_query_vars( $vars ) {
//    $vars[] = 'page_id';
//    return $vars;
//}
//add_filter( 'query_vars', 'rvr_register_query_vars' );
//
//// Register query parameters for state and city
//function rvr_register_query_param() {
//    add_rewrite_tag('%page_id%', '([^&]+)');
//}
//add_action('init', 'rvr_register_query_param' );
