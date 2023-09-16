<?php 
/**
 * 文章列表样式-列表
 * @package bxm
 */
$show_excerpt = _PZ('post_list_excerpt');
if ($show_excerpt) {
    // 文章摘要
    if (post_password_required()) {
        $excerpt = _e('这篇文章受密码保护，输入密码才能看哦', 'bxm_lang');
    }else{
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = _e("这篇文章没有摘要", 'bxm_lang');
        } else {
            $excerpt = wp_trim_words($excerpt, 100);
        }
    }
}
?>
<div class="mdui-card postDiv mdui-center mdui-hoverable post-item">
    <div class="mdui-card-actions">
        <a href="<?php the_permalink(); ?>" class="mdui-text-color-theme ainList">
            <h1><?php the_title(); ?></h1>
        </a>
        <?php if ($show_excerpt) { ?>
            <p class="ct1-p mdui-text-color-black cont2">
                <?php echo $excerpt ?>
            </p>
        <?php } ?>
        <div class="mdui-divider underline"></div>

        <span class="info">&nbsp;&nbsp;
            <?php
            $post_list_footer_show = _PZ('post_list_footer_show');
            if (!empty($post_list_footer_show)) {
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
            }

            ?>
        </span>
        <a class="mdui-btn mdui-ripple mdui-ripple-white coun-read mdui-text-color-theme-accent" href="<?php the_permalink(); ?>">查看文章</a>
    </div>
</div>