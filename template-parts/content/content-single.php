<?php
/**
 * Template part for displaying posts
 *
 * @package WordPress
 * @subpackage RVR_Bootstrap_2024
 */
$current_post_type = get_post_type();
?>

    <?php if ($current_post_type !== 'page'): ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-header alignwide">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <?php //rvr_bs_theme_post_thumbnail(); ?>
            </div><!-- .entry-header -->
    <?php else: ?>
        <div id="<?php echo $current_post_type . '-' . get_the_ID(); ?>" <?php post_class(); ?>>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        the_content();

        if ($current_post_type !== 'page'):
            wp_link_pages(
                array(
                    'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'rvrbstheme' ) . '">',
                    'after'    => '</nav>',
                    /* translators: %: Page number. */
                    'pagelink' => esc_html__( 'Page %', 'rvrbstheme' ),
                )
            );
        endif;
        ?>
    </div><!-- .entry-content -->

    <?php if ($current_post_type !== 'page'): ?>
        <div class="entry-footer default-max-width">
            <?php rvr_bs_theme_entry_meta_footer(); ?>
        </div><!-- .entry-footer -->

        <?php if ( ! is_singular( 'attachment' ) ) : ?>
            <?php get_template_part( 'template-parts/post/author-bio' ); ?>
        <?php endif; ?>
        </article><!-- #post-<?php the_ID(); ?> -->
    <?php else: ?>
        </div>
    <?php endif; ?>
