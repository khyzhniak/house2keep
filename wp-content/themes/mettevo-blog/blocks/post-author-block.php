<?php
/**
 * Block Name: Post Author Block
 */
?>

<?php global $post; ?>
<div class="post-author-container">
  <div class="post-author-block">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/author-img.jpg" alt="" class="post-author-block__image">
    <div class="post-author-block__content">
      <!-- <p><?php the_author_posts_link(); ?></p> -->
      <h4 class="post-author-block__name"><?php the_author_posts_link(); ?></h4>
      <p class="post-author-block__decription"><?php echo $user_description = get_the_author_meta( 'user_description', $post->post_author ); ?> </p>
    </div>
  </div>
</div>
<?php wp_reset_postdata(  ); ?>