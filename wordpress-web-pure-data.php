<?php
/**
 * Plugin entrypoint
 *
 * @package WordPressWebPureData
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Web Pure Data
 * Plugin URI:        https://github.com/opengeekv2/wordpress-web-pure-data
 * Description:       Plugin to upload, show and run Web Pure Data compatible Pure Data programs in WordPress sites.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Marc Mauri Alloza
 * Author URI:        https://github.com/opengeekv2
 * License:           LGPL-2.1-or-later
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       wpwpd
 * Domain Path:       /languages
 */

/**
 * Autoloading plugin clases and dependencies
 */
require 'vendor/autoload.php';

use WPWPD\WordPress_Web_Pure_Data;

new WordPress_Web_Pure_Data();
