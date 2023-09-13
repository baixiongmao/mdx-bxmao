<button class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-fab-hide scrollToTop mdui-ripple mdx-tools-up">
    <i class="mdui-icon material-icons">&#xe316;</i>
</button>
<button class="mdui-fab mdui-color-theme-accent mdui-fab-fixed mdui-ripple" mdui-drawer="{target:'#mdx-right-drawer',overlay:true,swipe:true}"><i class="mdui-icon material-icons">&#xe5c3;</i>
</button>
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
<?php

wp_footer();
?>
<script>
    var enhanced_ajax = true;
    var slideInterval = '5';
</script>