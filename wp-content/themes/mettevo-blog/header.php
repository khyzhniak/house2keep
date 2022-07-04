<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Frank+Ruhl+Libre:wght@400;700;900&family=Ubuntu:wght@300&family=Yeseva+One&display=swap" rel="stylesheet">


  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="header">
    <div class="container">
      <div class="header__top">
        <a class="header__logo" href="<?php echo get_home_url(); ?>">
        <?php if ( get_field( 'header_logo', 'option' ) ) : ?>
          <img src="<?php the_field( 'header_logo', 'option' ); ?>" alt="site logo"/>
        <?php endif; ?>
        </a>
        <div class="search-bar">
          <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
        </div>
      </div>
      <div class="header__bottom">
        <div class="nav-container">
          <nav class="main-menu">
          <?php
              wp_nav_menu( [
                'theme_location'  => 'header-menu',
                'menu'            => 'Header menu',
                'items_wrap'      => '<ul>%3$s</ul>',
                'add_li_class'    => 'menu-item__normal'
              ] );
            ?>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <main class="main">

