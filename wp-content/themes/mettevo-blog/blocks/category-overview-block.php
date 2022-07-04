<?php 
/**
 * Block Name: Category Overview Block
 */

$category_name = get_field( 'category_name' );
$term = get_term_by( 'id', $category_name, 'category' ); 
$overview_posts = get_field( 'overview_posts' );
?>

<div class="category-section">
  <div class="category-section__section-header">

    <?php if ( $term ) : ?>

    <h3 class="category-section__title"><?php echo esc_html( $term->name ); ?></h3>
    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="button_normal"><?php the_field( 'button_caption' ); ?></a>

    <?php endif; ?>

    </div>

    <?php if ( $overview_posts ) : ?>

    <div class="category-section__article-cards">
      
      <?php foreach ( $overview_posts as $index=>$post_ids ) : ?>

      <?php if( $index == 0 ): ?>
      <div class="article-card_layout_main">
        <div class="article-card__image">
          <img src="<?php echo get_the_post_thumbnail_url( $post_ids, 'large' ) ;?>" alt="">
          <div class="article-card__overlay">
            <div class="article-card__meta">
              <span class="article-card__date"><?php echo get_the_date( 'd.m.Y', $post_ids ); ?></span>
              <span>by 
                <span class="article-card__author"><?php the_author_posts_link(); ?></span>
              </span>
            </div>
          </div>
        </div>
        <div class="article-card__content">
          <h4 class="article-card__title"><?php echo get_the_title( $post_ids ); ?></h4>
          <div class="article-card__teaser-text">
            <p><?php echo get_the_excerpt( $post_ids ); ?></p>
          </div>
          <a href=<?php echo get_permalink( $post_ids ); ?>" class="readmore-link">Read more</a>
        </div>
      </div>


      <?php else: ?>
      <a href="<?php echo get_permalink( $post_ids ); ?>" class="article-card">
        <div class="article-card__image">
          <img src="<?php echo get_the_post_thumbnail_url( $post_ids, 'thumbnail' ) ;?>" alt="">
          <div class="article-card__overlay">
            <div class="article-card__meta">
              <span class="article-card__date"><?php echo get_the_time( 'd.m.Y', $post_ids ); ?></span>
              <span>by <span class="article-card__author"> <?php echo get_the_author_meta( 'display_name', get_post( $post_ids )->post_author ); ?></span></span>
            </div>
          </div>
        </div>
       <div class="article-card__content">
        <h4 class="article-card__title"><?php echo get_the_title( $post_ids ); ?></h4>
          <div class="article-card__meta">
            <span class="article-card__date"><?php echo get_the_time( 'd.m.Y', $post_ids ); ?></span>
            <span>&nbsp;by <span class="article-card__author"> <?php echo get_the_author_meta( 'display_name', get_post( $post_ids )->post_author ); ?></span></span>
          </div>
       </div>
      </a>
      <?php endif; ?>
      <?php endforeach; ?>

    </div>

    <?php endif; ?>

  </div>  