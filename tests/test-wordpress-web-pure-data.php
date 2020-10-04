<?php
/**
 * Class WordPressWebPureDataTest
 *
 * @package Wordpress_Web_Pure_Data
 */

use WordpressWebPureData\WordpressWebPureData;

/**
 * WordPress Web Pure Data Test.
 */
class WordPressWebPureDataTest extends WP_UnitTestCase {

	/**
	 * Test add Pure Data Mime Type.
	 */
	public function test_add_pd_mime_type() {
		$mime_types['html']      = 'text/html';
		$wordpress_web_pure_data = new WordpressWebPureData();

		$mime_types = $wordpress_web_pure_data->add_pd_mime_type( $mime_types );

		$this->assertEquals( 'text/html', $mime_types['html'] );
		$this->assertEquals( 'text/plain', $mime_types['pd'] );
	}
}
