<?php

get_header(); ?>

<?php 
  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
  $avatar_url = get_avatar_url( $curauth->ID, ['size' => 360] );
  $author_full_name = $curauth->first_name . ' ' . $curauth->last_name;
?>

<div class="post-author-container container">
  <div class="post-author-block">
    <img src="<?php echo $avatar_url; ?>" alt="" class="post-author-block__image">
    <div class="post-author-block__content">
      <h2 class="post-author-block__name"><?php echo $author_full_name; ?></h2>
      <p class="post-author-block__decription"><?php echo $curauth->description; ?> </p>
    </div>
  </div>
</div>


<div class="main-content container">
  <div class="cards-container">
    <h1 class="author-page__title">
      Latest Articles by <?php echo $author_full_name; ?>
    </h1>
    <div class="cards"
      data-page="<?php echo get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; ?>"
      data-max="<?php echo $wp_query->max_num_pages; ?>"
      data-param-name="author"
      data-param-value="<?php echo $curauth->ID;?>"
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
</div>





<?php get_footer(); ?>;