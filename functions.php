<?php
require_once get_template_directory() . '/inc/inc.php';
// 引入fa-icon cdn
// function fa_icon_js_cdn()
// {
//     echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" crossorigin="anonymous"></script>';
// }
// add_action('wp_head', 'fa_icon_js_cdn');
function fa_icon_css_cdn(){
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" crossorigin="anonymous">';
    // 输出主题的style.css
    echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/style.css">';
}
add_action('wp_head', 'fa_icon_css_cdn');
