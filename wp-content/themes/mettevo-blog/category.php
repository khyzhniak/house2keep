
<?php 
get_header(); ?>

<?php global $wp_query;

$category = get_queried_object(  );
?>


<div class="container">
  <h1><?php echo $category->name;?></h1>
  <div class="category-details">
    <!-- <img src="<?php /*echo get_field( 'image', $category );*/ ?>" alt="" class="category-details__image"> -->
    <div class="category-details__description">
    <?php echo category_description($category->cat_id); ?>
    </div>
  </div>
</div>

<div class="main-content container">
  <div class="cards-container">
    <!-- <h1 class="category-name"><?php/* echo $category->name;*/?></h1> -->
    <div class="cards"
      data-page="<?php echo get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>"
      data-max="<?php echo $wp_query->max_num_pages; ?>"
      data-param-name="category_name" 
      data-param-value="<?php echo $category->name;?>"
    >
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        get_template_part( 'template-parts/article', 'card' );
        endwhile; 
      else : echo 'No posts found'; 
      endif; ?>
    </div>
    <?php if ( have_posts(  ) ): ?>
      <button class="button_normal btn-load-more">Load more</button>
    <?php endif; ?>
  </div>
  
  <?php get_template_part( 'template-parts/sidebar', 'recommended' ); ?>
</div>





<?php get_footer(); ?>