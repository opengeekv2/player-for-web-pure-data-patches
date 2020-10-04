<?php
/**
 * Main plugin class
 *
 * @package WPWPD
 */

namespace WPWPD;

/**
 * Main plugin class
 *
 * @package WPWPD
 */
class WordPress_Web_Pure_Data {

	/**
	 * Construct
	 */
	public function __construct() {
		wp_register_script( 'webpd', plugin_dir_url( __DIR__ ) . 'assets/js/webpd-latest.min.js', array(), '0.3.1', true );
		add_filter( 'upload_mimes', array( $this, 'add_pd_mime_type' ) );
		add_shortcode( 'pd', array( $this, 'render_pd_shortcode' ) );
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
	 * The [pd] shortcode.  Accepts a pd file path and will ru the PureData patch with Web Pure Data.
	 *
	 * @param string[] $atts     Shortcode attributes. Default empty.
	 * @param string   $content  Shortcode content. Default null.
	 * @param string   $tag      Shortcode tag (name). Default empty.
	 *
	 * @return string
	 */
	public function render_pd_shortcode( $atts = array(), $content = null, $tag = '' ) {
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

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

		wp_enqueue_script( 'webpd' );
		$output = "<script>window.addEventListener('DOMContentLoaded', function () { fetch('{$pd_atts['patch']}').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);</script>";

		// enclosing tags.
		if ( ! is_null( $content ) ) {
			// secure output by executing the_content filter hook on $content.
			$output .= apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals

			// run shortcode parser recursively.
			$output .= do_shortcode( $content );
		}

		return $output;
	}

}
