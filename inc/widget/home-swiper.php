<?php

/**
 * 首页幻灯片组件
 */
// 幻灯片
$home_slide_posts_get = _PZ('home_header_slider_get');
// 幻灯片文章
$home_slide_posts = array();
$show_swiper = false;
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
        $show_swiper = true;
    }
} else {
    $args = array(
        'category__in' => explode(',', _PZ('home_header_slider_cat')),
        // 数量10
        'posts_per_page' => 10,
    );
    $query = new WP_Query($args);
    $show_swiper = true;
}
$home_header_slider_style = _PZ('home_header_slider_style');
?>
<div class="theFirstPageSay mdui-typo mdx-swiper swiper-container slide-style-<?php echo $home_header_slider_style ?>">
    <div class="swiper-wrapper">
        <?php
        if ($show_swiper && $query->have_posts()) {
            // 首页幻灯片样式

            // 遍历文章列表
            while ($query->have_posts()) :
                $query->the_post();
                switch ($home_header_slider_style) {
                    case '1':
                        include('swiper-style/swiper-1.php');
                        break;
                    case '2':
                        include('swiper-style/swiper-2.php');
                        break;
                    default:
                        include('swiper-style/swiper-3.php');
                        break;
                }
            endwhile;
            // // 重置文章数据
            // wp_reset_postdata();
        } ?>
    </div>
</div>