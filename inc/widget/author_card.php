<div class="mdx-author-c">
    <div class="lazyload-bg"></div><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
        <?php if (function_exists('get_avatar')) {
            echo get_avatar(get_the_author_meta('user_email'), 256);
        } ?></a><svg class="mdx-amask" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="40" height="200" viewBox="0 0 40 200">
        <path data-name="mdx_m1" d="M0 0c100-.25 100 0 100 0v200H0S75.62 104.19 0 0z" fill="#fff" fill-rule="evenodd" />
    </svg>
    <div class="mdx-author-info">
        <?php if (get_the_author_meta('user_url') != "") { ?>
            <h3>
                <a href="<?php echo the_author_meta('user_url'); ?>" title="<?php echo htmlspecialchars(__('访问作者网站', 'mdx')); ?>">
                    <?php echo the_author_meta('display_name'); ?></a>
            </h3>
        <?php } else { ?>
            <h3>
                <?php echo the_author_meta('display_name'); ?>
            </h3>
        <?php } ?>
        <h4>
            <?php _e('文章作者', 'mdx'); ?>
        </h4>
        <p><?php echo the_author_meta('description'); ?></p>
    </div>
</div>