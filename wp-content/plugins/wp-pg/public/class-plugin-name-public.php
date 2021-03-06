<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Wp_Pg
 * @subpackage Wp_Pg/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Pg
 * @subpackage Wp_Pg/public
 * @author     Your Name <email@example.com>
 */
class Wp_Pg_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_pg    The ID of this plugin.
	 */
	private $wp_pg;

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
	 * @param      string    $wp_pg       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_pg, $version ) {

		$this->wp_pg = $wp_pg;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Pg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Pg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_pg, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Pg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Pg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->wp_pg, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * run the init actions for the plugin.
	 *
	 * @since    1.0.0
	 */
	public function init_actions() {

		/**
		 * This function takes care tpo call the init hook of the plugin
		 * to register all things needed here
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Pg_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Pg_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class
		 */

		register_post_type( 'tickets',
			array(
				'labels' => array(
					'name' => __( 'Tickets' ),
					'singular_name' => __( 'Ticket' )
				),
				'public' => true,
				'exclude_from_search' => true,
				'show_in_menu' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'tickets'),
				'show_in_rest' => true,
				'taxonomies' => array(
					'ticket_status',
				),
				'rewrite' => false,
			)
		);
		register_taxonomy( 'ticket_status', 'tickets', array(
				'labels' => array(
					'name'          => 'Ticket Status'
				,	'singular_name' => 'Ticket Status'
				,	'search_items'  => 'Search Ticket Status'
				,	'edit_item'     => 'Edit Ticket Status'
				,	'add_new_item'  => 'Add New Ticket Status'
				),
				'rewrite' => array( 'slug' => 'ticket_status' ),
				'show_in_rest' => true,
			)
		);

	}

}
