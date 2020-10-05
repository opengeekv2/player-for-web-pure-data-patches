# wordpress-web-pure-data
[![Build Status](https://travis-ci.com/opengeekv2/wordpress-web-pure-data.svg?branch=main)](https://travis-ci.com/opengeekv2/wordpress-web-pure-data)

Plugin to upload, show and run Web Pure Data compatible Pure Data patches in WordPress sites.

## Installation

You can install it by uploading the plugin zip in Plugins > Add New > Upload Plugin.

## Usage

This plugin allows you to upload Pure Data patches with the .pd extension in Media > Add New.

After that you can use the Shortcode [pd patch="put_uploaded_patch_url_here"] to run that patch in a post or page.

If you're building a theme you can also run the shortcdode using the [do_shortcode()](https://developer.wordpress.org/reference/functions/do_shortcode/) function.

## Limitations

Pure Data patches must be compatible with the [WebPd](https://github.com/sebpiq/WebPd) Javascript library.

## Included libraries

This plugin makes use of [WebPd](https://github.com/sebpiq/WebPd) Javascript library released under [LGPL-3-or-later](https://github.com/sebpiq/WebPd/blob/master/COPYING.LESSER) license.

You can get the source code of the WebPd Javascript library from its [GitHub repository](https://github.com/sebpiq/WebPd).

## License

This plugin is released under [LGPL-3-or-later](https://github.com/opengeekv2/wordpress-web-pure-data/blob/main/LICENSE) license.
