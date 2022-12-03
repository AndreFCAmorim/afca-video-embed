<?php
namespace Afca\EmbedVideoPlayer;

class ShortcodeGenerator {

	public function generator( $post_ID ) {
		//Generator - generates a code
		$generated = sprintf(
			'[AFCA_VE_PLUGIN_SHORTCODE id=%1$d]',
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
