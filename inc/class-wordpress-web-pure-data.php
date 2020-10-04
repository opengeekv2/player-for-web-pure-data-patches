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
		add_filter( 'upload_mimes', array( $this, 'add_pd_mime_type' ) );
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

}
