<?php

namespace Afca\WP\Plugin\EmbedVideoPlayer;

class PostTypeBuilder {

	/**
	 * @var string
	 *
	 * Set post type params
	 */
	public $type;
	private $slug;
	private $name;
	private $singular_name;
	private $prefix;
	private $menu;
	private $menu_position;
	private $menu_icon;

	/**
	 * Type constructor.
	 *
	 * When class is instantiated
	 *
	 * @param string $singular The singular name for the post type
	 * @param string $plural The plural name for the post type
	 * @param string $slug The post type slug
	 * @param bool $has_menu (Optional) Should it be on the menu or not?
	 * @param int $menu_position (Optional) The menu position.
	 * @param string $menu_icon (Optional) What is the menu icon? You should use either WordPress DashIcons or you own custom svg.
	 * @return void
	 */
	public function __construct( string $singular, string $plural, string $slug, bool $has_menu = true, int $menu_position = 6, string $menu_icon = 'dashicons-admin-page' ) {
		// Set class properties based on constructor arguments
		$this->singular_name = $singular;
		$this->name          = $plural;
		$this->slug          = $this->prefix . strtolower( $slug );
		$this->type          = $this->slug;
		$this->menu          = $has_menu;
		$this->menu_position = $menu_position;
		$this->menu_icon     = $menu_icon;

		// Register the post type
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	* Registers the post type with WordPress
	*/
	public function register() {

		// Define labels for the post type
		$labels = [
			'name'               => __( $this->name, 'afca-personal-theme' ),
			'singular_name'      => __( $this->singular_name, 'afca-personal-theme' ),
			'add_new'            => __( 'Add New', 'afca-personal-theme' ),
			'add_new_item'       => __( 'Add New ' . $this->singular_name, 'afca-personal-theme' ),
			'edit_item'          => __( 'Edit ' . $this->singular_name, 'afca-personal-theme' ),
			'new_item'           => __( 'New ' . $this->singular_name, 'afca-personal-theme' ),
			'all_items'          => __( 'All ' . $this->name, 'afca-personal-theme' ),
			'view_item'          => __( 'View ' . $this->name, 'afca-personal-theme' ),
			'search_items'       => __( 'Search ' . $this->name, 'afca-personal-theme' ),
			'not_found'          => __( 'No ' . strtolower( $this->name ) . ' found', 'afca-personal-theme' ),
			'not_found_in_trash' => __( 'No ' . strtolower( $this->name ) . ' found in Trash', 'afca-personal-theme' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( $this->name, 'afca-personal-theme' ),
		];

		// Define arguments for the post type
		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => $this->menu,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => [ 'slug' => $this->slug ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => $this->menu_position,
			'menu_icon'          => $this->menu_icon,
			'supports'           => [ 'title', 'thumbnail' ],
		];

		register_post_type( $this->type, $args );
	}
}
