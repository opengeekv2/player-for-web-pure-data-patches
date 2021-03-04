<?php
/**
 * Main plugin class
 *
 * @package P4WPDP
 */

namespace P4WPDP;

/**
 * Main plugin class
 *
 * @package P4WPDP
 */
class Player_For_Web_Pure_Data_Patches {

	/**
	 * Construct
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_filter( 'upload_mimes', array( $this, 'add_pd_mime_type' ) );
		add_shortcode( 'pd', array( $this, 'render_pd_shortcode' ) );
	}

	/**
	 * Registers webpd script for inclusion
	 *
	 * @return void
	 */
	public function register_scripts() {
		wp_register_script( 'webpd', plugin_dir_url( __DIR__ ) . 'dist/js/webpd-latest.min.js', array(), '0.3.1', true );
	}

	/**
	 * Adds Pd Mime Type to set of uploadable Mime Types
	 *
	 * @param string[] $mime_types Array of regexp (key) and mime types (value) provided by WordPress.
	 *
	 * @return string[]
	 */
	public function add_pd_mime_type( $mime_types ) {
		$mime_types['pd'] = 'text/plain';

		return $mime_types;
	}

	/**
	 * The [pd] shortcode.  Accepts a pd file path and will run the PureData patch with Web Pure Data.
	 *
	 * @param string[] $atts     Shortcode attributes. Default empty.
	 * @param string   $content  Shortcode content. Default null.
	 * @param string   $tag      Shortcode tag (name). Default empty.
	 *
	 * @return string
	 */
	public function render_pd_shortcode( $atts = array(), $content = null, $tag = '' ) {
		$inline_script = $this->generate_webpd_inline_script( $atts, $tag );

		wp_enqueue_script( 'webpd' );

		wp_add_inline_script( 'webpd', $inline_script );

		$output = '';
		// enclosing tags.
		if ( ! is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content.
			/** @var string */
			$content = apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals

			$output .= do_shortcode( $content );
		}

		return $output;
	}

	/**
	 * Gets the pd shortcode parameters and builds the inline script.
	 *
	 * @param string[] $atts     Shortcode attributes. Default empty.
	 * @param string   $tag      Shortcode tag (name). Default empty.
	 *
	 * @return string
	 */
	private function generate_webpd_inline_script( $atts = array(), $tag = '' ) {
		$atts = array_change_key_case( $atts, CASE_LOWER );

		/**
		 * Varpd_atts type
		 *
		 * @var string[]
		 */
		$pd_atts = shortcode_atts(
			array(
				'patch' => '',
			),
			$atts,
			$tag
		);

		$patch = esc_url( $pd_atts['patch'] );

		return "window.addEventListener('DOMContentLoaded', function () { fetch('${patch}').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);";
	}

}
