<?php

/**
 * 文章列表样式-干净
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
$post_list_img_height = _PZ('post_list_img_height');
if (!empty($imgurl)) { ?>
    <div class="mdui-card postDiv mdui-center mdui-hoverable post-item">
        <div class="mdui-card-media mdui-color-theme">
            <?php
            $clickable_area = _PZ('post_list_clickable');
            if ($clickable_area == '1'){
                ?>
                <a href="<?php the_permalink() ?>">
                <?php
            }
            // 文章列表图片高度
            
            if ($post_list_img_height == '1') { ?>
                <img src="data:image/gif;base64,R0lGODlhAgABAIAAALGxsQAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==" data-src="<?php echo $imgurl ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="LazyLoadList mdui-color-theme mdui-text-color-theme lazyload">
            <?php } else { ?>
                <div class="post_list_t_img lazyload mdui-color-theme" data-bg="<?php echo $imgurl ?>" title="<?php the_title(); ?>"></div>
            <?php } ?>
            <div class="mdui-card-media-covered mdui-card-media-covered-gradient">
                <div class="mdui-card-primary">
                    <?php if ($clickable_area == '1') { ?><a href="<?php the_permalink(); ?>">
                        <?php } ?>
                        <div class="mdui-card-primary-title">
                            <?php the_title(); ?>
                        </div>
                        <?php if ($clickable_area == '1') { ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <?php if ($clickable_area === '2') : echo '</a>';
            endif; ?>
        </div>
        <div class="mdui-card-actions">
            <?php if ($show_excerpt) { ?>
                <p><?php echo $excerpt ?></p>
                <div class="mdui-divider underline"></div>
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
            <a class="mdui-btn mdui-ripple mdui-ripple-white coun-read mdui-text-color-theme-accent" href="<?php the_permalink(); ?>">查看详情</a>
        </div>
    </div>
<?php } else { ?>
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
                    // 循环$post_list_footer_show数组
                    foreach ($post_list_footer_show as $footer_type) {
                        switch ($footer_type) {
                            case 'views':
                                $icon = '&#xe417;';
                                $iconstr = get_post_views(get_the_ID());
                                break;
                            case 'comment':
                                $icon = '&#xe0b9;';
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
            <a class="mdui-btn mdui-ripple mdui-ripple-white coun-read mdui-text-color-theme-accent" href="<?php the_permalink(); ?>">查看详情</a>
        </div>
    </div>
<?php } ?>