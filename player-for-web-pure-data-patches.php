<?php
/**
 * Plugin entrypoint
 *
 * @package WordPressWebPureData
 *
 * @wordpress-plugin
 * Plugin Name:       Player for Web Pure Data patches
 * Plugin URI:        https://github.com/opengeekv2/player-for-web-pure-data-patches
 * Description:       Plugin to upload and run Web Pure Data compatible Pure Data programs in WordPress sites.
 * Version:           1.0.3
 * Requires at least: 5.2
 * Requires PHP:      5.6
 * Author:            Marc Mauri Alloza
 * Author URI:        https://github.com/opengeekv2
 * License:           LGPL-3.0-or-later
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       p4wpdp
 * Domain Path:       /languages
 */

/**
 * Autoloading plugin clases and dependencies
 */
require 'vendor/autoload.php';

use P4WPDP\Player_For_Web_Pure_Data_Patches;

new Player_For_Web_Pure_Data_Patches();
