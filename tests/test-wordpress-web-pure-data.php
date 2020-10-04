<?php
/**
 * Class WordPressWebPureDataTest
 *
 * @package Wordpress_Web_Pure_Data
 */

use WPWPD\WordPress_Web_Pure_Data;

/**
 * WordPress Web Pure Data Test.
 */
class WordPress_Web_Pure_Data_Test extends WP_UnitTestCase {

	/**
	 * Test add Pure Data Mime Type.
	 */
	public function test_add_pd_mime_type() {
		$mime_types['html']      = 'text/html';
		$wordpress_web_pure_data = new WordPress_Web_Pure_Data();

		$mime_types = $wordpress_web_pure_data->add_pd_mime_type( $mime_types );

		$this->assertEquals( 'text/html', $mime_types['html'] );
		$this->assertEquals( 'text/plain', $mime_types['pd'] );
	}
}
