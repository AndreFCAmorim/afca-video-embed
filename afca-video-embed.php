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
define( 'AFCA_VE_PLUGIN_POST_TYPE', 'afca-video-embed' );
define( 'AFCA_VE_PLUGIN_SHORTCODE', 'show-embed-video' );

//Enqueue Admin Style
add_action( 'admin_enqueue_scripts', 'admin_style' );
function admin_style() {
	wp_enqueue_style( 'admin-style', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css', [], AFCA_VE_PLUGIN_VERSION );
}

/*
 * Register Post Types
 */
use Afca\EmbedVideoPlayer\PostType;
$post_type_class = new PostType();
add_action( 'init', [ $post_type_class, 'cptui_register_my_cpts_afca_video_embed' ] );
add_action( 'init', [ $post_type_class, 'cptui_register_my_taxes_afca_video_type' ] );

/*
 * Register ACF Meta fields
 */
$post_type_class->acf_meta_fields();

/*
 * Generate a shortcode on save post
 */
use Afca\EmbedVideoPlayer\ShortcodeGenerator;
$shortcode_class = new ShortcodeGenerator();
add_action( 'save_post_' . AFCA_VE_PLUGIN_POST_TYPE, [ $shortcode_class, 'generator' ], 10, 1 );

/*
 * Check if node modules folder exists
 */
use Afca\EmbedVideoPlayer\Video;
if ( is_dir( plugin_dir_path( __FILE__ ) . '/node_modules/video.js/dist' ) ) {
	add_action( 'wp_enqueue_scripts', 'register_videojs_scripts' );
	add_action( 'wp_enqueue_scripts', 'register_videojs_styles' );

	$video_class = new Video();
	$video_class->register_shortcode();
}

//Video JS :: Scripts
function register_videojs_scripts() {
	//Video.JS
	wp_register_script(
		'videojs_script',
		plugin_dir_url( __FILE__ ) . 'node_modules/video.js/dist/video.min.js',
		[ 'jquery' ],
		'7.20.3',
		true
	);
	wp_enqueue_script( 'videojs_script' );

	//VideoJS -> Youtube
	wp_register_script(
		'videojs_youtube_script',
		plugin_dir_url( __FILE__ ) . 'node_modules/videojs-youtube/dist/Youtube.min.js',
		[ 'jquery' ],
		'2.6.1',
		true
	);
	wp_enqueue_script( 'videojs_youtube_script' );
}

//Video JS :: Styles
function register_videojs_styles() {
	wp_register_style(
		'videojs_style',
		plugin_dir_url( __FILE__ ) . 'node_modules/video.js/dist/video-js.min.css',
		[],
		'7.20.3',
		false
	);
	wp_enqueue_style( 'videojs_style' );
}
