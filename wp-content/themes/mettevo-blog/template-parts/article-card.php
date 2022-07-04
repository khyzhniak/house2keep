<div class="article-card">
  <div class="article-card__image" style="background-image: url(<?php the_post_thumbnail_url('large' ) ;?>); ">
  </div>
  <div class="article-card__content">
    <h4 class="article-card__title"><?php the_title(); ?></h4>
    <div class="article-card__meta">
      <span class="article-card__date"><?php the_time( 'd.m.Y'); ?></span>
      <span>&nbsp;by <span class="article-card__author"> <?php the_author_posts_link(); ?></span></span>
    </div>
    <div class="article-card__excerpt">
      <p><?php echo the_excerpt( ); ?></p>
    </div>
    <a href="<?php the_permalink( ); ?>" class="readmore-link">Read more</a>
  </div>
</div>