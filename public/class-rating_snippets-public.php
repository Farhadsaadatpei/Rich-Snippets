<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://adminrun.com
 * @since      1.0.0
 *
 * @package    Rating_snippets
 * @subpackage Rating_snippets/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Rating_snippets
 * @subpackage Rating_snippets/public
 * @author     Admin Run <support@adminrun.com>
 */
class Rating_snippets_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Publish snippet in header.
	 *
	 * @since    1.0.0
	 */
	public function load_snippet_header() {

		include_once 'partials/rating_snippets-public-display.php';

	}

}
