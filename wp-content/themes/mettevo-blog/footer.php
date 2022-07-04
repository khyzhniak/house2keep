  </main>
  <footer class="footer">
    <div class="container">
      <?php if ( get_field( 'footer_logo', 'option' ) ) : ?>
        <img src="<?php the_field( 'footer_logo', 'option' ); ?>" alt="site logo" class="footer-logo"/>
      <?php endif ?>
      <div class="copyright">
        <?php the_field( 'copyright', 'option' ); ?>
      </div>
      <nav class="footer-menu">
      <?php
              wp_nav_menu( [
                'theme_location'  => 'footer-menu',
                'menu'            => 'Footer menu',
                'items_wrap'      => '<ul>%3$s</ul>',                
              ] );
            ?>
      </nav>
    </div>

  <?php if ( is_category() || is_author() || is_page( 'privacy-policy' ) ): ?>
    <div class="totop"></div>
  <?php endif; ?>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>