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
<?php if (have_posts()) : ?>
  <div class="theFirstPageSmall mdui-valign mdui-typo mdui-text-color-white-text mdui-color-theme">
    <h1 class="mdui-center mdui-text-center">
      <?php the_search_query(); ?><br>
      <small>
        <?php _e('搜索结果', 'bxm_lang'); ?>
      </small>
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
  <?php else : ?>
    <div class="theFirstPageSmall mdui-valign mdui-typo mdui-text-color-white-text mdui-color-theme">
      <h1 class="mdui-center mdui-text-center"><?php the_search_query(); ?><br><small><?php _e('搜索结果', 'bxm_lang'); ?></small></h1>
    </div>
    <div class="main-in-other">
      <main class="postList mdui-center" id="postlist">
        <i class="mdui-icon material-icons mdui-center mdx-search-empty">&#xe880;</i>
        <h1 class="mdui-center mdx-search-empty-text mdx-search-empty-title"><?php _e('这里似乎空空如也', 'bxm_lang'); ?></h1>
        <h2 class="mdui-center mdx-search-empty-text mdx-search-empty-end"><?php _e('什么也没找到，换个词搜索试试？', 'bxm_lang'); ?></h2>
      </main>
    <?php endif; ?>
    <?php get_footer(); ?>
    body > div.main > div.mdui-hoverable.nextpage2
    /html/body/div[5]/div
    /html/body/div[5]/div
    document.querySelector("body > div.main-in-other > div")
    document.querySelector("body > div.main-in-other > div")