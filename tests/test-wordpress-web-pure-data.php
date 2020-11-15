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
	 * Test PD shortcode render.
	 */
	public function test_render_pd_shortcode() {
		global $wp_scripts;
		$wp_scripts                           = new WP_Scripts();
		$url                                  = 'https://google.com';
		$template                             = "window.addEventListener('DOMContentLoaded', function () { fetch('{$url}').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);";
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$player_for_web_web_pure_data_patches->render_pd_shortcode( array( 'patch' => $url ) );

		$this->assertTrue( wp_script_is( 'webpd' ) );

		global $wp_scripts;
		$this->assertEquals( $template, $wp_scripts->print_inline_script( 'webpd', 'after', false ) );
	}

	/**
	 * Test PD shortcode render escapes url.
	 */
	public function test_generate_pd_shortcode_escape_url() {
		global $wp_scripts;
		$wp_scripts                           = new WP_Scripts();
		$url                                  = "https://google.com');alert('hola');fetch('https://localhost:8443/wp-content/uploads/2020/10/main-1.pd";
		$template                             = "window.addEventListener('DOMContentLoaded', function () { fetch('https://google.com&#039;);alert(&#039;hola&#039;);fetch(&#039;https://localhost:8443/wp-content/uploads/2020/10/main-1.pd').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);";
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$player_for_web_web_pure_data_patches->render_pd_shortcode( array( 'patch' => $url ) );
		$this->assertTrue( wp_script_is( 'webpd' ) );

		$this->assertEquals( $template, $wp_scripts->print_inline_script( 'webpd', 'after', false ) );
	}

	/**
	 * Test PD shortcode render renders content.
	 */
	public function test_generate_pd_shortcode_renders_content() {
		global $wp_scripts;
		$wp_scripts                           = new WP_Scripts();
		$url                                  = "https://google.com');alert('hola');fetch('https://localhost:8443/wp-content/uploads/2020/10/main-1.pd";
		$template                             = "window.addEventListener('DOMContentLoaded', function () { fetch('https://google.com&#039;);alert(&#039;hola&#039;);fetch(&#039;https://localhost:8443/wp-content/uploads/2020/10/main-1.pd').then(function (response) { return response.text(); }).then(function (data) { var patch = Pd.loadPatch(data); Pd.start(); }); }, false);";
		$content                              = 'hola';
		$expected_content                     = '<p>hola</p>' . PHP_EOL;
		$player_for_web_web_pure_data_patches = new Player_For_Web_Pure_Data_Patches();

		$output = $player_for_web_web_pure_data_patches->render_pd_shortcode( array( 'patch' => $url ), $content );
		$this->assertTrue( wp_script_is( 'webpd' ) );

		$this->assertEquals( $template, $wp_scripts->print_inline_script( 'webpd', 'after', false ) );
		$this->assertEquals( $expected_content, $output );
	}

}
