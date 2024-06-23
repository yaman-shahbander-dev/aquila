<?php

/**
 * Enqueue theme assets
 * 
 * @package Aquila
 * */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
{
	use Singleton;

	protected function __construct() {
		// load class.
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		/**
		 * Actions
		 * */
		add_action('wp_enqueue_scripts', [$this, 'register_styles']);
		add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
	}

	public function register_styles() {
		// Register Styles
		wp_register_style('style-css', get_stylesheet_uri());
		wp_register_style('bootstrap-css', AQUILA_DIR_PATH_URI . '/assets/src/library/css/bootstrap.min.css');

		// Enqueue Styles
		wp_enqueue_style('style-css');
		wp_enqueue_style('bootstrap-css');
	}

	public function register_scripts() {
		// Register Scripts
		wp_register_script('main-js', AQUILA_DIR_PATH_URI . '/assets/main.js', [], false, true);
		wp_register_script('bootstrap-js', AQUILA_DIR_PATH_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

		// Enqueue Scripts
		wp_enqueue_script('main-js');
		wp_enqueue_script('bootstrap-js');
	}
}