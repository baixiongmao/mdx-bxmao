<?php flush(); ?>
<?php get_header(); ?>
<div class="fullScreen sea-close"></div>
<?php
// 侧边栏
get_template_part('inc/widget/menu-widget');
// 引入inc/widget/home-header.php 组件
get_template_part('inc/widget/home-header');
// 搜索框
get_template_part('inc/widget/search-box'); ?>
<div class="theFirstPageSmall mdui-valign mdui-typo mdui-text-color-white-text mdui-color-theme">
  <h1 class="mdui-center mdui-text-center"><?php single_cat_title('', true); ?><br><small>
      <?php if (category_description() != "") {
        echo category_description();
      } else {
        _e('文章归档', 'bxm_lang');
      } ?></small>
  </h1>
</div>
<div class="main-in-other">
  <main class="postList mdui-center" id="postlist">
    <?php
    $post_list_style = _PZ('post_list_style');
    while (have_posts()) : the_post();
      get_template_part('template-parts/content-' . $post_list_style, get_post_format());
    endwhile;
    ?>
  </main>
  <div class="nextpage mdui-center"><?php next_posts_link(_PZ('read_more_text')); ?>
  </div>
  <?php get_footer(); ?>