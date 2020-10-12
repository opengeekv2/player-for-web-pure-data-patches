<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Wordpress_Web_Pure_Data
 */

define('DB_HOST', 'mysql');

$p4wpdp_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $p4wpdp_tests_dir ) {
	$p4wpdp_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $p4wpdp_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $p4wpdp_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $p4wpdp_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 *
 * @return void
 */
function p4wpdp_manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/player-for-web-pure-data-patches.php';
}
tests_add_filter( 'muplugins_loaded', 'p4wpdp_manually_load_plugin' );

// Start up the WP testing environment.
require $p4wpdp_tests_dir . '/includes/bootstrap.php';
