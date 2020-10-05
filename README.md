# Web Pure Data
* Contributors: opengeekv2
* Tags: music, pd
* Requires at least: 5.2
* Tested up to: 5.5
* Stable tag: 1.0.0
* Requires PHP: 5.6
* License: LGPLv3 or later
* License URI: https://www.gnu.org/licenses/lgpl-3.0.en.html

Plugin to upload, show and run Web Pure Data compatible Pure Data patches in WordPress sites.

## Installation

You can install it by uploading the plugin zip in Plugins > Add New > Upload Plugin.

## Description

This plugin allows you to upload Pure Data patches with the .pd extension in Media > Add New.

After that you can use the Shortcode [pd patch="put_uploaded_patch_url_here"] to run that patch in a post or page.

If you're building a theme you can also run the shortcdode using the [do_shortcode()](https://developer.wordpress.org/reference/functions/do_shortcode/) function.

## Frequently Asked Questions

### Why my Pure Data patch does not work?

Only patches compatible with the [WebPd](https://github.com/sebpiq/WebPd) Javascript library will work with this plugin.

### Why I can't see my Pure Data patch controls?

The [WebPd](https://github.com/sebpiq/WebPd) Javascript library does not support rendering controls at the moment so any patch you upload and run must be autonomous.

## Screenshots

1. There's no screenshots.

## Upgrade Notice

This plugin has no upgrades

## Changelog

### 1.0.0
* Allow .pd files to be uploaded in media.
* Provide "pd" shortcode.

## Build status

[![Build Status](https://travis-ci.com/opengeekv2/wordpress-web-pure-data.svg?branch=main)](https://travis-ci.com/opengeekv2/wordpress-web-pure-data)

## Included libraries

This plugin makes use of [WebPd](https://github.com/sebpiq/WebPd) Javascript library released under [LGPL-3-or-later](https://github.com/sebpiq/WebPd/blob/master/COPYING.LESSER) license.

You can get the source code of the WebPd Javascript library from its [GitHub repository](https://github.com/sebpiq/WebPd).

## License

This plugin is released under [LGPL-3-or-later](https://github.com/opengeekv2/wordpress-web-pure-data/blob/main/LICENSE) license.