<?php get_header() ?>

<div class="fullScreen sea-close"></div>

<?php
// 页面加载进度条
if (_PZ('page_loading')) { ?>
    <div class="mdui-progress mdui-color-white">
        <div class="mdui-progress-indeterminate"></div>
    </div>
<?php } ?>
<?php
// 页面加载进度条end
// 主内容STAR
// 侧边栏
get_template_part('inc/widget/menu-widget');
// 引入inc/widget/home-header.php 组件
get_template_part('inc/widget/home-header');
// 搜索框
get_template_part('inc/widget/search-box');
$post_header_class = 'mdui-text-color-white-text mdui-color-theme mdui-typo-display-2 mdui-valign PostTitle';
// 文章特色图
$post_thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
if (empty($post_thumbnail_url)) {
    $imgurl = _PZ('post_default_thumbnail')['url'];
}
if (empty($post_thumbnail_url)) {
    $post_header_class .= ' mdx-pni-t0';
}
$post_time_type = _PZ('post_time');
if ($post_time_type == '1') {
    $post_header_class .= ' date-in-title';
}
?>


<!-- 文章标题STAR-->
<div class="<?php echo $post_header_class ?>" itemprop="name headline" itemtype="http://schema.org/BlogPosting">
    <h1 class="mdui-typo-display-2 mdui-center"><?php the_title(); ?></h1>
    <?php if ($post_time_type == '1') { ?>
        <div class="time-in-post-title" itemprop="datePublished">
            <?php if (_PZ('post_time_info') == "1") { ?>
                <i class="mdui-icon material-icons info-icon">&#xe192;</i>
            <?php the_time('Y-m-d');
            } else { ?><i class="mdui-icon material-icons info-icon">&#xe3c9;</i>
            <?php the_modified_time('Y-m-d');
            } ?>
        </div>
    <?php } ?>
</div>
<!-- 文章标题END -->
<div class="PostTitleFill mdui-color-theme"></div>
<div class="<?php if (_PZ('right_sidebar')) {
                echo 'mdx-tools-up-in ';
            } ?>PostMain
    <?php if ($post_thumbnail_url == "") {
        echo ' mdx-pni-am0';
    } ?>
    <?php if ($post_time_type == '1') {
        echo ' date-in-title-post';
    } ?>">
    <div class="ArtMain0 mdui-center mdui-shadow-12">
        <?php if ($post_thumbnail_url != "") { ?>
            <img class="PostMainImg0" alt="<?php the_title(); ?>" src="<?php echo $post_thumbnail_url; ?>">
        <?php } else { ?>
            <div class="mdx-post-no-img-fill"></div>
        <?php } ?>
        <article class="<?php
                        $post_classes = get_post_class();
                        echo implode(' ', $post_classes)
                        ?> mdui-typo" id="post-<?php the_ID(); ?>" itemprop="articleBody">
            <?php while (have_posts()) : the_post();
                the_content(); ?>
        </article>
        <!-- 赞赏二维码-删除 -->
        <?php
                // 引入页末组件
                get_template_part('inc/widget/single/single-footer');
                // 广告组件
                get_template_part('inc/widget/single/single-ad');
                get_template_part('inc/widget/single/single-spanout');
        ?>
    </div>
<?php endwhile; ?>
<?php if (_PZ('post_author_info')) {
    get_template_part("inc/widget/author_card");
}
if (_PZ('post_footer_recommend')) {
    // include_once("includes/same_posts.php");
}
comments_template(); ?>
</div>
<?php
// get_template_part('includes/toggleposts') 
?>
<div id="indic"></div>


<div class="mdx-share-img" id="mdx-share-img">
    <div class="mdx-si-head mdui-color-theme" <?php
                                                if ($post_thumbnail_url != "") {
                                                    echo 'style="background-image:linear-gradient(to bottom, rgba(0,0,0,0) 45%,rgba(0,0,0,0.7) 100%),url(' . $full_image_url[0] . ');"';
                                                } ?>>
        <p>
            <?php $header_show = _PZ('header_show');
            if ($mdx_logo_way == "2") {
                $header_logo = _PZ('header_logo')['url'];
                if ($mdx_logo != "") {
                    echo '<img class="mdx-logo" src="' . $header_logo . '">';
                } else {
                    '请设置logo';
                }
            } elseif ($mdx_logo_way == "1") {
                bloginfo('name');
            } elseif ($mdx_logo_way == "3") {
                $header_custom_name = _PZ('header_custom_name');
                if ($header_custom_name != "") {
                    echo $header_custom_name;
                } else {
                    '请设置自定义名称';
                }
            } ?>
        </p>
        <span><?php the_title(); ?></span>
    </div>
    <div class="mdx-si-sum"><?php if (!post_password_required()) {
                                // 输出文章摘要
                                if (has_excerpt()) {
                                    echo get_the_excerpt();
                                }
                            } else {
                                echo "这篇文章受密码保护，前往原文输入密码后才能查看。";
                            } ?></div>
    <div class="mdx-si-box"><span><?php _e('扫描二维码继续阅读', 'bxm_lang'); ?></span>
        <div class="mdx-si-qr" id="mdx-si-qr"></div>
    </div>
    <div class="mdx-si-time"><?php the_time('Y-m-d'); ?></div>
</div>
<?php get_footer(); ?>