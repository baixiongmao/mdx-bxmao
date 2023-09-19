<?php

/**
 * @package bxm
 * @subpackage bxm-mao
 * @since bxm-mao 1.0
 * @version 1.0
 * @description 侧边栏
 */

// 侧边栏顶部显示内容
$header_show_type = _PZ('header_show');
// 黑色主题显示方式
$theme_black = _PZ('theme_black');

?>
<div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="left-drawer">
    <?php
    if (_PZ('drawer_show_info')) {;
    ?>
        <div class="sideImg mdui-color-theme">
            <!-- 顶部图片 -->
            <div class="mdx-side-lazyload lazyload" data-bg="<?php echo _PZ('drawer_top_img')['url']; ?>"></div>
            <!-- 顶部图片 -->
            <?php
            if ($theme_black == '3') {
            ?>
                <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php echo __('切换日间/夜间模式', 'bxm_lang') ?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
            <?php
            } ?>
            <!-- 头像-->
            <?php if (_PZ('drawer_top_avatar')['url'] != '') {; ?>
                <div class="side-info-head mdui-shadow-3 lazyload" data-bg="<?php echo _PZ('drawer_top_avatar')['url']; ?>"></div>
            <?php } ?>
            <!-- 头像end -->
            <!-- 菜单名称 -->
            <div class="side-info-more"><?php echo _PZ('drawer_info_name'); ?><br>
                <span class="side-info-oth"><?php echo _PZ('drawer_info_detail'); ?></span>
            </div>
            <!-- 菜单名称 end -->
        </div>
    <?php
    } else {
    ?>
        <div class="mdx-side-title">
            <a href="<?php bloginfo('url'); ?>">
                <span>
                    <?php
                    $header_show_type = _PZ('header_show');
                    switch ($header_show_type) {
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
                    ?></span></a>
            <?php
            if ($theme_black == '3') {
            ?>
                <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php echo addslashes(__('切换日间/夜间模式', 'mdx')); ?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
            <?php } ?>
        </div>
    <?php } ?>
    <nav role="navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'sidebar_menu',
                'menu' => 'mdx_menu',
                'depth' => 2,
                'container' => false,
                'menu_class' => 'mdui-list',
                'menu_id' => 'mdx_menu',
            ),
        );
        ?></nav>
</div>