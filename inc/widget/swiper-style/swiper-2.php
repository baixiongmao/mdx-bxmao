<?php
$post = get_post();
$thumbnail = get_the_post_thumbnail_url();
$post_time_info = _PZ('post_time_info');
$post_time = $post_time_info == '1' ? get_the_time('Y-m-d') : get_the_modified_time('Y-m-d');
$time_icon = $post_time_info == '1' ? '&#xe192;' : '&#xe3c9;';
if ($thumbnail) { ?>
    <div class="mdx-slide-bg mdx-bg-lazyload lazyload" data-bg="' . $thumbnail . '"></div>
<?php } else { ?>
    <div class="mdx-slide-bg"></div>
<?php } ?>
<section class="mdx-slide-content">
    <div class="slide-wrap">
        <div class="slide-part">
            <h1><?php echo the_title() ?></h1>
            <div class="time-in-post-title" itemprop="datePublished">
                <i class="mdui-icon material-icons info-icon"><?php echo $time_icon ?></i><?php echo $post_time ?>
            </div>
            <?php
            if (_PZ('post_list_excerpt')) {
                // 判断文章是否有密码
                if (post_password_required()) { ?>
                    <p><?php echo __('这篇文章受密码保护，输入密码后才能查看。', 'bxm_lang') ?></p>
                    <?php } else {
                    $post_excerpt = get_the_excerpt();
                    if (empty($post_excerpt)) { ?>
                        <p>这篇文章没有摘要</p>
                    <?php } else { ?>
                        <p><?php echo $post_excerpt ?></p>
            <?php }
                }
            } ?>
        </div>
        <a class="mdui-btn mdui-ripple" href="<?php echo get_permalink() ?>"><i class="mdui-icon material-icons">&#xe5c8;</i></a>
    </div>
</section>
</div>