# Player for Web Pure Data patches
* Contributors: opengeekv2
* Tags: music, pd, synth, player
* Requires at least: 5.2
* Tested up to: 5.7
* Stable tag: 1.0.2
* Requires PHP: 5.6
* License: LGPLv3 or later
* License URI: https://www.gnu.org/licenses/lgpl-3.0.en.html

Plugin to upload and run Web Pure Data compatible Pure Data patches in WordPress sites.

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

### 1.0.0 - Audacious Abs
* Allow .pd files to be uploaded in media.
* Provide "pd" shortcode.

### 1.0.1
* Escape URL provided in patch so it is not possible to inject js through that parameter.

### 1.0.2
* Tested up to 5.7

### 1.0.3
* Check publish workflow

## Contributing

If you wish to contribute to this plugin you can do it in [GitHub](https://github.com/opengeekv2/player-for-web-pure-data-patches).

Pick any issue or feature that fancies you and then write a comment in there so you can be assigned to it and we can discuss on how you may approach it.

There's a prepared development environment that you can use in [GitHub](https://github.com/opengeekv2/player-for-web-pure-data-patches-dev-env).

## Build status

![ci](https://github.com/opengeekv2/player-for-web-pure-data-patches/workflows/ci/badge.svg)
![qa](https://github.com/opengeekv2/player-for-web-pure-data-patches/workflows/qa/badge.svg)
[![codecov](https://codecov.io/gh/opengeekv2/player-for-web-pure-data-patches/branch/main/graph/badge.svg)](https://codecov.io/gh/opengeekv2/player-for-web-pure-data-patches)
![Psalm coverage](https://shepherd.dev/github/opengeekv2/player-for-web-pure-data-patches/coverage.svg)

## Included libraries

This plugin makes use of [WebPd](https://github.com/sebpiq/WebPd) Javascript library released under [LGPL-3.0-or-later](https://github.com/sebpiq/WebPd/blob/master/COPYING.LESSER) license.

You can get the source code of the WebPd Javascript library from its [GitHub repository](https://github.com/sebpiq/WebPd).

## License

This plugin is released under [LGPL-3.0-or-later](https://github.com/opengeekv2/player-for-web-pure-data-patches/blob/main/LICENSE) license.
