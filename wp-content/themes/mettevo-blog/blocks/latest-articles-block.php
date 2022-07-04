<?php
/**
 * Block Name: Latest Articles Block
 */
?>


<?php $latest_articles = get_field('latest_articles'); ?>


  <!-- 		<a href="<?php echo get_permalink($post_ids); ?>"><?php echo get_the_title($post_ids); ?></a> -->


<?php if ($latest_articles) : ?>

  <div class="latest-articles container">
    <h1 class="latest-articles__title">
      <?php echo get_field('block_title'); ?>
    </h1>
    <div class="latest-articles__container">

      <?php foreach ($latest_articles as $post_ids) : ?>

        <a class="latest-articles__item" href="<?php echo get_permalink($post_ids); ?>">
          <div class="latest-articles__image"
               style="height: 300px; background-image: url(<?php echo get_the_post_thumbnail_url($post_ids, 'large'); ?>);
                   background-size: cover; background-repeat: no-repeat; background-position: center;">
          </div>
          <div class="latest-articles__content">
            <span class="latest-articles__category"><?php echo get_the_category($post_ids)[0]->cat_name; ?></span>
            <h4 class="latest-articles__article-title"><?php echo get_the_title($post_ids); ?></h4>
            <div class="latest-articles__meta">
              <span class="latest-articles__date">01.05.2022 by</span>
              <?php global $post; ?>

              <span
                  class="latest-articles__author"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
              <?php wp_reset_postdata(); ?>
            </div>
          </div>
        </a>

      <?php endforeach; ?>

    </div>
  </div>
<?php endif; ?>
