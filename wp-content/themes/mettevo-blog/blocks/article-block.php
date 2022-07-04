<?php
/**
 * Block Name: Article Block
 */

?>


<section class="article-block">
<?php if ( get_field( 'image' ) ) : ?>
  <img class="article-block__image" src="<?php the_field( 'image' ); ?>" alt="">
<?php endif; ?>
  <h3 class="article-block__title"><?php the_field( 'title' ); ?></h3>
  <div class="article-block__content"><?php the_field( 'content' ); ?></div>
</section>