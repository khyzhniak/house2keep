<?php
/**
 * Template Name: Privacy Policy
 */
?>
<?php get_header();  ?>

<div class="main-content container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
  <h1><?php the_title(); ?></h1>
<?php the_content(); 
  endwhile; else :  endif; 
?>

<?php get_footer(); ?>