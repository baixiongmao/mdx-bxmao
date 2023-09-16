<button class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-fab-hide scrollToTop mdui-ripple mdx-tools-up">
    <i class="mdui-icon material-icons">&#xe316;</i>
</button>
<?php
// 是否开启右侧小工具
$show_right_widget = _PZ('right_sidebar');
if ($show_right_widget) {
?>
    <button class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-ripple" mdui-drawer="{target:'#mdx-right-drawer',overlay:true,swipe:true}"><i class="mdui-icon material-icons">&#xe5c3;</i>
    </button>
<?php } ?>
<!-- 网站 GDPR -->
<?php
$show_gdpr = _PZ('cookie_agree');
if ($show_gdpr) {
    include('inc/widget/gdpr.php');
}
$footer_style = _PZ('footer_style');
$footer_class = 'foot mdui-text-center';
if ($footer_style == '2') {
    $footer_class .= ' mdx-footer-clean';
} elseif ($footer_style == '3') {
    $footer_class .= ' mdx-footer-morden';
}
?>
<footer class="<?php echo $footer_class ?>">
    <?php if ($footer_style == '1') {
        echo htmlspecialchars_decode(_PZ('footer_content'));
    ?>
    <?php } else { ?>
        <div class="mdx-clean-footer">
            <?php if ($footer_style == '2') {
                echo htmlspecialchars_decode(_PZ('footer_content'));
            } else { ?>
                <a href="<?php bloginfo('url'); ?>" class="mdx-footer-title">
                    <?php
                    $header_show = _PZ('header_show');
                    if ($header_show == '1') {
                        echo bloginfo('name');
                    } elseif ($header_show == '2') {
                        if (_PZ('header_logo')['url'] == '') {
                            echo '请设置logo';
                        } else {
                            echo '<img class="mdx-logo" src="' . _PZ('header_logo') . '">';
                        }
                    } else {
                        $header_custom_name = _PZ('header_custom_name');
                        if ($header_custom_name == '') {
                            echo '请设置站点名称';
                        } else {
                            echo _PZ('header_custom_name');
                        }
                    }
                    ?>
                </a>
                <span class="mdx-footer-content">
                    <?php echo htmlspecialchars_decode(_PZ('footer_content')); ?>
                </span>
            <?php  } ?>
        </div>
    <?php  } ?>

</footer>
</div>
<?php if ($show_right_widget) { ?>
    <div id="mdx-right-drawer" role="complementary" class="mdui-drawer mdui-drawer-right mdui-drawer-close mdui-drawer-full-height">
        <?php
        if (is_active_sidebar('widget_right')) {
            dynamic_sidebar('widget_right');
        } else {
            echo '<div class="mdx-widget-empty mdui-valign"><div><i class="mdui-icon material-icons">&#xe53c;</i><br><br>' . __('没有激活的小工具', 'bxm_lang') . '</div></div>';
        }
        ?>
    </div>
<?php } ?>
<?php

wp_footer();
if (_PZ('search_live')) { ?>
    <script>
        var tipMutiOff = '<?php echo addslashes(__('搜索功能暂时不可用。', 'bxm_lang')); ?>';
        var tipMutiOffRes = '<?php echo addslashes(__('评论功能暂时不可用。', 'bxm_lang')); ?><br><br>';
        var tipMuti = '<?php echo addslashes(__('仅显示匹配的前10条记录，要查看更多请按下回车前往搜索结果页面', 'bxm_lang')); ?>';
        var snackMuti = "<?php echo addslashes(__('无法连接到实时搜索服务', 'bxm_lang')); ?>";
        var moreMuti = '<?php echo _PZ("read_more_text"); ?>';
    </script>
<?php } ?>
<?php wp_enqueue_script('comment-reply'); ?>
<script>
    var ajax_error = "<?php echo addslashes(__("<strong>加载失败：</strong> 未知错误。", "bxm_lang")); ?>";
    var reduce_motion_i18n_1 = "<?php echo addslashes(__("检测到减弱动画模式，已为你减弱动画效果", "bxm_lang")); ?>";
    var reduce_motion_i18n_2 = "<?php echo addslashes(__("撤销", "bxm_lang")); ?>";
    var reduce_motion_i18n_3 = "<?php echo addslashes(__("减弱动画模式关闭，已启用完整动画效果", "bxm_lang")); ?>";
    var mdxPublicPath = "<?php echo get_template_directory_uri() . '/js/'; ?>";
    var cookieFlagName = "<?php echo _PZ('cookie_agree'); ?>";
    var ifscr = 0;
    <?php if (_PZ('reading_progress_record')) { ?>
        ifscr = 1;
    <?php } ?>
    var mdx_comment_ajax = 0;
    <?php if (_PZ('comment_infinite') && is_single()) { ?>
        mdx_comment_ajax = 1;
    <?php } ?>
    var mdx_imgBox = <?php echo json_encode((bool)_PZ('imgbox_bg')) ?>;
    var mdx_tapToTop = 0;
    <?php if (_PZ('header_back_top')) { ?>
        mdx_tapToTop = 1;
    <?php } ?>
</script>
<script>
    var enhanced_ajax=false;
</script>
<?php if (is_home()&&_PZ('home_header')=='2') { ?>
    <script>
        var enhanced_ajax = <?php echo json_encode((bool)_PZ('post_list_ajax'))?>;
        var slideInterval = <?php echo _PZ('home_header_slider_time') ?>;
    </script>
<?php } ?>