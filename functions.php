<?php

/**
 * Theme Functions
 * 
 * @package Aquila
 * */

if (!defined('AQUILA_DIR_PATH')) {
	define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory_uri()));
}

require_once AQUILA_DIR_PATH . '/inc/helpers/autoloader.php';

function aquila_enqueue_scripts() {
	// Register Styles
	wp_register_style('style-css', get_stylesheet_uri());
	wp_register_style('bootstrap-css', AQUILA_DIR_PATH . '/assets/src/library/css/bootstrap.min.css');

	// Register Scripts
	wp_register_script('main-js', AQUILA_DIR_PATH . '/assets/main.js', [], false, true);
	wp_register_script('bootstrap-js', AQUILA_DIR_PATH . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

	// Enqueue Styles
	wp_enqueue_style('style-css');
	wp_enqueue_style('bootstrap-css');

	// Enqueue Scripts
	wp_enqueue_script('main-js');
	wp_enqueue_script('bootstrap-js');
}

add_action('wp_enqueue_scripts', 'aquila_enqueue_scripts');