<?php flush(); ?>
<?php get_header();
$img = _PZ('home_img_ur')['url'];
?>
<div class="fullScreen sea-close"></div>
<!-- 引入inc/widget/menu-widget.php -->
<?php
get_template_part('inc/widget/menu-widget');
// 引入inc/widget/home-header.php 组件
get_template_part('inc/widget/home-header');
// 搜索框
get_template_part('inc/widget/search-box') ?>

<div class="theFirstPageBackGround mdui-color-theme"></div>

<?php
$home_style = _PZ('home_style');
if ($home_style != 'mdx-first-simple') {
    $home_header = _PZ('home_header');
    $class = 'theFirstPage';
    if ($home_header == '1') {
        $class .= ' lazyload';
    }
    echo '<div class="' . $class . '" data-bg="' . $img . '"></div>';
}
if (_PZ('home_img_text_color')) {
    echo '<div class="mdx-index-img-bg mdui-color-theme"></div>';
}
if ($home_header == '1') {
?>
    <div class="theFirstPageSay mdui-valign mdui-typo mdui-text-color-white-text">
        <h1 class="mdui-center" id="theFirstPageSayContent"><?php echo _PZ('home_header_text') ?></h1>
    </div>
    <div class="mdx-tworows-title">
        <div>
            <span class="mdui-text-color-theme">
                <?php
                // 标题栏显示内容
                $header_show = _PZ('header_show');
                switch ($header_show) {
                    case '1':
                        echo bloginfo('name');
                        break;
                    case '2':
                        // 显示logo
                        if (_PZ('header_logo')['url'] == '') {
                            echo '请设置logo';
                        } else {
                            echo '<img class="mdx-logo" src="' . _PZ('header_logo') . '">';
                        }
                        break;
                    default:
                        $header_custom_name = _PZ('header_custom_name');
                        if ($header_custom_name == '') {
                            echo '请设置站点名称';
                        } else {
                            echo _PZ('header_custom_name');
                        }
                }
                ?>
            </span>
            <br>
            <?php echo _PZ('home_header_text') ?>
        </div>
    </div>
<?php
} else {
    // 幻灯片
    $home_slide_posts_get = _PZ('home_header_slider_get');
    // 幻灯片文章
    $home_slide_posts = array();
    // 置顶文章
    if ($home_slide_posts_get == '1') {
        // 获取置顶文章的 ID 数组
        $sticky_posts = get_option('sticky_posts');

        // 如果存在置顶文章
        if (!empty($sticky_posts)) {
            // 构建查询参数
            $args = array(
                'post__in' => $sticky_posts,
                'ignore_sticky_posts' => 1, // 忽略其他非置顶文章
            );
            $query = new WP_Query($args);
        }
    } else {
        $args = array(
            'category__in' => explode(',', _PZ('home_header_slider_cat')),
            // 数量10
            'posts_per_page' => 10,
        );
        $query = new WP_Query($args);
    }
    // 首页幻灯片样式
    $home_header_slider_style = _PZ('home_header_slider_style');
?>
    <div class="theFirstPageSay mdui-typo mdx-swiper swiper-container slide-style-<?php echo $home_header_slider_style ?>">
        <div class="swiper-wrapper">
            <?php
            if ($query->have_posts()) {
                // 遍历文章列表
                while ($query->have_posts()) {
                    $query->the_post();
            ?>
                    <div class="swiper-item swiper-slide">
                <?php
                    // 文章特色图
                    $thumbnail = get_the_post_thumbnail_url();
                    if (empty($thumbnail)) {
                        $thumbnail = _PZ('post_default_thumbnail')['url'];
                    }
                    // 文章发布时间类型
                    $post_time_info = _PZ('post_time_info');
                    $post_time = $post_time_info == '1' ? get_the_time('Y-m-d') : get_the_modified_time('Y-m-d');
                    $time_icon = $post_time_info == '1' ? '&#xe192;' : '&#xe3c9;';
                    // 输出文章标题或其他信息
                    $post_swiper_html = '';
                    switch ($home_header_slider_style) {
                        case '1':
                            if ($thumbnail) {
                                $post_swiper_html .= '<div class="mdx-slide-bg mdx-bg-lazyload lazyload" data-bg="' . $thumbnail . '"></div>';
                            } else {
                                $post_swiper_html .= '<div class="mdx-slide-bg"></div>';
                            }
                            $post_swiper_html .= '<section class="mdx-slide-content"><h1>' . the_title() . '</h1>';
                            $post_swiper_html .= '<div class="time-in-post-title" itemprop="datePublished">';

                            $post_swiper_html .= '<i class="mdui-icon material-icons info-icon">' . $time_icon . '</i>' . $post_time . '</div>';
                            $post_swiper_html .= '<a class="mdui-btn mdui-ripple" href="' . get_permalink() . '">' . __('前往阅读', 'bxm_lang') . '
                                <i class="mdui-icon material-icons">&#xe5c8;</i>
                                </a>
                                </section>';
                            break;
                        case '2':
                            if ($thumbnail) {
                                $post_swiper_html .= '<div class="mdx-slide-bg mdx-bg-lazyload lazyload" data-bg="' . $thumbnail . '"></div>';
                            } else {
                                $post_swiper_html .= '<div class="mdx-slide-bg"></div>';
                            }
                            $post_swiper_html .= '<section class="mdx-slide-content">
                                <div class="slide-wrap">
                                <div class="slide-part">
                                <h1>' . the_title() . '</h1>';
                            $post_swiper_html .= '<div class="time-in-post-title" itemprop="datePublished">';
                            $post_swiper_html .= '<i class="mdui-icon material-icons info-icon">' . $time_icon . '</i>' . $post_time . '</div>';
                            if (_PZ('post_list_excerpt')) {
                                // 判断文章是否有密码
                                if (post_password_required()) {
                                    $post_swiper_html .= '<p>' . __('这篇文章受密码保护，输入密码后才能查看。', 'bxm_lang') . '</p>';
                                } else {
                                    $post_excerpt = get_the_excerpt();
                                    if (empty($post_excerpt)) {
                                        $post_swiper_html .= '<p>这篇文章没有摘要</p>';
                                    } else {
                                        $post_swiper_html .= '<p>' . $post_excerpt . '</p>';
                                    }
                                }
                            }
                            $post_swiper_html .= '</div>
                                <a class="mdui-btn mdui-ripple" href="' . get_permalink() . '"><i class="mdui-icon material-icons">&#xe5c8;</i></a>
                                </div></section>';
                            break;
                        default:
                            $post_swiper_html = '<section class="mdx-slide-content">
                                <div class="slide-wrap">
                                <div class="slide-part">
                                    <h1>' . the_title() . '</h1>
                                <div class="time-in-post-title" itemprop="datePublished"><i class="mdui-icon material-icons info-icon">' . $time_icon . '</i> ' . $post_time . '</div>
                                </div>
                                <a class="mdui-btn mdui-ripple" href="' . get_permalink() . '"><i class="mdui-icon material-icons">&#xe5c8;</i></a>
                                </div>
                                </section>';
                    }
                    echo $post_swiper_html . '</div>';
                }
                // 重置文章数据
                wp_reset_postdata();
            }
                ?>

                    </div>
                    <?php
                    if ($home_style == 'mdx-first-simple') {
                        echo '<div class="theFirstPage lazyload" data-bg="' . $img . '"></div>';
                    } elseif ($home_style == 'mdx-index-void') {
                        echo '<div class="theFirstPage lazyload" data-bg="' . $img . '"><div class="swiper-bottom-void</div>"></div>';
                    } elseif ($home_style == 'mdx-first-tworows') {
                        echo '<div class="mdui-valign" id="mdx-search-anim">
                        <i class="mdui-icon material-icons seaicon">&#xe8b6;</i>' . __('搜索什么...', 'bxm_lang') . '
                    </div>';
                    }
                    ?>
        </div>
    <?php
}
get_footer(); ?>