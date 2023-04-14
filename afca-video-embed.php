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

/**
 * Get plugin information
 */
if ( ! function_exists( 'get_plugin_data') ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$plugin_data    = get_plugin_data( __FILE__ );
$plugin_version = $plugin_data['Version'];

/**
 * Load assets
 */
use Afca\WP\Plugin\EmbedVideoPlayer\Assets;
$assets = new Assets( $plugin_version );

/*
 * Register Ajax Functions
 */
use Afca\WP\Plugin\EmbedVideoPlayer\Ajax;
$ajax = new Ajax();

/*
 * Register Post Type
 */
use Afca\WP\Plugin\EmbedVideoPlayer\PostTypeBuilder;
$cpt_singular_name = 'afca-video-embed';
$embed_video_cpt   = new PostTypeBuilder(
	'Embed Video',
	'Embed Videos',
	$cpt_singular_name,
	true,
	6,
	'dashicons-format-video'
);

/**
 * Register ACF Meta fields
 */
use Afca\WP\Plugin\EmbedVideoPlayer\MetaFields;
new MetaFields(
	plugin_dir_path( __FILE__ ) . '/includes/acf/',
	plugin_dir_url( __FILE__ ) . '/includes/acf/',
);

/*
 * Generate a shortcode on save post
 */
use Afca\WP\Plugin\EmbedVideoPlayer\ShortcodeGenerator;
$shortcode = new ShortcodeGenerator( 'show-embed-video' );
add_action( 'save_post_' . $cpt_singular_name, [ $shortcode, 'generator' ], 10, 1 );

/*
 * Check if node modules folder exists
 */
use Afca\WP\Plugin\EmbedVideoPlayer\Video;
if ( is_dir( dirname( __FILE__ ) . '/node_modules/video.js/dist' ) && is_dir( dirname( __FILE__ ) . '/node_modules/videojs-youtube/dist/' ) ) {
	// Load dependencies
	$assets->load_video_dependencies(
		[
			'videojs'         => '7.20.3',
			'videojs_youtube' => '2.6.1',
			'videojs_vimeo'   => '2.6.1',
		]
	);

	// Register shortcode
	$video_class = new Video( 'show-embed-video');
	$video_class->register_shortcode();
}
