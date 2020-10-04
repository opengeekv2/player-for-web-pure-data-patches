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

	/**
	 * Test add Pure Data Mime Type.
	 */
	public function test_render_pod_shorcode() {
		$mime_types['html']      = 'text/html';
		$wordpress_web_pure_data = new WordPress_Web_Pure_Data();

		$mime_types = $wordpress_web_pure_data->add_pd_mime_type( $mime_types );

		$this->assertEquals( 'text/html', $mime_types['html'] );
		$this->assertEquals( 'text/plain', $mime_types['pd'] );
	}

	/**
	 * Test PD shortcode render.
	 */
	public function test_render_pd_shortcode() {
		$url                     = 'https://google.com';
		$template                = "<script>window.addEventListener('DOMContentLoaded', function () { fetch('{$url}').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);</script>";
		$wordpress_web_pure_data = new WordPress_Web_Pure_Data();

		$rendered_shortcode = $wordpress_web_pure_data->render_pd_shortcode( array( 'patch' => $url ) );

		$this->assertEquals( $template, $rendered_shortcode );
	}

}
