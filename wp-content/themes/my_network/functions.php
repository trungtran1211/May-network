<?php

define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');


//Load file /core/init.php
require_once(CORE . '/init.php');
require_once(CORE . '/menu.php');
require_once(CORE . '/helper.php');
require_once(CORE . '/partner.php');
require_once(CORE . '/question.php');
require_once(CORE . '/duplicate.php');
require_once(CORE . '/custom-name-menu.php');
require_once(CORE . '/banner-home.php');
require_once(CORE . '/banner-about.php');

/**
 * Setup the feature of theme
 **/
if (!function_exists('my_network_theme_setup')) {
    /*
     * Setup init this theme
     */
    function my_network_theme_setup()
    {
        //Create menu of theme
        register_nav_menu('header-menu', __('Header Menu'));
        register_nav_menu('menu-Xay-dung-kenh', __('Xay dung kenh Menu'));
        register_nav_menu('livestream', __('menu LiveStream'));
    }

    add_action('init', 'my_network_theme_setup');
    add_theme_support('post-thumbnails');
}


// if (!function_exists('resolve_style_filename')) {
/**
 * Resolve Style filename
 * Todo: Should define STYLE_VERSION in wp-config.php
 *
 * @param string $file_path Asset file path
 *
 * @return string
 */
function resolve_style_filename($file_path)
{
    $versionParam = defined('STYLE_VERSION') ? STYLE_VERSION : '1.0.0';
    return get_template_directory_uri() . '/' . trim($file_path) . '?v=' . $versionParam;
}

// validate phone contact form
function custom_filter_wpcf7_is_tel( $result, $tel ){ 
    $result = preg_match( '/^(09|03|07|08|05)+([0-9]{8})$/', $tel ); 
    return $result; 
  } 
  add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );







  
 