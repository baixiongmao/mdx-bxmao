<?php
// 获取网站标题
$site_title = get_bloginfo('name', 'display');
//获取网站描述
$site_description = get_bloginfo('description', 'display');
$keywords = '';
$imgurl = '';
if (is_home()) {
    $title = $site_title . ' - ' . $site_description;
    $description = $site_description;
    $canonical = get_bloginfo('url');
} else {
    // 分类
    if (is_category() || is_tag() || is_tax()) {
        // 获取标签描述
        if (is_tag() || is_tax()) {
            $description = strip_tags(term_description());
            $imgurl = get_term_meta(get_queried_object_id(), 'tag_image', true);
        } elseif (is_category()) {
            $description = strip_tags(category_description());
            $imgurl = get_term_meta(get_queried_object_id(), 'category_image', true);
        }
        // 获取分类描述
        // 获取页码
        $paged = get_query_var('paged');
        if (!empty($paged)) {
            $title = single_cat_title('', false) . ' - 第' . $paged . '页 - ' . $site_title;
        } else {
            $title = single_cat_title('', false) . ' - ' . $site_title;
        }
    } else if (is_single()) {
        $title = single_post_title('', false) . ' - ' . $site_title;
        // 获取文章标签
        $tags = wp_get_post_tags($post->ID);
        // 获取文章特色图像url
        $imgurl = get_the_post_thumbnail_url($post->ID, 'full');
        // 判断是否有标签
        if ($tags) {
            foreach ($tags as $tag) {
                $keywords = $keywords . $tag->name . ',';
            }
        }
    } elseif (is_search()) {
        // 获取搜索关键字
        $searchstring = get_search_query();
        $title = $searchstring . '- 搜索 - ' . $site_title;
    } elseif (is_404()) {
        $title = '页面未找到 - ' . $site_title;
    } else {
        $title = $site_title . ' - ' . $site_description;
    }
}
$title = empty($title) ? $site_title : $title;
$description = empty($description) ? $site_description : $description;
// 获取当前页面的真实链接
$canonical = !empty($canonical) ? $canonical : get_permalink();
$body_class = is_admin_bar_showing() ? "has-admin-bar" : "";

// 全局色
$theme_color = _PZ('theme_color');
if ($theme_color == "white") {
    $body_class .= ' mdui-theme-primary-grey mdx-theme-white mdx-index-white';
} else {
    $body_class .= ' mdui-theme-primary-' . $theme_color;
}
// 强调色
$theme_color_act = _PZ('theme_skin');
$body_class .= ' mdui-theme-accent-' . $theme_color_act . ' ';
// 首页显示方式
$home_style = _PZ('home_style');
if ($home_style == 'default') {
    $home_style = '';
}
$body_class .= $home_style;
// 黑色主题
$theme_black = _PZ('theme_black');
if ($theme_black == '1') {
    $body_class .= ' mdui-theme-layout-dark mdx-always-dark';
}
if (_PZ('md_2') && _PZ('md_2_font')) {
    $body_class .= ' mdx-md2-font';
}
// 减弱动画
if (_PZ('reduce_motion')) {
    $body_class .= ' mdx-reduce-motion';
}
$home_header_type = _PZ('home_header');
// 显示幻灯片
if ($home_header_type == '2') {
    $body_class .= ' index-slide-toolbar';
}
// 文章列表宽度
if (_PZ("post_list_width") === "2") {
    $body_class .= ' mdx-wide-post-list';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <?php
    if (is_404()) {
        echo '<meta name="robots" content="noindex, nofollow">';
    } else {
        echo '<meta name="keywords" content="关键词1, 关键词2, 关键词3">
    <meta name="description" content="' . $description . '">
    <link rel="canonical" href="' . $canonical . '">
    <meta property="og:title" content="' . $title . '">
    <meta property="og:type" content="article">
    <meta property="og:url" content="' . $canonical . '">
    <meta property="og:description" content="' . $description . '">
    <meta property="og:image" content="' . $imgurl . '">';
    }
    wp_head();
    ?>
</head>


<body class="<?php echo $body_class ?>">
<?php 
// 引入‘wp-content/themes/mdx-bxmao/inc/widget/them-style/night-style.php’
get_template_part('inc/widget/them-style/night-style');
?>