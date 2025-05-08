<?php
function cooperhewitt_enqueue_styles() {
    wp_enqueue_style('cooperhewitt-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'cooperhewitt_enqueue_styles');


function coopeprhewitt_register_menus() {
  register_nav_menus([
    'primary' => __('Primary Navigation', 'cooperhewitt'),
    'footer' => __('Footer Navigation', 'cooperhewitt'),
  ]);
}
add_action('after_setup_theme', 'coopeprhewitt_register_menus');


function my_theme_asset_url_e( $asset_url ) {
    echo get_template_directory_uri() . $asset_url;
}
