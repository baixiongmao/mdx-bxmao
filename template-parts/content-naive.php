<?php

/**
 * 文章列表样式-朴素
 * 
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
$item_class = 'mdx-postlist-simple post-item';
// 获取文章特色图片
$imgurl = get_the_post_thumbnail_url($post->ID, 'full');
if (empty($imgurl)) {
    $imgurl = _PZ('post_default_thumbnail')['url'];
}
if (empty($imgurl)) {
    $item_class .= ' mdx-postlist-simple-has-no-img';
}
// 图片显示方式
$post_list_img_height = _PZ('post_list_img_height');
// 点击区域
$clickable_area = _PZ('post_list_clickable');
?>
<div class="<?php echo $item_class ?>">
    <?php if ($post_list_img_height == '1') { ?>
        <?php if ($clickable_area == '2') { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <img src="data:image/gif;base64,R0lGODlhAgABAIAAALGxsQAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==" data-src="<?php echo $imgurl; ?>" alt="<?php echo $imgurl; ?>" title="<?php the_title(); ?>" class="lazyload">
            <?php if ($clickable_area == '2') { ?>
            </a>
        <?php }
        } else { ?>
        <?php if ($clickable_area == '2') { ?>
            <a href="<?php the_permalink(); ?>">
            <?php } ?>
            <div class="mdx-fixed-img mdui-color-theme">
                <div class="lazyload" data-bg="<?php echo $imgurl; ?>" title="<?php the_title(); ?>">
                </div>
            </div>
            <?php if ($clickable_area == '2') { ?>
            </a>
    <?php }
        } ?>
    <div class="card-text">
        <a href="<?php the_permalink(); ?>" class="mdui-text-color-theme ainList">
            <h1><?php the_title(); ?></h1>
        </a>
        <?php if ($show_excerpt) { ?>
            <p class="ct1-p mdui-text-color-black cont2">
                <?php echo $excerpt ?>
            </p>
        <?php } ?>
        <span class="info">&nbsp;&nbsp;
            <?php
            $post_list_footer_show = _PZ('post_list_footer_show');
            if (!empty($post_list_footer_show)) {
                // 循环$post_list_footer_show数组
                foreach ($post_list_footer_show as $footer_type) {
                    switch ($footer_type) {
                        case 'views':
                            $icon = '&#xe417;';
                            $iconstr = get_post_views(get_the_ID());
                            break;
                        case 'comment':
                            $icon = '&#xe0cb;';
                            $iconstr = get_comments_number();
                            break;
                        default:
                            $icon = '&#xe192;';
                            $iconstr = get_the_time('Y-m-d');
                            break;
                    }
                    echo '<i class="mdui-icon material-icons info-icon">' . $icon . '</i>' . $iconstr . '&nbsp;&nbsp;';
                }
            } ?>
        </span>
    </div>
</div>