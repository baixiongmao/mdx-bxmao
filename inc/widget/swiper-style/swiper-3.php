<?php
$post_time_info = _PZ('post_time_info');
$post_time = $post_time_info == '1' ? get_the_time('Y-m-d') : get_the_modified_time('Y-m-d');
$time_icon = $post_time_info == '1' ? '&#xe192;' : '&#xe3c9;';
?>
<section class="mdx-slide-content">
    <div class="slide-wrap">
        <div class="slide-part">
            <h1><?php echo the_title() ?></h1>
            <div class="time-in-post-title" itemprop="datePublished"><i class="mdui-icon material-icons info-icon"><?php echo $time_icon ?></i> <?php echo $post_time ?></div>
        </div>
        <a class="mdui-btn mdui-ripple" href="<?php echo get_permalink() ?>"><i class="mdui-icon material-icons">&#xe5c8;</i></a>
    </div>
</section>
</div>