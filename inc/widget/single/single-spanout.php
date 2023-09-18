<?php

/**
 * 
 */
$post_time_type = _PZ('post_time');
?>
<div class="spanout">
    <!-- <button class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple mdx-share" mdui-menu="{target: '#mdxshare'}">
        <i class="mdui-icon material-icons">&#xe80d;</i>
    </button>
    <ul class="mdui-menu" id="mdxshare">
        <li class="mdui-menu-item mdx-s-img-li"><a href="#">
                <i class="mdui-icon material-icons mdx-share-icon mdui-menu-item-icon">&#xe3f4;</i>
                <?php 
                // _e('生成分享图', 'mdx'); 
                ?>
            </a>
        </li>
        <?php 
        // if ($mdx_share_area == "all" || $mdx_share_area == "china") {
        //     include('includes/share_cn.php');
        // }
        // if ($mdx_share_area == "all" || $mdx_share_area == "oversea") {
        //     include('includes/share_oversea.php');
        // } 
        ?>
    </ul> -->
    <i class="mdui-icon material-icons">&#xe54e;</i>
    <?php if (get_the_tags()) {
        the_tags('#', ' #', '');
    } else {
        _e('没有标签', 'mdx');
    }
    if ($post_time_type=='2') { ?>
        <span class="mdui-text-color-black-disabled timeInPost" itemprop="datePublished">
            <?php if (_PZ('post_time_info') == "1") { ?>
                <i class="mdui-icon material-icons info-icon">&#xe192;</i>
            <?php the_time('Y-m-d');
            } else { ?>
                <i class="mdui-icon material-icons info-icon">&#xe3c9;</i>
            <?php the_modified_time('Y-m-d');
            } ?>
        </span>
    <?php } ?>
    <div class="mdui-divider"></div>
    <?php bxm_breadcrumb(); ?>
</div>