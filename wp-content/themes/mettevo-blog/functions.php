<?php

define( 'MTTV_IMG_DIR', get_template_directory_uri() . '/images' );


add_action( 'wp_enqueue_scripts', 'mttv_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mttv_enqueue_scripts' );

function mttv_enqueue_styles(){
	wp_enqueue_style( 'mttv-slick', get_template_directory_uri() . '/lib/slick/slick.css', [], null );
	wp_enqueue_style( 'mttv-slick-theme', get_template_directory_uri() . '/lib/slick/slick-theme.css', [], null );
	wp_enqueue_style( 'mttv-main', get_template_directory_uri() . '/css/main.min.css', [], null );
	wp_enqueue_style( 'mttv-fixed', get_template_directory_uri() . '/css/fixed.css', [], null );
}

function mttv_enqueue_scripts(){
	wp_enqueue_script( 'mttv-jquery', get_template_directory_uri() . '/lib/jquery/jquery.min.js', [], null, true );
	wp_enqueue_script( 'mttv-slick', get_template_directory_uri() . '/lib/slick/slick.min.js', [], null, true );
	wp_enqueue_script( 'mttv-main', get_template_directory_uri() . '/js/main.min.js', [], null, true );

}

add_action('after_setup_theme', 'mttv_register_navigations');
add_action('after_setup_theme', 'mttv_enable_post_thumbnails');

function mttv_register_navigations(){
	register_nav_menu( 'header-menu', 'Header menu' );
	register_nav_menu( 'footer-menu', 'Footer menu' );
	register_nav_menu( 'mobile-menu', 'Mobile menu' );
}

function mttv_add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
			$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'mttv_add_additional_class_on_li', 1, 3);

function mttv_enable_post_thumbnails(){
	add_theme_support( 'post-thumbnails' );
}

add_filter('nav_menu_item_id', '__return_false');



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

add_filter( 'excerpt_length', 'mttv_excerpt_length_filter' );

/**
 * Function for `excerpt_length` filter-hook.
 *
 * @param int $number The maximum number of words.
 *
 * @return int
 */
function mttv_excerpt_length_filter( $number ){
	return 40;
}


add_filter( 'excerpt_more', 'mttv_excerpt_more_filter' );

/**
 * Function for `excerpt_more` filter-hook.
 *
 * @param string $more_string The string shown within the more link.
 *
 * @return string
 */
function mttv_excerpt_more_filter( $more_string ){
	return '...';
}

add_action('wp_ajax_nopriv_mttv_load_more_posts', 'mttv_load_more_posts');
add_action('wp_ajax_mttv_load_more_posts', 'mttv_load_more_posts');

function mttv_load_more_posts(){
	$next_page = $_POST[ 'current_page' ] + 1;
	$param_name = $_POST[ 'param_name' ];
	$param_value = $_POST[ 'param_value' ];

	$query = new WP_Query( [
		$param_name      => $param_value,
		'posts_per_page' => 3,
		'paged'          => $next_page
	] );

	if ( $query->have_posts() ) :
		ob_start();

		while ( $query->have_posts() ) : $query->the_post();
			get_template_part( 'template-parts/article', 'card' );
		endwhile;

		wp_send_json_success( ob_get_clean() );
	else:
		wp_send_json_error( 'No more posts' );
	endif;

}

require_once('functions-gutenberg-block.php');
//require_once('inc/duplicate-posts.php');



