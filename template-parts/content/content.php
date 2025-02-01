<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
    $page_title = get_the_title();
    if ($page_title == "Unbenannt") {
        $page_title = false;
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if ( is_singular() && $page_title ) : ?>
            <?php the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); ?>
        <?php else : ?>
            <?php if ($page_title) : ?>
                <?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <?php endif; ?>
        <?php endif; ?>
        <?php rvr_bs_theme_post_thumbnail(); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content(
            rvr_bs_theme_continue_reading_text()
        );

        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'rvrbstheme' ) . '">',
                'after'    => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__( 'Page %', 'rvrbstheme' ),
            )
        );

        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        <?php rvr_bs_theme_entry_meta_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
