<?php
namespace Afca\WP\Plugin\EmbedVideoPlayer;

class MetaFields {

	/**
	 * __construct
	 *
	 * @param  string $lib_acf_path The path of acf lib.
	 * @param  string $lib_acf_url The url path of acf lib.
	 * @return void
	 */
	public function __construct( string $lib_acf_path, string $lib_acf_url ) {
		// Include the ACF plugin.
		include_once $lib_acf_path . 'acf.php';

		// Customize the url setting to fix incorrect asset URLs.
		add_filter(
			'acf/settings/url',
			function() use ( $lib_acf_url ) {
				return $lib_acf_url;
			}
		);

		//If function does not exists, add wp plugin lib
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Check if ACF Plugin is installed and active
		if ( ! is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
			//If not:
			// (Optional) Hide the ACF admin menu item.
			add_filter(
				'acf/settings/show_admin',
				function() {
					return false;
				}
			);
		}

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			//Statistics
			$this->acf_statistics();

			//Video
			$this->acf_video();

			//Configurations
			$this->acf_configurations();

			//Shortcode
			$this->acf_shortcode();

			//Custom admin columns
			$this->custom_admin_columns();

		}
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
								'type'              => 'text',
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
								'type'              => 'text',
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
								'default_value'     => '#1e73be',
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
								'default_value'     => '#dd3333',
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
								'default_value'     => '',
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
								'default_value'     => '',
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
						'layout'            => 'table',
						'sub_fields'        => [
							[
								'key'               => 'field_638ce037a2e29',
								'label'             => 'Autoplay',
								'name'              => 'autoplay',
								'aria-label'        => '',
								'type'              => 'true_false',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'message'           => '',
								'default_value'     => false,
								'ui_on_text'        => '',
								'ui_off_text'       => '',
								'ui'                => 1,
							],
							[
								'key'               => 'field_638ce069a2e2a',
								'label'             => 'Preload',
								'name'              => 'preload',
								'aria-label'        => '',
								'type'              => 'true_false',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'message'           => '',
								'default_value'     => true,
								'ui_on_text'        => '',
								'ui_off_text'       => '',
								'ui'                => 1,
							],
							[
								'key'               => 'field_638ce09aa2e2b',
								'label'             => 'Controls',
								'name'              => 'controls',
								'aria-label'        => '',
								'type'              => 'true_false',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'message'           => '',
								'default_value'     => true,
								'ui_on_text'        => '',
								'ui_off_text'       => '',
								'ui'                => 1,
							],
							[
								'key'               => 'field_63825e81b76c8',
								'label'             => 'Select the controls you want to activate',
								'name'              => 'controls_options',
								'aria-label'        => '',
								'type'              => 'checkbox',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => [
									[
										[
											'field'    => 'field_638ce09aa2e2b',
											'operator' => '==',
											'value'    => '1',
										],
									],
								],
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'choices'           => [
									'big_play_button'    => 'Big Play Button',
									'volume_mute'        => 'Volume/Mute',
									'current_time_total' => 'Current Time / Total Video Time',
									'fullscreen'         => 'Fullscreen',
									'progress_bar'       => 'Progress Bar',
								],
								'default_value'     => [
									'big_play_button',
									'volume_mute',
									'current_time_total',
									'fullscreen',
									'progress_bar',

								],
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
				return array_merge(
					$columns,
					[
						'shortcode'   => __( 'Shortcode', 'afca-embed-video-player' ),
						'impressions' => __( 'Impressions', 'afca-embed-video-player' ),
						'clicks'      => __( 'Clicks', 'afca-embed-video-player' ),
					]
				);
			}
		);

		add_action(
			'manage_afca-video-embed_posts_custom_column',
			function( $column_key, $post_id ) {
				switch ( $column_key ) {
					case 'shortcode':
						$shortcode = get_field( 'shortcode', $post_id );
						if ( $shortcode ) {
							echo esc_html( $shortcode );
						} else {
							echo '-';
						}
						break;
					case 'impressions':
						$impressions = get_field( 'impressions', $post_id );
						if ( $impressions ) {
							echo esc_html( $impressions );
						} else {
							echo '-';
						}
						break;
					case 'clicks':
						$clicks = get_field( 'clicks', $post_id );
						if ( $clicks ) {
							echo esc_html( $clicks );
						} else {
							echo '-';
						}
						break;
				}
			},
			10,
			2
		);
	}

}
