<?php

/**
 * 文章列表样式-网格
 * @package bxm
 */
$show_excerpt = _PZ('post_list_excerpt');
if ($show_excerpt) {
    // 文章摘要
    if (post_password_required()) {
        $excerpt = _e('这篇文章受密码保护，输入密码才能看哦', 'bxm_lang');
    } else {
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = _e("这篇文章没有摘要", 'bxm_lang');
        } else {
            $excerpt = wp_trim_words($excerpt, 100);
        }
    }
}
// 获取文章特色图片
$imgurl = get_the_post_thumbnail_url($post->ID, 'full');
if (empty($imgurl)) {
    $imgurl = _PZ('post_default_thumbnail')['url'];
}
$clickable_area = _PZ('post_list_clickable');
if (empty($imgurl)) { ?>
    <article class="mdui-grid-tile indexgaid mdui-shadow-3 mdui-color-theme post-item">
        <?php if ($clickable_area == '2') { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <div class="mdui-grid-tile-actions mdui-grid-tile-actions-gradient">
                <div class="mdui-grid-tile-text">
                    <?php
                    if ($clickable_area == '2') : echo '<a  class="gaid-a" href="' . the_permalink() . '">';
                    endif;
                    if ($clickable_area == '1') { ?>
                        <a href="<?php the_permalink(); ?>" class="gaid-a">
                        <?php } ?>
                        <div class="mdui-grid-tile-title">
                            <?php the_title(); ?>
                        </div>
                        <?php if ($clickable_area == '1') { ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php if ($clickable_area == '2') { ?>
            </a>
        <?php } ?>
    </article>
<?php } else { ?>
    <article class="mdui-grid-tile indexgaid mdui-shadow-3 mdui-color-theme post-item">
        <?php if ($clickable_area == '2') { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <div class="divimg lazyload" data-bg="<?php echo $imgurl ?>"></div>
            <div class="mdui-grid-tile-actions mdui-grid-tile-actions-gradient">
                <div class="mdui-grid-tile-text">
                    <?php if ($clickable_area == '1') { ?>
                        <a href="<?php the_permalink(); ?>" class="gaid-a">
                        <?php } ?><div class="mdui-grid-tile-title">
                            <?php the_title(); ?>
                        </div>
                        <?php if ($clickable_area == '1') { ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php if ($clickable_area == '2') { ?>
            </a>
        <?php } ?>
    </article>

<?php } ?>