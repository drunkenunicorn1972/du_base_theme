<?php
/**
 * The template for displaying archive pages.
 *
 * @package rvrbstheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main">

    <header class="page-header">
        <?php
        the_archive_title( '<h1 class="entry-title">', '</h1>' );
        the_archive_description( '<p class="archive-description">', '</p>' );
        ?>
    </header>

    <div class="page-content">
        <?php
        if (have_posts()) : ?>
            <ul>
        <?php
        while ( have_posts() ) {
            the_post();
            $post_link = get_permalink();
            ?>
            <li class="post">
                <?php
                    include_once dirname(__FILE__) . "/single-post.php";
                ?>
            </li>
        <?php } echo '</ul>'; endif; ?>
    </div>

    <?php wp_link_pages(); ?>

    <?php
    global $wp_query;
    if ( $wp_query->max_num_pages > 1 ) :
        ?>
        <nav class="pagination">
            <?php /* Translators: HTML arrow */ ?>
            <div class="nav-previous"><?php next_posts_link( sprintf( __( '%s older', 'rvrbstheme' ), '<span class="meta-nav">&larr;</span>' ) ); ?></div>
            <?php /* Translators: HTML arrow */ ?>
            <div class="nav-next"><?php previous_posts_link( sprintf( __( 'newer %s', 'rvrbstheme' ), '<span class="meta-nav">&rarr;</span>' ) ); ?></div>
        </nav>
    <?php endif; ?>

</main>
