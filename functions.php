<?php
require_once get_template_directory() . '/inc/inc.php';
function fa_icon_css_cdn(){
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/v4-shims.min.css" crossorigin="anonymous">';
    // 输出主题的style.css
}
add_action('wp_head', 'fa_icon_css_cdn');