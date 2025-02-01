<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

    if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
    }
?>
    <div class="page-content post-content">
        <h1><?php the_title(); ?></h1>
        <div class="postmeta"><?php the_date(); ?></div>
        <?php the_content(); ?>
    </div>
