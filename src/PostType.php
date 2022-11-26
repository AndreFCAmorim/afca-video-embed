<?php
namespace Afca\EmbedVideoPlayer;

class PostType {
	/**
	 * Post Type: Embed Videos.
	 */
	public function cptui_register_my_cpts_afca_video_embed() {
		$labels = [
			'name'                     => esc_html__( 'Embed Videos', 'afca-embed-video-player' ),
			'singular_name'            => esc_html__( 'Embed Video', 'afca-embed-video-player' ),
			'menu_name'                => esc_html__( 'My Embed Videos', 'afca-embed-video-player' ),
			'all_items'                => esc_html__( 'All Embed Videos', 'afca-embed-video-player' ),
			'add_new'                  => esc_html__( 'Add new', 'afca-embed-video-player' ),
			'add_new_item'             => esc_html__( 'Add new Embed Video', 'afca-embed-video-player' ),
			'edit_item'                => esc_html__( 'Edit Embed Video', 'afca-embed-video-player' ),
			'new_item'                 => esc_html__( 'New Embed Video', 'afca-embed-video-player' ),
			'view_item'                => esc_html__( 'View Embed Video', 'afca-embed-video-player' ),
			'view_items'               => esc_html__( 'View Embed Videos', 'afca-embed-video-player' ),
			'search_items'             => esc_html__( 'Search Embed Videos', 'afca-embed-video-player' ),
			'not_found'                => esc_html__( 'No Embed Videos found', 'afca-embed-video-player' ),
			'not_found_in_trash'       => esc_html__( 'No Embed Videos found in trash', 'afca-embed-video-player' ),
			'parent'                   => esc_html__( 'Parent Embed Video:', 'afca-embed-video-player' ),
			'featured_image'           => esc_html__( 'Featured image for this Embed Video', 'afca-embed-video-player' ),
			'set_featured_image'       => esc_html__( 'Set featured image for this Embed Video', 'afca-embed-video-player' ),
			'remove_featured_image'    => esc_html__( 'Remove featured image for this Embed Video', 'afca-embed-video-player' ),
			'use_featured_image'       => esc_html__( 'Use as featured image for this Embed Video', 'afca-embed-video-player' ),
			'archives'                 => esc_html__( 'Embed Video archives', 'afca-embed-video-player' ),
			'insert_into_item'         => esc_html__( 'Insert into Embed Video', 'afca-embed-video-player' ),
			'uploaded_to_this_item'    => esc_html__( 'Upload to this Embed Video', 'afca-embed-video-player' ),
			'filter_items_list'        => esc_html__( 'Filter Embed Videos list', 'afca-embed-video-player' ),
			'items_list_navigation'    => esc_html__( 'Embed Videos list navigation', 'afca-embed-video-player' ),
			'items_list'               => esc_html__( 'Embed Videos list', 'afca-embed-video-player' ),
			'attributes'               => esc_html__( 'Embed Videos attributes', 'afca-embed-video-player' ),
			'name_admin_bar'           => esc_html__( 'Embed Video', 'afca-embed-video-player' ),
			'item_published'           => esc_html__( 'Embed Video published', 'afca-embed-video-player' ),
			'item_published_privately' => esc_html__( 'Embed Video published privately.', 'afca-embed-video-player' ),
			'item_reverted_to_draft'   => esc_html__( 'Embed Video reverted to draft.', 'afca-embed-video-player' ),
			'item_scheduled'           => esc_html__( 'Embed Video scheduled', 'afca-embed-video-player' ),
			'item_updated'             => esc_html__( 'Embed Video updated.', 'afca-embed-video-player' ),
			'parent_item_colon'        => esc_html__( 'Parent Embed Video:', 'afca-embed-video-player' ),
		];

		$args = [
			'label'                 => esc_html__( 'Embed Videos', 'afca-embed-video-player' ),
			'labels'                => $labels,
			'description'           => '',
			'public'                => true,
			'publicly_queryable'    => false,
			'show_ui'               => true,
			'show_in_rest'          => true,
			'rest_base'             => '',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'rest_namespace'        => 'wp/v2',
			'has_archive'           => false,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'delete_with_user'      => false,
			'exclude_from_search'   => false,
			'capability_type'       => 'post',
			'map_meta_cap'          => true,
			'hierarchical'          => false,
			'can_export'            => false,
			'rewrite'               => [
				'slug'       => 'afca-video-embed',
				'with_front' => true,
			],
			'query_var'             => true,
			'menu_icon'             => 'dashicons-format-video',
			'supports'              => [ 'title', 'author' ],
			'show_in_graphql'       => false,
		];

		register_post_type( 'afca-video-embed', $args );
	}

