<?php
/**
 * Block Name: Related Posts Block
 */
?>

<?php the_field( 'related_posts_title' ); ?>
<?php $related_posts = get_field( 'related_posts' ); ?>
<?php if ( $related_posts ) : ?>
  <?php foreach ( $related_posts as $rel_post ) : ?>
    <a href="<?php echo get_permalink($rel_post); ?>"><?php echo get_the_title($rel_post); ?></a>
  <?php endforeach; ?>
<?php endif; ?>


