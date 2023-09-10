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
    'menu_title'      => __('主题设置', 'bxm'),
    'menu_slug'       => 'theme_settings',
    'menu_position'   => 59,
    'ajax_save'       => true,
    'show_bar_menu'   => false,
    'theme'           => 'dark',
    'show_search'     => true,
    'footer_text'     => esc_html__('运行在', 'io_setting') . '： WordPress ' . get_bloginfo('version') . ' / PHP ' . PHP_VERSION,
    'footer_credit'   => '感谢您使用 <a href="https://www.iowen.cn/" target="_blank">一为</a>的WordPress主题',
));
CSF::createSection(
    $option,
    array(
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
                'id'=>'home_img_text_color',
                'title'=>__('增加首页图片文字对比度', 'bxm_lang'),
                'type'=>'switcher',
                'default'=>false,
            ),
            array(
                'id'=>'home_header',
                'title'=>__('首页头部展示内容', 'bxm_lang'),
                'type'=>'button_set',
                'default'=>'1',
                'options'=>array(
                    '1'=>__('文本', 'bxm_lang'),
                    '2'=>__('幻灯片', 'bxm_lang'),
                ),
            ),
            array(
                'id'=>'home_header_text',
                'title'=>__('首页头部文本', 'bxm_lang'),
                'type'=>'textarea',
                'dependency' => array('home_header', '==', '1'),
                'default'=>'<h1>欢迎来到我的博客</h1><p>这里是一位的个人博客，欢迎您的访问。</p>',
                'after'=>'支持HTML标签',
            ),
            array(
                'title'=>'幻灯片样式',
                'id'=>'home_header_slider_style',
                // 下拉选择器
                'type'=>'select',
                'dependency' => array('home_header', '==', '2'),
                'options'=>array(
                    '1'=>__('居中', 'bxm_lang'),
                    '2'=>__('现代', 'bxm_lang'),
                    '3'=>__('朴素', 'bxm_lang'),
                    '4'=>__('纯色', 'bxm_lang'),
                ),
            ),
            array(
                'id'=>'home_header_slider_get',
                'title'=>__('幻灯片文章获取方式', 'bxm_lang'),
                'type'=>'button_set',
                'dependency' => array('home_header', '==', '2'),
                'default'=>'1',
                'options'=>array(
                    '1'=>__('置顶', 'bxm_lang'),
                    '2'=>__('分类', 'bxm_lang'),
                ),
            ),
            array(
                'id'=>'home_header_slider_cat',
                'title'=>__('幻灯片文章分类id', 'bxm_lang'),
                'after'=>__('在此设定首页幻灯片文章的分类名。当分类不存在时,将显示最新文章,多个分类id用英文逗号隔开', 'bxm_lang'),
                'type'=>'number',
                'dependency' => array('home_header', '==', '2'),
            )
        ),
    ),
);

CSF::createSection(
    $option,
    array(
        'title'=>__('文章', 'bxm_lang'),
        'icon'=>'fa fa-file',
        'description'=>'文章设置',
        'fields'=>array(
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
        ),
    ),
);