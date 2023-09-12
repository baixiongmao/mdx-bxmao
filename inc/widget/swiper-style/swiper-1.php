<div class="swiper-item swiper-slide">
<?php
// 获取当前文章对象
$post = get_post();
$thumbnail = get_the_post_thumbnail_url();
$post_time_info = _PZ('post_time_info');
$post_time = $post_time_info == '1' ? get_the_time('Y-m-d') : get_the_modified_time('Y-m-d');
$time_icon = $post_time_info == '1' ? '&#xe192;' : '&#xe3c9;';
if (empty($thumbnail)) {
    $thumbnail = _PZ('post_default_thumbnail')['url'];
}
if ($thumbnail) { ?>
    <div class="mdx-slide-bg mdx-bg-lazyload lazyload" data-bg="<?php echo  $thumbnail ?>"></div>
<?php } else { ?>
    <div class="mdx-slide-bg"></div>
<?php } ?>
<section class="mdx-slide-content">
    <h1><?php echo the_title() ?></h1>
    <div class="time-in-post-title" itemprop="datePublished">
        <i class="mdui-icon material-icons info-icon"><?php echo $time_icon ?></i> <?php echo $post_time ?>
    </div>
    <a class="mdui-btn mdui-ripple" href="<?php echo get_permalink() ?>"><?php echo __('前往阅读', 'bxm_lang') ?>
        <i class="mdui-icon material-icons">&#xe5c8;</i>
    </a>
</section>
</div>