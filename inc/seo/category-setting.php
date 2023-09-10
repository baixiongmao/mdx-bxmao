<?php
/**
 * 分类页面添加自定义seo字段
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if( class_exists( 'CSF' ) ) {
    $prefix = 'category_meta'; 
  
    CSF::createTaxonomyOptions( $prefix, array(
        'taxonomy'  => 'category',
        'data_type' => 'serialize', 
    ) );

  
    CSF::createSection( $prefix, array(
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => __('文章分类SEO设置（可留空）','bxm_lang'),
            ),
            array(
                'title'=>__('分类图片','bxm_lang'),
                'id'=>'category_image',
                'type' => 'media',
            ),

        )
    ));
}