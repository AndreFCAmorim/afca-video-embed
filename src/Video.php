<?php
namespace Afca\EmbedVideoPlayer;

class Video {
	private $helper;

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

				$video_data = [
					'id'    => $post_ID,
					'link'  => get_field( 'video_link', $post_ID ),
					'color' => [
						'primary'   => $this->helper->get_group_field( 'appearance_group', 'primary_color', $post_ID ),
						'secondary' => $this->helper->get_group_field( 'appearance_group', 'second_color', $post_ID ),
					],
					'box'   => [
						'width'  => $this->helper->get_group_field( 'box_group', 'width', $post_ID ),
						'height' => $this->helper->get_group_field( 'box_group', 'height', $post_ID ),

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

		return sprintf(
			'<video
				id="%1$s"
				class="video-js vjs-default-skin vjs-big-play-centered vjs-show-big-play-button-on-pause"
				width="%2$s" height="%3$s"
				preload="auto"
				playsinline
				data-setup=\'{ "techOrder": ["%4$s"], "sources": [{ "type": "%5$s", "src": "%6$s"}]%7$s}\'
				controls
			  >
			  </video>
			  ',
			$data['id'],
			$data['box']['width'],
			$data['box']['height'],
			'youtube',
			'video/youtube',
			$data['link'],
			$thumbnail,
		);
	}
}
