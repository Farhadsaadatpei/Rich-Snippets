<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://adminrun.com
 * @since      1.0.0
 *
 * @package    Rating_snippets
 * @subpackage Rating_snippets/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Rating_snippets
 * @subpackage Rating_snippets/admin
 * @author     Admin Run <support@adminrun.com>
 */
class Rating_snippets_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/rating_snippets-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/rating_snippets-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add metabox options to posts
	 *
	 * @since    1.0.0
	 */

	public function add_meta_box_options(){
		
		$screens = ['post', 'wporg_cpt'];
		foreach ($screens as $s) {
			add_meta_box(
	            'wporg_box_id',
	            'Rating Snippets',
	            array( $this, 'display_meta_box' ),
	            $screen,
	            'side',
	            "default", 
	            null      
	        );
		}
	}

	/**
	 * Render metabox options
	 *
	 * @since    1.0.0
	 */

	public function display_meta_box($post) {
		include_once 'partials/rating_snippets-admin-display.php';
	}

	/**
	 * Saving metabox settings for each post
	 *
	 * @since    1.0.0
	 */

		function save_rs_meta($post_id)
	{
		//Save Content Type
	    if (array_key_exists('contentType', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'content_type_value',
	            $_POST['contentType']
	        );
	    }

	    //Save Rating Value
	    if (array_key_exists('ratingValue', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'rating_value',
	            $_POST['ratingValue']
	        );
	    }

	    //Save Best Rating 
	    if (array_key_exists('bestRating', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'best_rating',
	            $_POST['bestRating']
	        );
	    }

	    //Save Local Business Address
	    if (array_key_exists('localBusinessAddress', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'local_business_street',
	            $_POST['localBusinessAddress']
	        );
	    }

	    //Save Local Business Telephone
	    if (array_key_exists('localBusinessTelephone', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'local_business_telephone',
	            $_POST['localBusinessTelephone']
	        );
	    }

	    //Save Local Business Price
	    if (array_key_exists('localBusinessPrice', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'local_business_price',
	            $_POST['localBusinessPrice']
	        );
	    }

	    //Save Movie Date Created
	    if (array_key_exists('movieDateCreated', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'movie_date_created',
	            $_POST['movieDateCreated']
	        );
	    }

	    //Save Movie Director
	    if (array_key_exists('movieDirector', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'movie_director',
	            $_POST['movieDirector']
	        );
	    }

	}


}
