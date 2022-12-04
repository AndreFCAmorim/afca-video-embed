<?php
namespace Afca\EmbedVideoPlayer;

class Video {

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
					'id'       => 'testvideo', //$post_ID
					'link'     => get_field( 'video_link', $post_ID ),
					'color'    => [
						'primary'   => $this->get_group_field( 'appearance_group', 'primary_color', $post_ID ),
						'secondary' => $this->get_group_field( 'appearance_group', 'second_color', $post_ID ),
					],
					'controls' => $this->get_group_field( 'controls_group', 'controls', $post_ID ),
				];

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
		//Working with Youtube:
		//https://codepen.io/vinukumar-vs/pen/GRgpeqE

		//Skin:
		//https://codepen.io/VincentGarreau/pen/zLONLe
		//https://codepen.io/mattimatti/pen/KMPKxK

		return sprintf(
			'<video
				id="%1$s"
				class="video-js vjs-default-skin vjs-big-play-centered vjs-show-big-play-button-on-pause"
				width="640" height="264"
				preload="auto"
				playsinline
				data-setup=\'{ "techOrder": ["%2$s"], "sources": [{ "type": "%3$s", "src": "%4$s"}]}\'
				controls
		  	>
		  	</video>
		  	',
			$data['id'],
			'youtube',
			'video/youtube',
			$data['link']
		);
	}

	/**
	 * Get field from group on acf
	 *
	 * @param string $group Name of the group
	 * @param string $field Name of the field
	 * @param int (Optional) $post_id The post Id
	 * @return meta-content Returns the content of the meta field
	 */
	private function get_group_field( string $group, string $field, int $post_id = 0 ) {
		$group_data = get_field( $group, $post_id );
		if ( is_array( $group_data ) && array_key_exists( $field, $group_data ) ) {
			return $group_data[ $field ];
		}
		return null;
	}
}
