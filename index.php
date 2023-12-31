<?php flush(); ?>
<?php get_header();
$class = 'body-grey1 mdx-md2-font mdx-reduce-motion  ';
$class = ' mdx-wide-post-list ';
$img = _PZ('home_img_ur')['url'];
?>
<div class="fullScreen sea-close"></div>
<!-- 引入inc/widget/menu-widget.php -->
<?php
get_template_part('inc/widget/menu-widget');
// 引入inc/widget/home-header.php 组件
get_template_part('inc/widget/home-header');
// 搜索框
get_template_part('inc/widget/search-box') ?>

<div class="theFirstPageBackGround mdui-color-theme"></div>

<?php
$home_style = _PZ('home_style');
$home_header = _PZ('home_header');
if ($home_style != 'mdx-first-simple') {
    $class = 'theFirstPage';
    if ($home_header == '1') {
        $class .= ' lazyload';
    }
    echo '<div class="' . $class . '" data-bg="' . $img . '"></div>';
}
if (_PZ('home_img_text_color')) {
    echo '<div class="mdx-index-img-bg mdui-color-theme"></div>';
}
if ($home_header == '1') {
?>
    <div class="theFirstPageSay mdui-valign mdui-typo mdui-text-color-white-text">
        <h1 class="mdui-center" id="theFirstPageSayContent"><?php echo _PZ('home_header_text') ?></h1>
    </div>
    <div class="mdx-tworows-title">
        <div>
            <span class="mdui-text-color-theme">
                <?php
                // 标题栏显示内容
                $header_show = _PZ('header_show');
                switch ($header_show) {
                    case '1':
                        echo bloginfo('name');
                        break;
                    case '2':
                        // 显示logo
                        if (_PZ('header_logo')['url'] == '') {
                            echo '请设置logo';
                        } else {
                            echo '<img class="mdx-logo" src="' . _PZ('header_logo') . '">';
                        }
                        break;
                    default:
                        $header_custom_name = _PZ('header_custom_name');
                        if ($header_custom_name == '') {
                            echo '请设置站点名称';
                        } else {
                            echo _PZ('header_custom_name');
                        }
                }
                ?>
            </span>
            <br>
            <?php echo _PZ('home_header_text') ?>
        </div>
    </div>
<?php
} else { ?>
    <!-- 引入幻灯片组件 -->
<?php
    get_template_part('inc/widget/home-swiper');
}

if ($home_style == 'mdx-first-simple') {
    echo '<div class="theFirstPage lazyload" data-bg="' . $img . '"></div>';
} elseif ($home_style == 'mdx-index-void') {
    echo '<div class="theFirstPage lazyload" data-bg="' . $img . '"><div class="swiper-bottom-void</div>"></div></div>';
}
if ($home_style == 'mdx-first-tworows') {
    echo '<div class="mdui-valign" id="mdx-search-anim">
                        <i class="mdui-icon material-icons seaicon">&#xe8b6;</i>' . __('搜索什么...', 'bxm_lang') . '
                    </div>';
}

$home_style = _PZ('home_style');


?>
<div class="main">
    <?php if (_PZ('home_style') == 'mdx-first-tworows') { ?>
        <div class="mdx-tworow-search mdui-valign" role="button">
            <i class="mdui-icon material-icons seaicon">&#xe8b6;</i> <?php _e('搜索什么...', 'mdx'); ?>
        </div>
    <?php } ?>
    <!-- 公告 STAR -->
    <?php if (_PZ('open_nitice')) {
        $nitice_class = 'mdxNotice mdui-center';
        if ($home_style != "mdx-first-simple") {
            $nitice_class .= ' mdx-notice-default';
        } else {
            $nitice_class .= ' mdui-shadow-2';
        }
    ?>
        <div class="<?php echo $nitice_class ?>"><i class="mdui-icon material-icons">&#xe7f7;</i>
            <p class="mdui-typo"><?php echo _PZ('site_nitice_text'); ?></p>
        </div>
    <?php } ?>
    <!-- 公告 END -->
    <!-- 推荐文章 STAR -->
    <?php
    if (_PZ('home_recommend')) {
        get_template_part('inc/widget/recommend-post');
    } ?>
    <!-- 推荐文章 END -->
    <!-- 首页文章标题 STAR -->
    <h3 class="mdx-all-posts">这是文章标题</h3>
    <!-- 首页文章标题 END-->
    <?php
    get_template_part('inc/widget/posts-main');
    get_footer();
    ?>