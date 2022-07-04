<?php
get_header(  );?>

<style>
  .error-container{
    max-width: 702px;
  }
  h2{
    text-align: center;
  }
  h2.error-number{
    font-size: 404px;
    font-size: clamp(175px, 50vmin, 404px);
    text-align: center;
    line-height: 1;
  }

  span.error-word{
    font-family: 'Frank Ruhl Libre', serif;
    font-size: 48px;
    font-size: clamp(24px, 5vmin, 48px);
    font-weight: 900;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-90deg);
  }

  .button_normal.error{
    margin: 50px auto;
    display: block;
    max-width: 228px;
    text-align: center;
  }
</style>

<div class="container error-container">
  <h2 class="error-number">404</h2>
  <span class="error-word">Error</span>
</div>
<div class="container">
  <h2>The page you are looking for doesn't exist</h2>
  <a href="<?php echo home_url(); ?>" class="button_normal error">Go Home</a>
</div>

<?php get_footer(); ?>