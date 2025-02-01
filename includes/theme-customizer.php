<?php
add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {
    $wp_customize->add_section( 'rvr_header_style' , array(
        'title'      => 'Header Style',
        'priority'   => 20,
    ) );

    $wp_customize->add_setting( 'rvr_header_logo' , array(
        'default'     => '/images/my-logo.png',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rvr_header_logo', array(
        'label'        => 'Header logo',
        'section'    => 'rvr_header_style',
        'settings'   => 'rvr_header_logo',
    ) ) );

    $wp_customize->add_setting( 'rvr_header_image' , array(
        'default'     => '/images/header-image.jpg',
        'transport'   => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rvr_header_image', array(
        'label'        => 'Header image',
        'section'    => 'rvr_header_style',
        'settings'   => 'rvr_header_image',
    ) ) );


}

function rvr_show_header_logo() {
    if( get_theme_mod( 'rvr_header_logo', 'show' ) !== 'show' ) {
        echo "<a href='/'><img src='" . get_theme_mod( 'rvr_header_logo', 'no logo found' ) . "' class='rvr_header_logo_image'></a>";
    }
}

function rvr_show_header_image($post) {

    $image_url = get_the_post_thumbnail_url($post->id);
    if ($image_url !== false) {
        echo $image_url;
    } else {
        if (get_theme_mod('rvr_header_image', 'show') !== 'show') {
            echo get_theme_mod('rvr_header_image', 'no image found');
        }
    }
}