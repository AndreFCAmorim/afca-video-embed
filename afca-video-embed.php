<?php
/**
 * Plugin Name:       Embed Video Player
 * Plugin URI:        https://github.com/AndreFCAmorim/afca-video-embed
 * Description:       Embed Video Player WordPress Plugin
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            André Amorim
 * Author URI:        https://andreamorim.site/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       afca-embed-video-player
 * Domain Path:       /languages
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

//Constants
define( 'AFCA_VE_PLUGIN_VERSION', 1 );
define( 'AFCA_VE_PLUGIN_FOLDER', 'afca-video-embed' );

use Afca\EmbedVideoPlayer\PostType;
$post_type_class = new PostType();
add_action( 'init', [ $post_type_class, 'cptui_register_my_cpts_afca_video_embed' ] );
add_action( 'init', [ $post_type_class, 'cptui_register_my_taxes_afca_video_type' ] );
