
<?php 
get_header(); 
if ( is_front_page() ) get_template_part( 'template-parts/latest', 'articles' );?>

<div class="main-content container">
  <div>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
    the_content(); 
    endwhile; else :  endif; 
  ?>
  </div>
  <?php get_template_part( 'template-parts/sidebar', 'recommended' ); ?>
</div>



<?php get_footer(); ?>
