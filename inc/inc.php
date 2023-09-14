<?php
require_once get_theme_file_path('/inc/framework/framework.php');
require_once get_theme_file_path('/inc/theme-setting.php');
require_once get_theme_file_path('/inc/seo/category-setting.php');
require_once get_theme_file_path('/inc/seo/tag-seo.php');
//获取主题设置
function _PZ($name, $default = false, $subname = '')
{
    static $options = null;
    if ($options === null) {
        $options = get_option('bxm_theme_setting');
    }

    if (isset($options[$name])) {
        if ($subname) {
            return isset($options[$name][$subname]) ? $options[$name][$subname] : $default;
        } else {
            return $options[$name];
        }
    }
    return $default;
}
//载入css
function mdx_css()
{
    $files_root = get_template_directory_uri();
    wp_register_style('mdx-mdui-css', $files_root . '/mdui/css/mdui.min.css', array(), '', false);
    wp_register_style('mdx-style-css', $files_root . '/style.css', array(), '', false);
    wp_enqueue_style('mdx-mdui-css');
    wp_enqueue_style('mdx-style-css');
    $theme_black = _PZ('theme_black');
    if ($theme_black != '0') {
        wp_register_style('mdx-oled', $files_root . '/css/oled.css', array(), '', false);
        wp_enqueue_style('mdx-oled');
    }
    if ($theme_black == '3') {
        wp_register_script('auto-theme-dark', get_template_directory_uri() . '/js/auto_theme_dark.min.js', array(), '', false); // true 表示放在页脚

        // 将脚本添加到 WordPress 页面中
        wp_enqueue_script('auto-theme-dark');
    }
    if (_PZ("md_2")) {
        wp_register_style('mdx-md2', $files_root . '/css/md2.css', array(), '', false);
        wp_enqueue_style('mdx-md2');
    }
    if (is_home() && _PZ('home_header') === '2') {
        wp_register_style('mdx-flickity-css', $files_root . '/css/flickity.min.css', array(), '', false);
        wp_enqueue_style('mdx-flickity-css');
    }
}
add_action('wp_enqueue_scripts', 'mdx_css');
function mdx_js()
{
    $files_root = get_template_directory_uri();
    wp_register_script('mdx_mdui_js', $files_root . '/mdui/js/mdui.min.js', false, '', true);
    wp_register_script('mdx_common', $files_root . '/js/common.js', false, '', true);
    wp_register_script('mdx_sl_js', $files_root . '/js/lazyload.js', false, '', true);
    wp_register_script('theme_js', $files_root . '/js/js.js?', false, '', true);
    wp_enqueue_script('mdx_mdui_js');
    wp_enqueue_script('mdx_common');
    wp_enqueue_script('theme_js');
    // 实时搜索
    // if (mdx_get_option("mdx_real_search") == "true") {
    //     wp_register_script('mdx_rs_js', $files_root . '/js/search.js', false, '', true);
    //     wp_enqueue_script('mdx_rs_js');
    // }
    if (is_single() || is_page()) {
        wp_register_script('mdx_qr_js', $files_root . '/js/qr.js', false, '', true);
        wp_enqueue_script('mdx_qr_js');
        // 侧边栏文章目录
        // if (mdx_get_option("mdx_toc") == "true" && is_single()) {
        //     wp_register_script('mdx_toc_js', $files_root . '/js/toc.js', false, '', true);
        //     wp_enqueue_script('mdx_toc_js');
        //     wp_localize_script('mdx_toc_js', 'mdx_show_preview', array("preview" => mdx_get_option("mdx_toc_preview")));
        // }
        // 阅读进度条
        // if (mdx_get_option("mdx_read_pro") === "true") {
        //     wp_register_script('mdx_ra_js', $files_root . '/js/ra.js', false, '', true);
        //     wp_enqueue_script('mdx_ra_js');
        // }
    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('better-comment', $files_root . '/js/better_comment.js', array(), '', true);
        wp_enqueue_script('ajax-comment', $files_root . '/ajax-comment/app.js', array(), '', true);
        // wp_enqueue_script('mdx-flickity', $files_root . '/js/flickity.min.js', array(), '', true);
        wp_localize_script('ajax-comment', 'ajaxcomment', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'order' => get_option('comment_order'),
            'formpostion' => 'top',
            'i18n_1' => __('发送成功。', 'mdx'),
            'i18n_2' => __('<strong>错误：</strong> 未知错误。', 'mdx'),
        ));
    }
    if (is_home() && _PZ('home_header') === '2') {
        wp_enqueue_script('mdx-flickity', $files_root . '/js/flickity.min.js', array(), '', true);
    }
    if ((!is_single() && !is_page() && !is_404()) && _PZ('post_list_width') === '2') {
        wp_register_script('mdx-masonry', $files_root . '/js/masonry.min.js', false, '', true);
        wp_enqueue_script('mdx-masonry');
    }
    wp_enqueue_script('mdx_sl_js');
}
add_action('wp_enqueue_scripts', 'mdx_js');
//页面浏览量
function get_post_views($post_id) {
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }
    return $count;
}
register_sidebar(
    array(
        'name' => __('右侧菜单', 'mdx'),
        'id' => 'widget_right',
        'description' => __('在每个页面的右侧，默认隐藏，可以通过滑动或按钮调出。', 'mdx'),
        'before_widget' => '<div class="mdui-card mdx-widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="mdui-card-primary"><div class="mdui-card-primary-title">',
        'after_title' => '</div></div><div class="mdui-card-content mdui-typo">'
    )
);
