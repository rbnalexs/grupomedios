<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */


function registrar_mis_menus() {
  register_nav_menus(array(
    'main-menu'   => __('Menú Principal'),
    'header-menu' => __('Menú Header Categorías 2020'),
  ));
}
add_action('init', 'registrar_mis_menus');

add_theme_support('post-thumbnails');
