<?php
/**
 * Class WordPressWebPureDataTest
 *
 * @package Wordpress_Web_Pure_Data
 */

use P4WPDP\Player_For_Web_Pure_Data_Patches;

/**
 * WordPress Web Pure Data Test.
 */
class Player_For_Web_Pure_Data_Patches_Test extends WP_UnitTestCase {

	/**
	 * Test add Pure Data Mime Type.
	 */
	public function test_add_pd_mime_type() {
		$mime_types['html']                   = 'text/html';
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$mime_types = $player_for_web_web_pure_data_patches->add_pd_mime_type( $mime_types );

		$this->assertEquals( 'text/html', $mime_types['html'] );
		$this->assertEquals( 'text/plain', $mime_types['pd'] );
	}

	/**
	 * Test add Pure Data Mime Type.
	 */
	public function test_render_pod_shorcode() {
		$mime_types['html']                   = 'text/html';
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$mime_types = $player_for_web_web_pure_data_patches->add_pd_mime_type( $mime_types );

		$this->assertEquals( 'text/html', $mime_types['html'] );
		$this->assertEquals( 'text/plain', $mime_types['pd'] );
	}

	/**
	 * Test PD shortcode render.
	 */
	public function test_render_pd_shortcode() {
		$url                                  = 'https://google.com';
		$template                             = "<script>window.addEventListener('DOMContentLoaded', function () { fetch('{$url}').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);</script>";
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$rendered_shortcode = $player_for_web_web_pure_data_patches->render_pd_shortcode( array( 'patch' => $url ) );

		$this->assertEquals( $template, $rendered_shortcode );
	}

}
