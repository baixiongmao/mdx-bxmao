<?php

/**
 * 文章页末信息-暂时未定义
 */
return;
?>
<div class="mdui-card mdx-say-after">
    <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="128" height="128">
        <path d="M512 106.7a405.3 405.3 0 110 810.6 405.3 405.3 0 010-810.6zm0 85.3a320 320 0 100 640 320 320 0 000-640zm42.7 277.3V704h-85.4V469.3h85.4zM512 298.7a47 47 0 110 93.8 47 47 0 010-93.8z" />
    </svg>
    <div class="mdui-card-actions mdui-typo">
        <?php
        // if ($mdx_info == '' || $mdx_info == '-----Nothing-----') {
        //     $mdx_info = htmlspecialchars_decode(mdx_get_option('mdx_say_after'));
        // }
        // echo str_replace('--PostURL--', '<a href="' . mdx_get_now_url(true, (int)$post->ID) . '">' . mdx_get_now_url(true, (int)$post->ID) . '</a>', str_replace('--PostLink--', '<a href="' . mdx_get_now_url(true, (int)$post->ID) . '">' . get_the_title() . '</a>', $mdx_info)); 
        ?>
    </div>
</div>