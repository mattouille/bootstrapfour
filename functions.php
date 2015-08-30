<?php

include_once 'lib/wp-bootstrap-navwalker.php';

$bs_version = '4.0.0';

if ( ! function_exists( 'htxt_bs4_setup' ) ) :
function htxt_bs4_setup() {
  add_theme_support( 'automatic-feed-links' );

  add_theme_support( 'title-tag' );

  add_theme_support( 'html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ]);

  register_nav_menus([
    'main_menu' => 'Main Menu',
    // 'footer_menu' => 'Footer Menu'
  ]);

  add_editor_style( 'css/bootstrap.min.css' );
}
endif; // htxt_bs4_setup
add_action( 'after_setup_theme', 'htxt_bs4_setup' );

function htxt_theme_styles() {
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', [], $bs_version );
  wp_register_style( 'styles', get_stylesheet_uri(), ['bootstrap'], '1' );
  wp_enqueue_style( 'styles' );
}
add_action('wp_enqueue_scripts', 'htxt_theme_styles');

function htxt_theme_scripts() {
  wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', [ 'jquery' ], $bs_version, true );
  wp_enqueue_script( 'bootstrap' );
}
add_action('wp_enqueue_scripts', 'htxt_theme_scripts');

function htxt_nav_li_class( $classes, $item ) {
  $classes = [];
  $classes[] = 'nav-item';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'htxt_nav_li_class', 10, 2 );

function htxt_nav_anchor_class( $atts, $item, $args ) {
  $atts['class'] = 'nav-link';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'htxt_nav_anchor_class', 10, 3 );

?>
