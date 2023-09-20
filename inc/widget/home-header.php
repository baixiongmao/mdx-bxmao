<?php

/**
 * 头部组件
 */
$header_auto_hide = _PZ('header_auto_hide');
$appbar_class='titleBarGobal mdui-appbar mdui-shadow-0';
if(_PZ('header_auto_hide')){
    $appbar_class.=' mdui-appbar-scroll-hide';
}
$appbar_class.=' mdui-text-color-white-text titleBarinAc';
$toolbar_class='mdui-toolbar';
if(is_home()){
    $toolbar_class.=' mdui-toolbar-self topBarAni';
}else{
    $toolbar_class.=' mdui-appbar-fixed mdui-color-theme';

}
?>
<header role="banner">
    <div class="<?php echo $appbar_class?>" id="titleBar">
        <div class="<?php echo $toolbar_class;?>">
            <button class="mdui-btn mdui-btn-icon" id="menu" mdui-drawer="{target:'#left-drawer',overlay:true <?php echo ',swipe:true'; ?>}">
                <i class="mdui-icon material-icons">menu</i>
            </button>
            <a class="mdui-typo-headline" href="<?php bloginfo('url'); ?>">
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
                ?>
                </a>
            <div class="mdui-toolbar-spacer"></div>
            <button class="mdui-btn mdui-btn-icon seai"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
        </div>
    </div>
</header>