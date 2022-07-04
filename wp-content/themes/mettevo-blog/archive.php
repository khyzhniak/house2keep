<?php get_header(); ?>
<div class="container">
  <div class="cards-container">
    <div class="cards">
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
      get_template_part( 'template-parts/article', 'card' );
      endwhile; else :  endif; 
    ?>
    
    
    </div>  
  </div>
</div>
<?php get_footer(); ?>