	/**
	 * Taxonomy: Types.
	 */
	public function cptui_register_my_taxes_afca_video_type() {
		$labels = [
			'name'                       => esc_html__( 'Types', 'afca-embed-video-player' ),
			'singular_name'              => esc_html__( 'Type', 'afca-embed-video-player' ),
			'menu_name'                  => esc_html__( 'Types', 'afca-embed-video-player' ),
			'all_items'                  => esc_html__( 'All Types', 'afca-embed-video-player' ),
			'edit_item'                  => esc_html__( 'Edit Type', 'afca-embed-video-player' ),
			'view_item'                  => esc_html__( 'View Type', 'afca-embed-video-player' ),
			'update_item'                => esc_html__( 'Update Type name', 'afca-embed-video-player' ),
			'add_new_item'               => esc_html__( 'Add new Type', 'afca-embed-video-player' ),
			'new_item_name'              => esc_html__( 'New Type name', 'afca-embed-video-player' ),
			'parent_item'                => esc_html__( 'Parent Type', 'afca-embed-video-player' ),
			'parent_item_colon'          => esc_html__( 'Parent Type:', 'afca-embed-video-player' ),
			'search_items'               => esc_html__( 'Search Types', 'afca-embed-video-player' ),
			'popular_items'              => esc_html__( 'Popular Types', 'afca-embed-video-player' ),
			'separate_items_with_commas' => esc_html__( 'Separate Types with commas', 'afca-embed-video-player' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Types', 'afca-embed-video-player' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Types', 'afca-embed-video-player' ),
			'not_found'                  => esc_html__( 'No Types found', 'afca-embed-video-player' ),
			'no_terms'                   => esc_html__( 'No Types', 'afca-embed-video-player' ),
			'items_list_navigation'      => esc_html__( 'Types list navigation', 'afca-embed-video-player' ),
			'items_list'                 => esc_html__( 'Types list', 'afca-embed-video-player' ),
			'back_to_items'              => esc_html__( 'Back to Types', 'afca-embed-video-player' ),
			'name_field_description'     => esc_html__( 'The name is how it appears on your site.', 'afca-embed-video-player' ),
			'parent_field_description'   => esc_html__( 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.', 'afca-embed-video-player' ),
			'slug_field_description'     => esc_html__( 'The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.', 'afca-embed-video-player' ),
			'desc_field_description'     => esc_html__( 'The description is not prominent by default; however, some themes may show it.', 'afca-embed-video-player' ),
		];

		$args = [
			'label'                 => esc_html__( 'Types', 'afca-embed-video-player' ),
			'labels'                => $labels,
			'public'                => true,
			'publicly_queryable'    => false,
			'hierarchical'          => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'show_in_nav_menus'     => true,
			'query_var'             => true,
			'rewrite'               => [
				'slug'       => 'afca_video_type',
				'with_front' => true,
			],
			'show_admin_column'     => false,
			'show_in_rest'          => true,
			'show_tagcloud'         => false,
			'rest_base'             => 'afca_video_type',
			'rest_controller_class' => 'WP_REST_Terms_Controller',
			'rest_namespace'        => 'wp/v2',
			'show_in_quick_edit'    => false,
			'sort'                  => true,
			'show_in_graphql'       => false,
		];
		register_taxonomy( 'afca_video_type', [ 'afca-video-embed' ], $args );
	}
}
