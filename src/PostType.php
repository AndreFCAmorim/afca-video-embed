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

	/**
	 * Meta-Fields
	 */
	public function acf_meta_fields() {
		// Define path and URL to the ACF plugin.
		define( 'MY_ACF_PATH', WP_PLUGIN_DIR . '/' . AFCA_VE_PLUGIN_FOLDER . '/includes/acf/' );
		define( 'MY_ACF_URL', plugin_dir_url( __DIR__ ) . '/includes/acf/' );

		// Include the ACF plugin.
		include_once MY_ACF_PATH . 'acf.php';

		// Customize the url setting to fix incorrect asset URLs.
		add_filter(
			'acf/settings/url',
			function() {
				return MY_ACF_URL;
			}
		);

		// (Optional) Hide the ACF admin menu item.
		add_filter(
			'acf/settings/show_admin',
			function() {
				return false;
			}
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) :

			//Statistics
			$this->acf_statistics();

			//Thumbnail
			$this->acf_thumbnail();

			//Video
			$this->acf_video();

			//Configurations
			$this->acf_configurations();

			//Shortcode
			$this->acf_shortcode();

			//Custom admin columns
			$this->custom_admin_columns();

			endif;
	}

	/**
	 * ACF Statistics
	 *
	 * This loads the metabox related to the statistics.
	 *
	 * @return void
	 */
	private function acf_statistics() {
		acf_add_local_field_group(
			[
				'key'                   => 'group_63825f8b17397',
				'title'                 => 'Statistics',
				'fields'                => [
					[
						'key'               => 'field_638263080b691',
						'label'             => 'Hints',
						'name'              => 'statistics_group',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'layout'            => 'table',
						'sub_fields'        => [
							[
								'key'               => 'field_638262863127d',
								'label'             => 'Impressions',
								'name'              => 'impressions',
								'aria-label'        => '',
								'type'              => 'number',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'min'               => '',
								'max'               => '',
								'placeholder'       => '',
								'step'              => '',
								'prepend'           => '',
								'append'            => '',
								'readonly'          => 1,
							],
							[
								'key'               => 'field_6382628f3127e',
								'label'             => 'Clicks',
								'name'              => 'clicks',
								'aria-label'        => '',
								'type'              => 'number',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'min'               => '',
								'max'               => '',
								'placeholder'       => '',
								'step'              => '',
								'prepend'           => '',
								'append'            => '',
								'readonly'          => 1,
							],
						],
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'afca-video-embed',
						],
					],
				],
				'menu_order'            => 1,
				'position'              => 'side',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			]
		);
	}

	/**
	 * ACF Thumbnail
	 *
	 * This loads the metabox related to the thumbnail.
	 *
	 * @return void
	 */
	private function acf_thumbnail() {
		acf_add_local_field_group(
			[
				'key'                   => 'group_63825d55a8ce7',
				'title'                 => 'Thumbnail',
				'fields'                => [
					[
						'key'               => 'field_63825d560413e',
						'label'             => 'Featured Image',
						'name'              => 'featured_image',
						'aria-label'        => '',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => '',
						'preview_size'      => 'medium',
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'afca-video-embed',
						],
					],
				],
				'menu_order'            => 2,
				'position'              => 'side',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 1,
			]
		);
	}

	/**
	 * ACF Video
	 *
	 * This loads the metabox related to the video link.
	 *
	 * @return void
	 */
	private function acf_video() {
		acf_add_local_field_group(
			[
				'key'                   => 'group_63825ae516486',
				'title'                 => 'Video',
				'fields'                => [
					[
						'key'               => 'field_63825ae66a67f',
						'label'             => 'Link',
						'name'              => 'video_link',
						'aria-label'        => '',
						'type'              => 'url',
						'instructions'      => 'Currently, we are supporting video links from YouTube and Vimeo.',
						'required'          => 1,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'placeholder'       => '',
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'afca-video-embed',
						],
					],
				],
				'menu_order'            => 1,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 1,
			]
		);
	}

	/**
	 * ACF Configurations
	 *
	 * This loads the metabox related to the configurations.
	 *
	 * @return void
	 */
	private function acf_configurations() {
		acf_add_local_field_group(
			[
				'key'                   => 'group_63825bac0de3f',
				'title'                 => 'Configurations',
				'fields'                => [
					[
						'key'               => 'field_63825bace97fc',
						'label'             => 'Appearance',
						'name'              => 'appearance_group',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'layout'            => 'table',
						'sub_fields'        => [
							[
								'key'               => 'field_63825bd9e97fd',
								'label'             => 'Primary Color',
								'name'              => 'primary_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							],
							[
								'key'               => 'field_63825c3fe97fe',
								'label'             => 'Second Color',
								'name'              => 'second_color',
								'aria-label'        => '',
								'type'              => 'color_picker',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'enable_opacity'    => 0,
								'return_format'     => 'string',
							],
						],
					],
					[
						'key'               => 'field_638ca9ee64983',
						'label'             => 'Video Box Size',
						'name'              => 'video_box_size',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'layout'            => 'table',
						'sub_fields'        => [
							[
								'key'               => 'field_638caa0464984',
								'label'             => 'Width',
								'name'              => 'width',
								'aria-label'        => '',
								'type'              => 'number',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => 480,
								'min'               => '',
								'max'               => '',
								'placeholder'       => '',
								'step'              => '',
								'prepend'           => '',
								'append'            => '',
							],
							[
								'key'               => 'field_638caa0e64985',
								'label'             => 'Height',
								'name'              => 'height',
								'aria-label'        => '',
								'type'              => 'number',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => 380,
								'min'               => '',
								'max'               => '',
								'placeholder'       => '',
								'step'              => '',
								'prepend'           => '',
								'append'            => '',
							],
						],
					],
					[
						'key'               => 'field_63825c57e97ff',
						'label'             => 'Controls',
						'name'              => 'controls_group',
						'aria-label'        => '',
						'type'              => 'group',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'layout'            => 'block',
						'sub_fields'        => [
							[
								'key'               => 'field_63825e81b76c8',
								'label'             => 'Select the controls you want to activate',
								'name'              => 'controls',
								'aria-label'        => '',
								'type'              => 'checkbox',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'choices'           => [
									'big_play_button'    => 'Big Play Button',
									'play_pause'         => 'Play/Pause',
									'volume_mute'        => 'Volume/Mute',
									'current_time_total' => 'Current Time / Total Video Time',
									'fullscreen'         => 'Fullscreen',
									'progress_bar'       => 'Progress Bar',
								],
								'default_value'     => [],
								'return_format'     => 'value',
								'allow_custom'      => 0,
								'layout'            => 'vertical',
								'toggle'            => 0,
								'save_custom'       => 0,
							],
						],
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'afca-video-embed',
						],
					],
				],
				'menu_order'            => 2,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 1,
			]
		);
	}

	/**
	 * ACF Shortcode
	 *
	 * This loads the metabox related to the shortcode.
	 *
	 * @return void
	 */
	private function acf_shortcode() {
		acf_add_local_field_group(
			[
				'key'                   => 'group_6383b7a80b229',
				'title'                 => 'Shortcode',
				'fields'                => [
					[
						'key'               => 'field_6383b7a82e586',
						'label'             => 'Shortcode',
						'name'              => 'shortcode',
						'aria-label'        => '',
						'type'              => 'text',
						'instructions'      => 'Copy the code below and paste it where you want to show the video.',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'default_value'     => '',
						'maxlength'         => '',
						'placeholder'       => '',
						'prepend'           => '',
						'append'            => '',
						'readonly'          => 1,
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => 'afca-video-embed',
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'side',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => true,
				'description'           => '',
				'show_in_rest'          => 0,
			]
		);
	}

	/**
	 * Custom admin columns
	 *
	 * This method will load the admin columns of the custom post type
	 *
	 * @return void
	 */
	private function custom_admin_columns() {
		add_filter(
			'manage_afca-video-embed_posts_columns',
			function( $columns ) {
				return array_merge( $columns, [ 'shortcode' => __( 'Shortcode', 'afca-embed-video-player' ) ] );
			}
		);

		add_action(
			'manage_afca-video-embed_posts_custom_column',
			function( $column_key, $post_id ) {
				if ( $column_key == 'shortcode' ) {
					$video_link = get_field( 'shortcode', $post_id );
					if ( $video_link ) {
						echo esc_html( $video_link );
					} else {
						echo '-';
					}
				}
			},
			10,
			2
		);
	}

}
