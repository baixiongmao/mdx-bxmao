<?php

/**
 * 首页主要内容组件
 */
$nitice_class = 'mdxNotice mdui-center';
$home_style = _PZ('home_style');
if ($home_style != "mdx-first-simple") {
    $nitice_class .= ' mdx-notice-default';
} else {
    $nitice_class .= ' mdui-shadow-2';
}

?>
<div class="main">
    <?php if (_PZ('home_style') == 'mdx-first-tworows') { ?>
        <div class="mdx-tworow-search mdui-valign" role="button">
            <i class="mdui-icon material-icons seaicon">&#xe8b6;</i> <?php _e('搜索什么...', 'mdx'); ?>
        </div>
    <?php } ?>
    <!-- 公告 STAR -->
    <div class="<?php echo $nitice_class ?>"><i class="mdui-icon material-icons">&#xe7f7;</i>
        <p class="mdui-typo">这是公告</p>
    </div>
    <!-- 公告 END -->
    <!-- 推荐文章 STAR -->
    <?php include('recommend-post.php') ?>
    <!-- 推荐文章 END -->
    <!-- 首页文章标题 STAR -->
    <h3 class="mdx-all-posts">这是文章标题</h3>
    <!-- 首页文章标题 END-->
    <?php include('posts-main.php')?>
    
</div>