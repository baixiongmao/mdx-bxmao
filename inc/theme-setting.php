<?php
if (!defined('ABSPATH')) {
    die;
}
/**
 * Theme Setting
 * @package MDX-BXMAO
 * @since 1.0.0
 */
$option = 'bxm_theme_setting';
CSF::createOptions($option, array(
    'framework_title' => '主题设置',
    'menu_title'      => __('主题设置', 'bxm_lang'),
    'menu_slug'       => 'theme_settings',
    'menu_position'   => 59,
    'ajax_save'       => true,
    'show_bar_menu'   => false,
    'theme'           => 'dark',
    'show_search'     => true,
    'footer_text'     => esc_html__('运行在', 'io_setting') . '： WordPress ' . get_bloginfo('version') . ' / PHP ' . PHP_VERSION,
    'footer_credit'   => '感谢您使用 <a href="https://www.bxmao.net/" target="_blank">白熊猫</a>的WordPress主题',
));
CSF::createSection($option, array(
    'id'    => 'bxm-theme-styles',
    'title' => __('样式','io_setting'),
    'icon'  => 'fa fa-rocket',
));
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title' => __('全局', 'bxm_lang'),
        'icon' => 'fa fa-globe',
        'description' => '全局设置',
        'fields' => array(
            array(
                'id'         => "theme_color",
                'title'    => __("全局主题色", 'bxm_lang'),
                'subtitle' => __('选择主题色', 'bxm_lang'),
                'default'    => "indigo",
                'type'       => "palette",
                'options'    => array(
                    'red'         => array('#f44336'),
                    'pink'        => array('#e91e63'),
                    'purple'      => array('#9c27b0'),
                    'deep-purple' => array('#673ab7'),
                    'indigo'      => array('#3f51b5'),
                    'blue'        => array('#2196f3'),
                    'light-blue'  => array('#03a9f4'),
                    'cyan'        => array('#00bcd4'),
                    'teal'        => array('#009688'),
                    'green'       => array('#4caf50'),
                    'light-green' => array('#8bc34a'),
                    'lime'        => array('#cddc39'),
                    'yellow'      => array('#ffeb3b'),
                    'amber'       => array('#ffc107'),
                    'orange'      => array('#ff9800'),
                    'deep-orange' => array('#ff5722'),
                    'brown'       => array('#795548'),
                    'grey'        => array('#9e9e9e'),
                    'blue-grey'   => array('#607d8b'),
                    'white'       => array('#9e9e9e'),
                ),
            ),
            array(
                'id'         => "theme_skin",
                'title'    => __("强调色", 'bxm_lang'),
                'subtitle' => __('选择强调色', 'bxm_lang'),
                'default'    => "pink",
                'type'       => "palette",
                'options'    => array(
                    'red'         => array('#ff5252'),
                    'pink'        => array('#ff4081'),
                    'purple'      => array('#e040fb'),
                    'deep-purple' => array('#7c4dff'),
                    'indigo'      => array('#536dfe'),
                    'blue'        => array('#448aff'),
                    'light-blue'  => array('#40c4ff'),
                    'cyan'        => array('#18ffff'),
                    'teal'        => array('#64ffda'),
                    'green'       => array('#69f0ae'),
                    'light-green' => array('#b2ff59'),
                    'lime'        => array('#eeff41'),
                    'yellow'      => array('#ffff00'),
                    'amber'       => array('#ffd740'),
                    'orange'      => array('#ffab40'),
                    'deep-orange' => array('#ff6e40'),
                ),
            ),
            array(
                'id' => 'theme_black',
                'title' => __('黑色主题', 'bxm_lang'),
                'subtitle' => __('选择黑色主题', 'bxm_lang'),
                'type' => 'select',
                'options' => array(
                    '0' => __('关闭', 'bxm_lang'),
                    '1' => __('开启', 'bxm_lang'),
                    '2' => __('自动', 'bxm_lang'),
                ),
            ),
            array(
                'id' => 'md_2',
                'type' => 'switcher',
                'title' => __('Material Design 2', 'bxm_lang'),
                'subtitle' => __('开启MD2风格', 'bxm_lang'),
                'after' => __('开启后，主题将会使用 Material Design 2 风格。', 'bxm_lang'),
                'default' => false,
            ),
            array(
                'id' => 'md_2_font',
                'type' => 'switcher',
                'title' => __('Material Design 2 字体', 'bxm_lang'),
                'after' => __('开启后，部分标题文字将会使用 Material Design 2 风格字体显示。请注意该字体仅包含拉丁字符。', 'bxm_lang'),
                'default' => false,
            ),
            array(
                'id' => 'chrome_color',
                'type' => 'switcher',
                'title' => __('移动端Chrome 顶部沉浸', 'bxm_lang'),
                'after' => __('开启后，移动 Chrome 访问时，其标题栏的背景颜色会随主题颜色变化。', 'bxm_lang'),
                'default' => false,
            ),
            array(
                'id' => 'default_thumbnail',
                'type' => 'switcher',
                'title' => __('默认特色图片', 'bxm_lang'),
                'after' => __('开启后，文章无特色图像时将显示默认图像，影响文章列表和文章页。若关闭则不显示。', 'bxm_lang'),
                'default' => false,
            ),
            array(
                'id' => 'default_thumbnail_url',
                'type' => 'media',
                'title' => __('默认特色图片地址', 'bxm_lang'),
                'after' => __('上传默认特色图片', 'bxm_lang'),
                'dependency' => array('default_thumbnail', '==', 'true'),
                'default'   => array(
                    'url'       => get_theme_file_uri('/images/dpic.jpg'),
                    'thumbnail' => get_theme_file_uri('/images/dpic.jpg'),
                ),
            ),
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title' => __('首页', 'bxm'),
        'icon' => 'fa fa-home',
        'description' => '首页设置',
        'fields' => array(
            array(
                'id'        => 'home_style',
                'type'      => 'image_select',
                'title'     => __('首页样式', 'io_setting'),
                'options'   => array(
                    'default' => get_theme_file_uri('/images/svg/default-home.svg'),
                    'concise'    => get_theme_file_uri('/images/svg/concise-home.svg'),
                    'duolayout'    => get_theme_file_uri('/images/svg/duolayout-home.svg'),
                    'naive'    => get_theme_file_uri('/images/svg/naive-home.svg'),
                ),
                'default'   => 'default',
            ),
            array(
                'id' => 'home_img',
                'type' => 'button_set',
                'title' => __('首页图片', 'io_setting'),
                'subtitle' => __('选择首页图片类型', 'io_setting'),
                'default' => '1',
                'options' => array(
                    '1' => __('选择图片', 'bxm_lang'),
                    '2' => __('必应每日图片', 'bxm_lang'),
                ),
            ),
            array(
                'id' => 'home_img_ur',
                'type' => 'media',
                'title' => __('默认特色图片地址', 'bxm_lang'),
                'after' => __('上传默认特色图片', 'bxm_lang'),
                'dependency' => array('home_img', '==', '1'),
                'default'   => array(
                    'url'       => get_theme_file_uri('/images/dpic.jpg'),
                    'thumbnail' => get_theme_file_uri('/images/dpic.jpg'),
                ),
            ),
            array(
                'id' => 'home_img_bing_cache',
                'class'      => 'compact',
                'type'     => 'number',
                'title' => __('必应图片缓存时间', 'bxm_lang'),
                'after' => __('0为不缓存', 'bxm_lang'),
                'dependency' => array('home_img', '==', '2'),
                'default'  => 5,
                'unit'       => '小时',
            ),
            array(
                'id' => 'home_img_text_color',
                'title' => __('增加首页图片文字对比度', 'bxm_lang'),
                'type' => 'switcher',
                'default' => false,
            ),
            array(
                'id' => 'home_header',
                'title' => __('首页头部展示内容', 'bxm_lang'),
                'type' => 'button_set',
                'default' => '1',
                'options' => array(
                    '1' => __('文本', 'bxm_lang'),
                    '2' => __('幻灯片', 'bxm_lang'),
                ),
            ),
            array(
                'id' => 'home_header_text',
                'title' => __('首页头部文本', 'bxm_lang'),
                'type' => 'textarea',
                'dependency' => array('home_header', '==', '1'),
                'default' => '<h1>欢迎来到我的博客</h1><p>这里是一位的个人博客，欢迎您的访问。</p>',
                'after' => '支持HTML标签',
            ),
            array(
                'title' => '幻灯片样式',
                'id' => 'home_header_slider_style',
                // 下拉选择器
                'type' => 'select',
                'dependency' => array('home_header', '==', '2'),
                'options' => array(
                    '1' => __('居中', 'bxm_lang'),
                    '2' => __('现代', 'bxm_lang'),
                    '3' => __('朴素', 'bxm_lang'),
                    '4' => __('纯色', 'bxm_lang'),
                ),
            ),
            array(
                'id' => 'home_header_slider_get',
                'title' => __('幻灯片文章获取方式', 'bxm_lang'),
                'type' => 'button_set',
                'dependency' => array('home_header', '==', '2'),
                'default' => '1',
                'options' => array(
                    '1' => __('置顶', 'bxm_lang'),
                    '2' => __('分类', 'bxm_lang'),
                ),
            ),
            array(
                'id' => 'home_header_slider_cat',
                'title' => __('幻灯片文章分类id', 'bxm_lang'),
                'after' => __('在此设定首页幻灯片文章的分类名。当分类不存在时,将显示最新文章,多个分类id用英文逗号隔开', 'bxm_lang'),
                'type' => 'number',
                'dependency' => array('home_header', '==', '2'),
            )
        ),
    ),
);

CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title' => __('文章', 'bxm_lang'),
        'icon' => 'fa fa-file',
        'description' => '文章设置',
        'fields' => array(
            array(
                'id'        => 'post_style',
                'type'      => 'image_select',
                'title'     => __('首页样式', 'io_setting'),
                'options'   => array(
                    'default' => get_theme_file_uri('/images/svg/defaule-post.svg'),
                    'concise'    => get_theme_file_uri('/images/svg/concise-post.svg'),
                    'insightfully-post'    => get_theme_file_uri('/images/svg/insightfully-post.svg'),
                    'naive'    => get_theme_file_uri('/images/svg/naive-post.svg'),
                ),
                'default'   => 'default',
            ),
            array(
                'title' => __('文章时间显示位置', 'bxm_lang'),
                'id' => 'post_time',
                'type' => 'select',
                'options' => array(
                    '1' => __('标题旁', 'bxm_lang'),
                    '2' => __('文章底部', 'bxm_lang'),
                    '3' => __('不显示', 'bxm_lang'),
                ),
            ),
            array(
                'title' => __('文章导航栏配色方案', 'bxm_lang'),
                'id' => 'post_nav_color',
                'type' => 'button_set',
                'default' => '1',
                'after' => __('影响文章末尾文章导航栏区域的配色。', 'bxm_lang'),
                'options' => array(
                    '1' => __('主题色', 'bxm_lang'),
                    '2' => __('低饱和度', 'bxm_lang'),
                ),
            ),
            array(
                'title' => __('文末信息', 'bxm_lang'),
                'id' => 'post_footer_info',
                'type' => 'textarea',
                'after' => __('在此设定文章末尾的信息。支持HTML标签', 'bxm_lang'),
                'default' => '<p>本文由 <a href="https://www.bxmao.net" target="_blank">白熊猫</a> 创作，采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">知识共享署名-非商业性使用-相同方式共享 4.0 国际许可协议</a> 进行许可。</p>',
            ),
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title' => __('文章列表', 'bxm_lang'),
        'icon' => 'fa fa-list',
        'description' => '文章列表设置',
        'fields' => array(
            array(
                'title' => __('文章列表样式', 'bxm_lang'),
                'id' => 'post_list_style',
                'type' => 'image_select',
                'after' => __('同时影响首页、搜索结果页、归档页的文章列表样式。', 'bxm_lang'),
                'options'   => array(
                    // 简洁
                    'concise'    => get_theme_file_uri('/images/svg/concise-post-list.svg'),
                    // 列表
                    'list' => get_theme_file_uri('/images/svg/list-post-list.svg'),
                    // 干净
                    'clean' => get_theme_file_uri('/images/svg/clean-post-list.svg'),
                    // 网格
                    'grid' => get_theme_file_uri('/images/svg/grid-post-list.svg'),
                    // 朴素
                    'naive'    => get_theme_file_uri('/images/svg/naive-post-list.svg'),
                ),
                'default'   => 'concise',
            ),
            array(
                'title'=>__('文章列表宽度', 'bxm_lang'),
                'id'=>'post_list_width',
                'type'=>'button_set',
                'default'=>'1',
                'after'=>__('使用“较宽”，文章列表将会以多列瀑布流显示。', 'bxm_lang'),
                'options'=>array(
                    '1'=>__('正常', 'bxm_lang'),
                    '2'=>__('较宽', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('文章列表显示文章摘要', 'bxm_lang'),
                'id'=>'post_list_excerpt',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后，文章列表将会显示文章摘要。', 'bxm_lang'),
            ),
            array(
                'title'=>__('文章列表图片高度', 'bxm_lang'),
                'id'=>'post_list_img_height',
                'type'=>'button_set',
                'default'=>'1',
                'after'=>__('选择<code>自适应</code>，文章特色图像可以完全展示。<br>选择<code>固定宽高比</code>，文章特色图像可能会只显示部分以保持宽高比，但图像不会被拉伸，适合于图像过宽/过高的情况。', 'bxm_lang'),
                'options'=>array(
                    '1'=>__('自适应', 'bxm_lang'),
                    '2'=>__('固定宽高比', 'bxm_lang'),
                ),
            ),
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title'=>__('标题栏', 'bxm_lang'),
        'icon'=>'fa fa-header',
        'description'=>'标题栏设置',
        'fields'=>array(
            array(
                'title'=>__('自动隐藏标题栏', 'bxm_lang'),
                'id'=>'header_auto_hide',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后,当页面向下滚动时，标题栏会自动隐藏,向上滚动时会出现.', 'bxm_lang'),
            ),
            array(
                'title'=>__('标题栏显示内容', 'bxm_lang'),
                'id'=>'header_show',
                'type'=>'select',
                'default'=>'1',
                'options'=>array(
                    '1'=>__('博客名称', 'bxm_lang'),
                    '2'=>__('自定义Logo', 'bxm_lang'),
                    '3'=>__('自定义名称', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('Logo地址', 'bxm_lang'),
                'id'=>'header_logo',
                'type'=>'media',
                'dependency'=>array('header_show', '==', '2'),
            ),
            array(
                'title'=>__('自定义名称', 'bxm_lang'),
                'id'=>'header_custom_name',
                'type'=>'text',
                'dependency'=>array('header_show', '==', '3'),
            ),
            array(
                'title'=>__('点击标题栏返回顶部', 'bxm_lang'),
                'id'=>'header_back_top',
                'type'=>'switcher',
                'default'=>false,
            )
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title'=>__('抽屉菜单','bxm_lang'),
        'icon'=>'fa fa-bars',
        'description'=>'抽屉菜单设置',
        'fields'=>array(
            array(
                'title'=>__('抽屉菜单顶部展示个人信息', 'bxm_lang'),
                'id'=>'drawer_show_info',
                'type'=>'switcher',
                'default'=>false,
            ),
            array(
                'title'=>__('抽屉顶部图片', 'bxm_lang'),
                'id'=>'drawer_top_img',
                'type'=>'media',
                'dependency'=>array('drawer_show_info', '==', 'true'),
            ),
            array(
                'title'=>__('抽屉顶部头像', 'bxm_lang'),
                'id'=>'drawer_top_avatar',
                'type'=>'media',
                'dependency'=>array('drawer_show_info', '==', 'true'),
            ),
            array(
                'title'=>__('菜单信息名称', 'bxm_lang'),
                'id'=>'drawer_info_name',
                'type'=>'text',
            ),
            array(
                'title'=>__('菜单详细信息', 'bxm_lang'),
                'id'=>'drawer_info_detail',
                'type'=>'textarea',
                'after'=>__('支持HTML标签', 'bxm_lang'),
            ),
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title'=>__('页脚', 'bxm_lang'),
        'icon'=>'fa fa-ellipsis-h',
        'description'=>'页脚设置',
        'fields'=>array(
            array(
                'title'=>__('页脚样式', 'bxm_lang'),
                'id'=>'footer_style',
                'type'=>'select',
                'default'=>'1',
                'options'=>array(
                    '1'=>__('传统', 'bxm_lang'),
                    '2'=>__('简单', 'bxm_lang'),
                    '3'=>__('现代', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('页脚内容', 'bxm_lang'),
                'id'=>'footer_content',
                'type'=>'textarea',
                'after'=>__('支持HTML标签', 'bxm_lang'),
                'default'=>'<p>本站由 <a href="https://www.bxmao.net" target="_blank">白熊猫</a> 强力驱动</p>',
            ),
        ),
    ),
);
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-styles',
        'title'=>__('杂项','bxm_lang'),
        'icon'=>'fa fa-cog',
        'description'=>'杂项设置',
        'fields'=>array(
            array(
                'title'=>__('登录页 Material Design', 'bxm_lang'),
                'id'=>'login_md',
                'type'=>'switcher',
                'after'=>__('开启后，登录页将会使用 Material Design 风格。', 'bxm_lang'),
                'default'=>false,
            ),
            array(
                'title'=>__('启用友链 Gravatar 支持', 'bxm_lang'),
                'id'=>'link_gravatar',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后，将尝试从备注栏中获取邮箱并将与邮箱对应的 Gravatar 头像作为友情链接图像。关闭则只使用图片链接。', 'bxm_lang'),
            ),
            array(
                'title'=>__('友情链接随机顺序','bxm_lang'),
                'id'=>'link_random',
                'type'=>'switcher',
                'default'=>false,
            ),
            array(
                'title'=>__('网页标题计算方式', 'bxm_lang'),
                'id'=>'title_style',
                'type'=>'button_set',
                'default'=>'1',
                'after'=>__('选择 <code>WordPress 默认</code>，WordPress 会接管网页标题的内容，此方式兼容大部分 SEO 插件。<br>选择 <code>主题优化</code>，主题 会接管网页标题的内容，此方式在部分情况下更合适，但不兼容 SEO 插件。'),
                'options'=>array(
                    '1'=>__('WordPress默认', 'bxm_lang'),
                    '2'=>__('主题优化', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('多彩标签云', 'bxm_lang'),
                'id'=>'tag_cloud_colorful',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后，标签云将会使用多彩样式。', 'bxm_lang'),
            ),
        ),
    ),
);
CSF::createSection($option, array(
    'title' => __('功能','io_setting'),
    'id'=>'bxm-theme-functions',
    'icon'  => 'fa fa-cogs',
));
CSF::createSection(
    $option,
    array(
        'parent'      => 'bxm-theme-functions',
        'title' => __('文章页', 'bxm_lang'),
        'icon' => 'fa fa-file',
        'description' => __('文章页设置', 'bxm_lang'),
        'fields'=>array(
            array(
                'title'=>__('ImgBox', 'bxm_lang'),
                'id'=>'imgbox',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后，对于文章内包裹在指向自身的链接中的图片可点击查看大图。', 'bxm_lang'),
            ),
            array(
                'title'=>__('ImgBox 显示描述文本', 'bxm_lang'),
                'id'=>'imgbox_text',
                'type'=>'switcher',
                'default'=>false,
                'dependency'=>array('imgbox', '==', 'true'),
                'after'=>__('开启后，点击查看大图时，如果图片的 <code>alt</code> 属性不为空，图片下方将会显示 <code>alt</code> 属性内的文本。', 'bxm_lang'),
            ),
            array(
                'title'=>__('ImgBox 背景', 'bxm_lang'),
                'id'=>'imgbox_bg',
                'type'=>'button_set',
                'default'=>'1',
                'dependency'=>array('imgbox', '==', 'true'),
                'options'=>array(
                    '1'=>__('半透明', 'bxm_lang'),
                    '2'=>__('纯色', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('阅读进度展示', 'bxm_lang'),
                'id'=>'reading_progress',
                'type'=>'switcher',
                'default'=>false,
            ),
            array(
                'title'=>__('转移设备时记录阅读进度', 'bxm_lang'),
                'id'=>'reading_progress_record',
                'type'=>'switcher',
                'default'=>false,
            ),
            array(
                'title'=>__('页面加载进度条', 'bxm_lang'),
                'id'=>'page_loading',
                'type'=>'switcher',
                'default'=>false,
                'after'=>__('开启后，文章/单独页面加载时会在页面顶部显示加载进度条（仅动画，非真实进度），页面加载完成后消失', 'bxm_lang'),
            ),
            array(
                'title'=>__('文章时间信息', 'bxm_lang'),
                'id'=>'post_time_info',
                'type'=>'button_set',
                'default'=>'1',
                'options'=>array(
                    '1'=>__('发布时间', 'bxm_lang'),
                    '2'=>__('最后编辑时间', 'bxm_lang'),
                ),
            ),
            array(
                'title'=>__('文末作者信息栏', 'bxm_lang'),
                'id'=>'post_author_info',
                'type'=>'switcher',
                'default'=>false,
            ),
        ),
    ),
);