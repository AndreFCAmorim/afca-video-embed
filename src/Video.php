<?php
namespace Afca\EmbedVideoPlayer;

class Video {
	//Helper
	private $helper;
	//Colors
	private $color_primary;
	private $color_secundary;
	//Options
	private $options_style;

	public function __construct() {
		$this->helper = new Helper();
	}

	public function register_shortcode() {
		//Shortcode string
		$shortcode = sprintf(
			'%1$s',
			AFCA_VE_PLUGIN_SHORTCODE,
		);

		//Register the shortcode
		add_shortcode(
			$shortcode,
			function( $atts ) {
				if ( ! isset( $atts['id'] ) ) {
					return;
				}

				$post_ID = $atts['id'];

				$link       = get_field( 'video_link', $post_ID );
				$tech_order = '';
				$type       = '';
				if ( strpos( $link, 'youtube' ) ) {
					$tech_order = 'youtube';
					$type       = 'video/youtube';
				} elseif ( strpos( $link, 'vimeo' ) ) {
					$tech_order = 'Vimeo';
					$type       = 'video/vimeo';
				}

				$video_data = [
					'id'             => $post_ID,
					'box'            => [
						'width'  => $this->helper->get_group_field( 'video_box_size', 'width', $post_ID ),
						'height' => $this->helper->get_group_field( 'video_box_size', 'height', $post_ID ),

					],
					'link'           => $link,
					'configurations' => [
						'colors'   => [
							'primary'   => $this->helper->get_group_field( 'appearance_group', 'primary_color', $post_ID ),
							'secondary' => $this->helper->get_group_field( 'appearance_group', 'second_color', $post_ID ),
						],
						'autoplay' => $this->helper->get_group_field( 'controls_group', 'autoplay', $post_ID ),
						'preload'  => $this->helper->get_group_field( 'controls_group', 'preload', $post_ID ),
						'controls' => $this->helper->get_group_field( 'controls_group', 'controls', $post_ID ),
						'options'  => $this->helper->get_group_field( 'controls_group', 'controls_options', $post_ID ),
						'type'     => [
							'techOrder' => $tech_order,
							'type'      => $type,
						],
					],
				];

				$thumbnail_id = get_post_thumbnail_id( $post_ID );
				if ( ! empty( $thumbnail_id ) ) {
					$video_data['thumbnail'] = [
						'url'    => get_the_post_thumbnail_url( $post_ID ),
						'srcset' => wp_get_attachment_image_srcset( $thumbnail_id, 'medium' ),
						'alt'    => get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true ),
					];
				}

				return $this->render_video( $video_data );
			}
		);
	}

	/**
	 * Render the video
	 *
	 * @param array $data An array with the video data
	 * @return Html The video html
	 */
	private function render_video( array $data ) {
		$thumbnail = '';
		if ( isset( $data['thumbnail'] ) ) {
			//With thumbnail
			$thumbnail = sprintf(
				', "poster": "%1$s"',
				$data['thumbnail']['url'],
			);
		}

		//Load features
		$features = '';
		if ( isset( $data['configurations']['autoplay'] ) && $data['configurations']['autoplay'] !== false ) {
			$features .= 'autoplay ';
		}

		if ( isset( $data['configurations']['preload'] ) && $data['configurations']['preload'] !== false ) {
			$features .= 'preload="auto" ';
		}

		if ( isset( $data['configurations']['controls'] ) && $data['configurations']['controls'] !== false ) {
			$features .= 'controls ';
		}

		//Colors
		$this->color_primary   = $data['configurations']['colors']['primary'];
		$this->color_secundary = $data['configurations']['colors']['secondary'];

		//Load apperance
		//primary color and secondary color
		add_action(
			'wp_head',
			function() {
				printf(
					'<style>
					.vjs-big-play-button, .vjs-control-bar {
						background-color: %1$s !important;
					}

					.vjs-big-play-button span, .vjs-control-bar span {
						color: %2$s;
					}
				</style>',
					esc_html( $this->color_primary ),
					esc_html( $this->color_secundary ),
				);
			}
		);

		//Load controls
		$options = $data['configurations']['options'];
		if ( is_array( $options ) && count( $options ) > 0 ) {
			if ( array_search( 'big_play_button', $options, true ) === false ) {
				$this->options_style .= '.vjs-big-play-button{ display: none !important; }' . "\n";
			}

			if ( array_search( 'volume_mute', $options, true ) === false ) {
				$this->options_style .= '.vjs-volume-panel{ display: none !important; }' . "\n";
			}

			if ( array_search( 'current_time_total', $options, true ) === false ) {
				$this->options_style .= '.vjs-remaining-time{ display: none !important; }' . "\n";
			}

			if ( array_search( 'fullscreen', $options, true ) === false ) {
				$this->options_style .= '.vjs-fullscreen-control{ display: none !important;}' . "\n";
			}

			if ( array_search( 'progress_bar', $options, true ) == false ) {
				$this->options_style .= '.vjs-progress-control{ display: none !important; }' . "\n";
			}

			if ( ! empty( $this->options_style ) ) {
				add_action(
					'wp_head',
					function() {
						printf(
							'<style>
								%1$s
							</style>',
							esc_html( $this->options_style )
						);
					}
				);
			}
		}

		//Return video player html
		return sprintf(
			'<video
				id="%1$s"
				class="%2$s"
				width="%3$s"
				height="%4$s"
				data-setup=\'{ "techOrder": ["%5$s"], "sources": [{ "type": "%6$s", "src": "%7$s"}]%8$s}\'
				%9$s
			>
			</video>
			',
			$data['id'],
			'video-js vjs-default-skin vjs-big-play-centered vjs-show-big-play-button-on-pause',
			$data['box']['width'],
			$data['box']['height'],
			$data['configurations']['type']['techOrder'],
			$data['configurations']['type']['type'],
			$data['link'],
			$thumbnail,
			$features,
		);
	}
}
