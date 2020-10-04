<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Wordpress_Web_Pure_Data
 */

$wpwpd_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $wpwpd_tests_dir ) {
	$wpwpd_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $wpwpd_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $wpwpd_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $wpwpd_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 * @return void
 */
function wpwpd_manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/wordpress-web-pure-data.php';
}
tests_add_filter( 'muplugins_loaded', 'wpwpd_manually_load_plugin' );

// Start up the WP testing environment.
require $wpwpd_tests_dir . '/includes/bootstrap.php';
