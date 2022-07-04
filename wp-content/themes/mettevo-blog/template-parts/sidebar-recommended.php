<aside class="sidebar">
  <h2 class="sidebar__title">
  <?php the_field( 'resources-sidebar-title', 'option' ); ?>
  </h2>
  <ul class="sidebar__list">
  <?php if ( have_rows( 'resources', 'option' ) ) : ?>
    <?php while ( have_rows( 'resources', 'option' ) ) : the_row(); ?>
      <?php $link = get_sub_field( 'link' ); ?>
      <?php if ( $link ) : ?>
        <li><a href="<?php echo esc_url( $link) ; ?>"> <?php the_sub_field( 'name' ); ?></a></li>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php else : ?>
    <?php // no rows found ?>
  <?php endif; ?>
  </ul>
</aside>