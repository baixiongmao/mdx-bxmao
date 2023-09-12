<?php

/**
 * 推荐文章组件
 */
$hot_post_class = 'mdx-hot-posts mdui-center';
$home_style = _PZ('home_style');
if ($home_style == 'mdx-first-simple') {
    $hot_post_class .= ' mdui-shadow-2';
}
//获取最新的10篇文章
$array = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'ignore_sticky_posts' => true
);
$posts = new WP_Query($array);
// 判断文章是否为空
if ($posts->have_posts()) {
?>

    <div class="<?php echo $hot_post_class ?>">
        <h3>推荐文章<i class="mdui-icon material-icons mdui-text-color-theme-accent">&#xe5c8;</i></h3>
        <div class="mdx-hp-h3-fill"></div>
        <div id="mdx-sp-out-c">
            <div class="mdx-hp-g-l"></div>
            <div class="mdx-hp-g-r"></div>
            <div class="mdx-posts-may-related mdx-ul">
                <!-- 推荐文章区域 STAR-->
                <?php
                while ($posts->have_posts()) {
                    $posts->the_post();
                    $thumbnail = get_the_post_thumbnail_url();
                    if (empty($thumbnail)) {
                        $thumbnail = _PZ('post_default_thumbnail')['url'];
                    }
                ?>
                    <a href="<?php echo get_permalink() ?>" rel="bookmark" title="<?php echo the_title() ?>">
                        <div class="mdx-li mdui-card mdui-color-theme mdui-hoverable">
                            <div class="lazyload mdx-hot-posts-lazyload" data-bg="<?php echo $thumbnail ?>">
                            </div>
                            <span <?php if ($thumbnail != '') echo 'class="mdx-same-posts-img"' ?>><?php echo the_title() ?></span>
                            <i class="mdui-icon material-icons <?php if ($thumbnail != '') echo 'mdx-same-posts-img' ?>" title=""><?php echo __('前往阅读', 'bxm_lang') ?>&#xe5c8;</i>
                            <div class="mdx-sp-fill<?php if ($thumbnail == '') echo ' mdx-hot-posts-have-img' ?>"></div>
                        </div>
                    </a>
                <?php
                }
                ?>
                <!-- 推荐文章区域 END-->
            </div>
        </div>
    </div>
<?php } ?>