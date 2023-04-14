<?php
namespace Afca\WP\Plugin\EmbedVideoPlayer;

class ShortcodeGenerator {

	// Variables
	private $shortcode_code;

	public function __construct( $code ) {
		$this->shortcode_code = $code;
	}

	public function generator( $post_ID ) {
		//Generator - generates a code
		$generated = sprintf(
			'[%1$s id=%2$d]',
			$this->shortcode_code,
			$post_ID
		);

		//Save - saves code in meta
		$this->save( 'field_6383b7a82e586', $generated );
	}

	/**
	 * Save shortcode in meta field
	 *
	 * This method will save the shortcode string in the meta field associated to the post Id.
	 *
	 * @param string $field_key The acf meta field key
	 * @param string $shortcode The post shortcode string
	 * @return void
	 */
	private function save( string $field_key, string $shortcode ) {
		if ( isset( $_POST['acf'][ $field_key ] ) ) {
			$_POST['acf'][ $field_key ] = $shortcode;
		}
	}

}
