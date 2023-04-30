<?php
namespace Afca\WP\Plugin\EmbedVideoPlayer;

class Assets {

	private string $version;
	private array  $dep_versions;

	/**
	 * __construct
	 *
	 * @param  string $plugin_version
	 * @return void
	 */
	public function __construct( string $plugin_version ) {
		$this->version      = $plugin_version;

		// Register hook to enqueue backend style
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_backend_style' ] );

		// Register hooks to enqueue frontend style and script
		add_action( 'init', [ $this, 'enqueue_frontend_style' ] );
		add_action( 'init', [ $this, 'enqueue_frontend_script' ] );
	}

	// Enqueues the frontend CSS file
	public function enqueue_frontend_style() {
		wp_enqueue_style( 'frontend-style', dirname( dirname( __FILE__ ) ) . '/assets/css/frontend.min.css', [], $this->version );
	}

	// Enqueues the frontend JavaScript file
	public function enqueue_frontend_script() {
		wp_enqueue_script(
			'video_embed_statistics_script',
			dirname( dirname( __FILE__ ) ) . '/assets/js/statistics.js',
			[ 'jquery' ],
			$this->version,
			true
		);
	}

	// Enqueues the backend CSS file
	public function enqueue_backend_style() {
		wp_enqueue_style( 'backend-style', dirname( dirname( __FILE__ ) ) . 'assets/css/backend.min.css', [], $this->version );
	}

	/**
	 * load video dependencies
	 *
	 * Enqueues all the dependencies needed for playing videos using Video.js, YouTube, and Vimeo.
	 *
	 * @param  array $dependencies_versions
	 * @return void
	 */
	public function load_video_dependencies( array $dependencies_versions = [] ) {
		$this->dep_versions = $dependencies_versions;

		add_action( 'init', [ $this, 'enqueue_videojs' ] );
		add_action( 'init', [ $this, 'enqueue_videojs_youtube' ] );
		add_action( 'init', [ $this, 'enqueue_videojs_vimeo' ] );
	}

	// Enqueues Video.js script and style
	public function enqueue_videojs() {
		wp_enqueue_script(
			'videojs_script',
			plugin_dir_url( __DIR__ ) . 'node_modules/video.js/dist/video.min.js',
			[ 'jquery' ],
			$this->dep_versions['videojs'],
			true
		);

		wp_enqueue_style(
			'videojs_style',
			plugin_dir_url( __DIR__ ) . 'node_modules/video.js/dist/video-js.min.css',
			[],
			$this->dep_versions['videojs'],
			false
		);
	}

	// Enqueues Video.js YouTube plugin script
	public function enqueue_videojs_youtube() {
		wp_enqueue_script(
			'videojs_youtube_script',
			plugin_dir_url( __DIR__ ) . '/node_modules/videojs-youtube/dist/Youtube.min.js',
			[ 'jquery' ],
			$this->dep_versions['videojs_youtube'],
			true
		);
	}

	// Enqueues Video.js Vimeo plugin script
	public function enqueue_videojs_vimeo() {
		wp_enqueue_script(
			'videojs_vimeo_script',
			plugin_dir_url( __DIR__ ) . '/node_modules/videojs-vimeo-tech/dist/Vimeo.min.js',
			[ 'jquery' ],
			$this->dep_versions['videojs_vimeo'],
			true
		);
	}

}
