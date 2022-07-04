<?php
/**
 * Template Name: Single Post Template
 */
get_header(); ?>

<div class="container">
  <div class="main-content">
    <div class="sidebar">
      <?php echo do_shortcode( '[lwptoc]' ); ?>
    </div> 
    <div class="single-post__wrapper">
      <h1 class="single-post__title"><?php the_title(); ?> </h1>
      <div class="single-post__image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>
      <div class="single-post__content">
        <?php the_content(); ?> 
      </div>
      <div class="single-post__tags">
        <?php the_tags(); ?>
      </div>
      <div class="post-author-container">
        <div class="post-author-block">
          <img src="<?php $id = get_the_author_meta( 'ID' ); echo get_avatar_url( $id, ['size' => 360] ); ?>" alt="" class="post-author-block__image">
          <div class="post-author-block__content">
            <h4 class="post-author-block__name"><?php echo get_the_author_meta( 'first_name' ) . ' ' . get_the_author_meta( 'last_name' ); ?></h4>
            <p class="post-author-block__decription"><?php the_author_meta( 'description' ); ?> </p>
          </div>
        </div>
      </div>
    </div>
      
  </div>

  <?php $related_posts = get_field( 'related_posts' ); ?>
  <?php if ( $related_posts ) : ?>
  <div class="related-posts container">
    <h2><?php the_field( 'related_posts_title' ); ?></h2>
    <div class="related-posts__slider">
      <?php foreach ( $related_posts as $post_ids ) : ?>
      <a href="<?php echo get_permalink( $post_ids ); ?>" class="slide">
        <img src="<?php echo get_the_post_thumbnail_url( $post_ids, 'full' ); ?>" class="slide__thumbnail" alt="">
        <div class="slide__content">
          <p class="slide__title"><?php echo get_the_title( $post_ids ); ?></p>
          <span class="slide__date"><?php echo get_the_date( 'd.m.Y', $post_ids ); ?></span>
          <span>
            by&nbsp;<span class="slide__author"><?php echo get_the_author_meta( 'display_name', get_post( $post_ids )->post_author ); ?></span>
          </span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
    <div class="slider-navigation">
      <div class="slide__prev" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/images/slider-arrow.svg'; ?>)"></div>
      <div class="slide__next" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/images/slider-arrow.svg'; ?>)"></div>
    </div>
  </div>
  <?php endif; ?>
</div>


<?php get_footer(); ?>