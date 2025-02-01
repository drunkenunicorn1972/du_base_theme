<?php
    if (has_post_thumbnail()) {
        $image_url = get_the_post_thumbnail_url();
    } else {
        $image_url = null;
    }

    $post_link = get_permalink();

    ?>
    <article class="rvr-post-item">
        <a href="<?php echo $post_link ?>">
            <?php if (!is_null($image_url)): ?>
                <div class="inner-container-top" style="background-image: url(<?php echo $image_url ?>)"></div>
            <?php else: ?>
                <div class="inner-container-top"></div>
            <?php endif; ?>
            <div class="inner-container-bottom">
                <div class="post-title"><?php echo get_the_title(); ?></div>
                <div class="post-date"><wvicon class="icon-calendar"></wvicon> <?php echo get_the_date(); ?></div>
                <div class="post-description"><?php echo get_the_excerpt(); ?></div>
                <div class="post-button"><wvicon class="icon-arrow-right-circle"></wvicon></div>
            </div>
        </a>
    </article>
