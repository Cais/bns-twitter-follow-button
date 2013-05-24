=== BNS Twitter Follow Button ===
Contributors: cais
Donate link: http://buynowshop.com
Tags: multi-widget, user-options, twitter, multiple-accounts, language-support, widget-only
Requires at least: 2.8
Tested up to: 3.6
Stable tag: 0.3.4
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html

Displays a Twitter Follow Button; and, includes shortcode functionality.

== Description ==

A widget to allow you to set the parameters of the Twitter Follow Button found here: https://twitter.com/about/resources/followbutton. This widget also creates a shortcode that can be used in posts and pages. Also to note, each instance of the shortcode or widget can use a different Twitter name so you can have multiple Twitter accounts listed on your website. Includes support of languages for the Follow Button using the two letter ISO-639-1 language code for English (en), French (fr), German (de), Italian (it), Spanish (es), Korean (ko) and Japanese (ja).

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `bns-tfbutton.php` to the `/wp-content/plugins/` directory
2. Activate through the 'Plugins' menu.
3. Place the BNS Twitter Follow Button widget appropriately in the Appearance | Widgets section of the dashboard.
4. Set options to personal preferences.

-- or -

1. Go to 'Plugins' menu under your Dashboard
2. Click on the 'Add New' link
3. Search for bns-twitter-follow-button
4. Install.
5. Activate through the 'Plugins' menu.
6. Place the BNS Twitter Follow Button widget appropriately in the Appearance | Widgets section of the dashboard.
7. Set options to personal preferences.

Reading this article for further assistance: http://wpfirstaid.com/2009/12/plugin-installation/

----
= Shortcode: bns_tfbutton =
Parameters are very similar to the plugin ...

*   'title'         => __('')
*   'twitter_name'  => '', // No @ symbol needed
*   'show_count'    => false
*   'button'        => false, // Blue
*   'text_color'    => '186487', // No # symbol needed
*   'link_color'    => ''
*   'width'         => '300px'
*   'align'         => '', // Left aligned
*   'lang'          => '' // default English

NB: Use the shortcode at your own risk!

== Frequently Asked Questions ==

= Where can I get support for this widget? =

Please note, support may be available on the WordPress Support forums; but, it may be faster to visit http://buynowshop.com/plugins/bns-ftbutton/ and leave a comment with the issue you are experiencing.

= Can I use this in more than one widget area? =

Yes, this plugin has been made for multi-widget compatibility. Each instance of the widget will display, if wanted, differently than every other instance of the widget.

= How can I style the plugin output? =

Yes, more to follow ... or read this page: http://dev.twitter.com/pages/follow_button

== Screenshots ==
1. The options panel.

== Other Notes ==
* Copyright 2011-2013, Edward Caissie (email : edward.caissie@gmail.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License version 2,
  as published by the Free Software Foundation.

  You may NOT assume that you can use any other version of the GPL.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

  The license for this software can also likely be found here:
  http://www.gnu.org/licenses/gpl-2.0.html

== Upgrade Notice ==
Please stay current with your WordPress installation, your active theme, and your plugins.

== Changelog ==
= 0.3.4 =
* Released May 2013
* Version number compatibility update

= 0.3.3 =
* Released February 2013
* Added code block termination comments
* Moved all code into class structure

= 0.3.2 =
* Documentation updates
* Remove load_plugin_textdomain as redundant

= 0.3.1 =
* Documentation updates
* Code format updates and clean-up
* Added license reference to 'readme.txt'

= 0.3 =
* released November 2011
* confirmed compatible with WordPress 3.3
* added PHPDoc style documentation
* added i18n support using `bns-tfb` text domain
* added WordPress version check for compatibility
* general code clean-up

= 0.2 =
* added support of languages for the Follow Button using the two letter ISO-639-1 language code
* languages supported: English (en); French (fr); German (de); Italian (it); Spanish (es); Korean (ko); and, Japanese (ja).
* updated readme (this file) with corrections to shortcode usage / parameters

= 0.1.1 =
* update to readme.txt file (typos and corrections)

= 0.1 =
* Initial Release - working beta version
* released June 1, 2011