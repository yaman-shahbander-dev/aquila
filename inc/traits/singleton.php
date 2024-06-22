<?php

/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 *
 * Using the singleton pattern in WordPress is an easy way to protect against
 * mistakes caused by creating multiple objects or multiple initialization
 * of classes which need to be initialized only once.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc\Traits;

trait Singleton
{
	protected  function __construct() {}
	final protected function __clone() {}

	final public static function get_instance() {
		static $instances = [];

		$called_class = get_called_class();
		if (!isset($instances[$called_class]))  {
			$instances[$called_class] = new $called_class();

			/**
			 * Dependent items can use the `aquila_theme_singleton_init_{$called_class}` hook to execute code
			 */
			do_action(sprintf('aquila_theme_singleton_init_%s', $called_class));
		}

		return $instances[$called_class];
	}
}