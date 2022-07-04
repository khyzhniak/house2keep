<?php
function filter_block_categories_when_post_provided($block_categories, $editor_context)
{
  if (!empty($editor_context->post)) {
  array_push(
    $block_categories,
    array(
    'slug'  => 'custom-blog-blocks',
    'title' => __('Custom Blog Blocks', 'custom-blog-blocks'),
    'icon'  => null,
    )
  );
  }
  return $block_categories;
}

add_filter('block_categories_all', 'filter_block_categories_when_post_provided', 10, 2);

// Register a Gutenberg block
if (function_exists('acf_register_block')) {

/*   $result = acf_register_block(array(
    'name'        => 'article-block',
    'title'       => __('Article Block'),
    'category'    => 'custom-blog-blocks',
    'icon'        => 'list-view',
    'align'       => 'full',
    'supports'    => array(
      'align'    => array('full'),
      'align'    => false,
    ),
    'render_template'   => 'blocks/article-block.php',
  )); */

 /*  $result = acf_register_block(array(
    'name'        => 'post-author-block',
    'title'       => __('Post Author Block'),
    'category'    => 'custom-blog-blocks',
    'icon'        => 'list-view',
    'align'       => 'full',
    'supports'    => array(
      'align'    => array('full'),
      'align'    => false,
    ),
    'render_template'   => 'blocks/post-author-block.php',
  ));  */ 

  $result = acf_register_block(array(
    'name'        => 'latest-articles-block',
    'title'       => __('Latest Articles Block'),
    'category'    => 'custom-blog-blocks',
    'icon'        => 'list-view',
    'align'       => 'full',
    'supports'    => array(
      'align'    => array('full'),
      'align'    => false,
    ),
    'render_template'   => 'blocks/latest-articles-block.php',
  ));  

  $result = acf_register_block(array(
    'name'        => 'category-overview-block',
    'title'       => __('Category Overview Block'),
    'category'    => 'custom-blog-blocks',
    'icon'        => 'list-view',
    'align'       => 'full',
    'supports'    => array(
      'align'    => array('full'),
      'align'    => false,
    ),
    'render_template'   => 'blocks/category-overview-block.php',
  ));
 
}


