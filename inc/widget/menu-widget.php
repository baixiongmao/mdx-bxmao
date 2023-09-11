
<?php
/**
 * @package bxm
 * @subpackage bxm-mao
 * @since bxm-mao 1.0
 * @version 1.0
 * @description 侧边栏
 */
// 侧边栏顶部图片
$drawer_top_img = _PZ('drawer_top_img')['url'];
// 侧边栏顶部显示内容
$header_show_type=_PZ('header_show');
// 黑色主题显示方式
$theme_black=_PZ('theme_black');

?>
<div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="left-drawer">
    <?php
    if (mdx_get_option('mdx_side_info') == 'true') {;
    ?>
        <div class="sideImg mdui-color-theme">
            <div class="mdx-side-lazyload lazyload" data-bg="
            <?php
            echo $drawer_top_img;
            ?>">
            </div>
            <?php
            if ($theme_black=='3') {
            ?>
                <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php echo addslashes(__('切换日间/夜间模式', 'mdx')); ?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
            <?php
            }
            if (mdx_get_option('mdx_side_head') != '') {;
            ?>
                <div class="side-info-head mdui-shadow-3 lazyload" data-bg="
                <?php
                echo mdx_get_option('mdx_side_head');
                ?>
                "></div>
            <?php
            }
            ?>
            <div class="side-info-more">
                <?php
                echo mdx_get_option('mdx_side_name');
                ?>
                <br><span class="side-info-oth">
                    <?php
                    echo mdx_get_option('mdx_side_more');
                    ?>
                </span>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="mdx-side-title">
            <a href="
            <?php
            bloginfo('url');
            ?>
             "><span>
                    <?php
                    $mdx_logo_way = mdx_get_option('mdx_logo_way');
                    if ($mdx_logo_way == "2") {
                        $mdx_logo = mdx_get_option('mdx_logo');
                        if ($mdx_logo != "") {
                            echo '<img class="mdx-logo" src="' . $mdx_logo . '">';
                        } else {
                            bloginfo('name');
                        }
                    } elseif ($mdx_logo_way == "1") {
                        bloginfo('name');
                    } elseif ($mdx_logo_way == "3") {
                        $mdx_logo_text = mdx_get_option('mdx_logo_text');
                        if ($mdx_logo_text != "") {
                            echo $mdx_logo_text;
                        } else {
                            bloginfo('name');
                        }
                    }
                    ?>
                </span></a>
            <?php
            if (mdx_get_option('mdx_night_style') !== 'false' && mdx_get_option('mdx_styles_dark') == 'disable') {
            ?>
                <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php echo addslashes(__('切换日间/夜间模式', 'mdx')); ?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
            <?php } ?>
        </div>
    <?php } ?>
    <nav role="navigation">
        <?php
        wp_nav_menu(array('theme_location' => 'mdx_menu', 'menu' => 'mdx_menu', 'depth' => 2, 'container' => false, 'menu_class' => 'mdui-list', 'menu_id' => 'mdx_menu'));
        ?></nav>
</div>