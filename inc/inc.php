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
//载入css & js
function mdx_css() {
    $files_root = get_template_directory_uri();
    wp_register_style('mdx_mdui_css', $files_root.'/mdui/css/mdui.min.css', '', '');
    wp_register_style('mdx_style_css', $files_root.'/style.css', '', '');
    wp_enqueue_style('mdx_mdui_css');
    wp_enqueue_style('mdx_style_css');
    $theme_black=_PZ('theme_black');
    if ($theme_black === "1" || $theme_black === "2") {
        wp_register_style('mdx_oled', $files_root.'/css/oled.css', '', '');
        wp_enqueue_style('mdx_oled');
    }
    if (_PZ("md_2")) {
        wp_register_style('mdx_md2', $files_root.'/css/md2.css', '', '');
        wp_enqueue_style('mdx_md2');
    }
    if (is_home() && _PZ('home_header') === '2') {
        wp_register_style('mdx_flickity_css', $files_root.'/css/flickity.min.css', '', '');
        wp_enqueue_style('mdx_flickity_css');
    }
}
add_action('wp_enqueue_scripts', 'mdx_css');