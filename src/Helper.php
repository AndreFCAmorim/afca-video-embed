<?php
namespace Afca\EmbedVideoPlayer;

class Helper {

	/**
	 * Get field from group on acf
	 *
	 * @param string $group Name of the group
	 * @param string $field Name of the field
	 * @param int (Optional) $post_id The post Id
	 * @return meta-content Returns the content of the meta field
	 */
	public function get_group_field( string $group, string $field, int $post_id = 0 ) {
		$group_data = get_field( $group, $post_id );
		if ( is_array( $group_data ) && array_key_exists( $field, $group_data ) ) {
			return $group_data[ $field ];
		}
		return null;
	}

}
