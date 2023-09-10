<?php
/**
 * 标签添加自定义字段
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if( class_exists( 'CSF' ) ) {
    $prefix = 'tag_meta'; 
  
    CSF::createTaxonomyOptions( $prefix, array(
        'taxonomy'  => 'post_tag',
        'data_type' => 'serialize', 
    ) );

  
    CSF::createSection( $prefix, array(
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => __('文章标签SEO设置（可留空）','bxm_lang'),
            ),
            array(
                'title'=>__('标签图片','bxm_lang'),
                'id'=>'tag_image',
                'type' => 'media',
            ),

        )
    ));
}