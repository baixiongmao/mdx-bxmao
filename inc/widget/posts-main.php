<main class="postList mdui-center" id="postlist">
    <?php
    // 文章显示列表样式
    $post_list_style = _PZ('post_list_style');
    $home_style = _PZ('home_header');
    $ignore_sticky = false;
    $ignore_sticky_2 = false;
    // 如果显示内容为幻灯片
    if ($home_style == '2') {
        $ignore_sticky = true;
        // 如果显示推荐文章
        if (_PZ('home_recommend')) {
            $ignore_sticky_2 = true;
        }
    }
    // if ($ignore_sticky && $ignore_sticky_2) {
    $args = array(
        // 排除置顶文章
        'ignore_sticky_posts' => 1,
        // 文章数量
        'showposts' => get_option('posts_per_page'),
        // 分页
        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            get_template_part('template-parts/content-' . $post_list_style, get_post_format());
    ?>
    <?php
        endwhile;
    endif;
    // }
    ?>

</main>
<div class="nextpage mdui-center"><?php next_posts_link(__('加载更多', 'bxm_lang')); ?> </div>