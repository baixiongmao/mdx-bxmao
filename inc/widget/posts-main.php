
<main class="postList mdui-center" id="postlist">
    <?php
    // 文章显示列表样式
    $post_list_style = _PZ('post_list_style');
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content-' . $post_list_style, get_post_format());
        endwhile;
    endif;
    ?>
</main>
<div class="nextpage mdui-center"><?php next_posts_link(_PZ('read_more_text')); ?> </div>
