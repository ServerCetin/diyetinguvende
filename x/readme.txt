=== Simple Ajax Chat ===

Plugin Name: Simple Ajax Chat
Plugin URI: https://perishablepress.com/simple-ajax-chat/
Description: Displays a fully customizable Ajax-powered chat box anywhere on your site.
Tags: ajax, chat, chatbox, forum, messaging,  html5, im, instant message
Author: Jeff Starr
Author URI: https://plugin-planet.com/
Donate link: https://monzillamedia.com/donate.html
Contributors: specialk
Requires at least: 4.1
Tested up to: 5.3
Stable tag: 20191105
Version: 20191105
Requires PHP: 5.6.20
Text Domain: simple-ajax-chat
Domain Path: /languages
License: GPL v2 or later

Displays a fully customizable Ajax-powered chat box anywhere on your site.



== Description ==

> The simplest possible persistent chat solution!

Simple Ajax Chat makes it easy for your visitors to chat with each other on your website. There already are a number of decent chat plugins, but I wanted one that is simple yet fully customizable with all the features AND outputs clean HTML markup.

> Check out the [Live Demo of Simple Ajax Chat &raquo;](https://wp-mix.com/chat/)

**Core Features**

* Designed to be the simplest possible *persistent* chat
* Works with all mobile devices (iPhone, Android, et al)
* Ajax goodness loads new chats without refreshing the page
* Allow anyone to chat or restrict chat to logged-in users
* Display chat messages in ascending or descending order
* Option to play sound alert for chat messages
* Option to disable collection of IP data
* Display the chat box in multiple locations
* Display chat form easily via shortcode
* Export all chat messages via CSV file
* Automatic emoji icons supported :)
* Regularly updated & "future proof"
* Super strong anti-spam security

**Form Features**

* Clean markup makes it easy to style the appearance as desired
* Includes default CSS styles and enables custom CSS via settings
* Display form on any Post or Page with the SAC Shortcode
* Display form anywhere in your theme with the SAC Template Tag
* Includes template of all CSS hooks (see `/resources/sac.css`)
* Chat markup includes `sac-online` class for online users
* New chat messages fade-in with custom duration and color
* Timestamp for each chat message included in markup

**Settings Features**

* Plug-n-play functionality, no configuration required
* Lots of settings available to customize every detail
* Super-slick toggling settings screen keeps it simple
* Built-in control panel to edit and delete chats
* Built-in blacklist to ban specific phrases from chat
* Option to use logged-in username as the chat name
* On-demand restoration of all default settings
* Automatically clear chats at set time interval

**Customize Everything**

* Set custom limit on the number of chat messages
* Set custom limit on the length of each chat message
* Option to require login/registration to participate
* Option to enable/disable URL field for usernames
* Option to use textarea for larger input field
* Customize the update interval for the Ajax-requests
* Customize the fade-duration for new chat messages
* Customize the intro and outro colors for new chats
* Customize the default message and admin name
* Customize the appearance with your own CSS
* Option to enable/disable custom styles
* Option to load the JavaScript only when chat box is displayed
* Options to add custom content to the chat box and chat form
* Alternate audio clips available to customize the alert sound
* Action and filter hooks provided for advanced customization

Plus much more! :)

**Privacy**

This plugin collects voluntary user chat data (i.e., Name, Chat Message, and optional URL field). It also gives the administrator the option to collect or not collect user IP information. Aside from those two things, this plugin does not collect or store any user data. Further, this plugin does not set any cookies, and it does not connect to any third-party locations. Thus, with the exception of optional IP collection, this plugin does not affect user privacy in any way.

> Works perfectly with or without Gutenberg Block Editor

**Translations**

Simple Ajax Chat supports [translation into any language &raquo;](https://translate.wordpress.org/projects/wp-plugins/simple-ajax-chat)



== Installation ==

**Installation**

1. Upload the plugin to your blog and activate
2. Visit the settings to configure your options

[More info on installing WP plugins](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins)


**Usage**

Once the settings are configured, you can display the form anywhere using the shortcode or template tag.

__Shortcode__

Use this shortcode to display the chat box on a post or page:

`[sac_happens]`

__Template Tag__

Use this template tag to display the chat box anywhere in your theme template:

`<?php if (function_exists('simple_ajax_chat')) simple_ajax_chat(); ?>`


**Upgrades**

To upgrade Simple Ajax Chat, remove the old version and replace with the new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically.

__Note:__ uninstalling the plugin from the WP Plugins screen results in the _removal of all settings and chat messages_ from the WP database. 


**Restore Default Options**

To restore default plugin options, either uninstall/reinstall the plugin, or visit the plugin settings &gt; Restore Default Options.


**Uninstalling**

Simple Ajax Chat cleans up after itself. All plugin settings and chat messages will be removed from your database when the plugin is uninstalled via the Plugins screen.


**Stopping spam**

This plugin works in two modes:

* "Open Air" mode - anyone can chat
* "Private" mode - only logged-in users can chat

"Private" mode stops all automated spam, but registered users may still send "spammy" chat messages. Likewise, the "Open Air" mode is super effective at blocking automated spam, but some manual spam may get through. As a general rule, the longer your chat forum is online, the more of a target it will be for spam.

Alternately/additionally you can [use .htaccess to block spammers](https://wp-mix.com/htaccess-block-spammer/). It's an easy, super-effective method for controlling access to your site.


**Like the plugin?**

If you like Simple Ajax Chat, please take a moment to [give a 5-star rating](https://wordpress.org/support/plugin/simple-ajax-chat/reviews/?rate=5#new-post). It helps to keep development and support going strong. Thank you!



== Upgrade Notice ==

To upgrade Simple Ajax Chat, remove the old version and replace with the new version. Or just click "Update" from the Plugins screen and let WordPress do it for you automatically.

__Note:__ uninstalling the plugin from the WP Plugins screen results in the _removal of all settings and chat messages_ from the WP database. 



== Screenshots ==

1. Simple Ajax Chat: Chat Box
2. Simple Ajax Chat: Plugin Settings (panels toggle open/closed)

More screenshots available at the [SAC Homepage](https://perishablepress.com/simple-ajax-chat/#screenshots).



== Frequently Asked Questions ==

**How do I change the alert sound?**

Open the directory `/resources/audio/` and replace the files `msg.mp3` and `msg.ogg` with your desired audio files. You will notice lots of alternate sound files included in that same directory. Simply rename any pair of files to replace the defaults.


**Where can I find a complete list of CSS selectors for styling the form?**

Check out `sac.css` located in the `resources` directory.


**Can we auto-delete chat messages on a set time interval?**

Yes, please see this post at WP-Mix.com: [Auto-Clear Chats](https://wp-mix.com/simple-ajax-chat-auto-clear-chats/).


**Does it work with mobile devices?**

Yep, the chat plugin works great on iPhones, Android devices, and just about anything that supports JavaScript.. the functionality is achieved using Ajax.


**Is it possible to whitelist SAC plugin files?**

Yes, check out [Simple Ajax Chat .htaccess whitelist](https://wp-mix.com/simple-ajax-chat-htaccess-whitelist/) and/or [Whitelist POST access with .htaccess](https://wp-mix.com/whitelist-post-access-htaccess/)


**How do i hide "Latest Message: X minutes ago" in the chatbox?**

Add this CSS: `#sac-latest-message { display: none; }`

You can add that to the plugin setting, "Custom CSS styles" or your theme styles, wherever. If adding via the plugin setting, make sure that the associated setting, "Enable custom styles" also is enabled.


**How do I hide the Name, URL, and Message labels on the chat form?**

Add this CSS: `#sac-form label { display: none; }`

You can add that to the plugin setting, "Custom CSS styles" or your theme styles, wherever. If adding via the plugin setting, make sure that the associated setting, "Enable custom styles" also is enabled.


**Is it able to remove the "say it" button and just have send when press enter?**

Add CSS: `#sac-user-submit { display: none; }`

You can add that to the plugin setting, "Custom CSS styles" or your theme styles, wherever. If adding via the plugin setting, make sure that the associated setting, "Enable custom styles" also is enabled.


**The form is not displaying correctly, it looks all messed up. How do I fix this?**

Simple Ajax Chat is designed to look great on any of the default WP themes and most other themes as well. Even so, every theme is different, and it's impossible to test on the hundreds of thousands of themes that are available. So if the chat form is not looking awesome on your theme, it's because your theme for whatever reason is applying its own particular styles. If this is the case, you can try disabling the plugin setting to "Enable custom styles". If that doesn't help, you can include your own custom CSS, or customize the plugin's default styles. Alternately, you may include custom CSS via your theme's stylesheet, and/or modify your theme's CSS as needed to make things display as desired. Tip: to see how the chat form *should* look, check it out using any of the default WP themes.


**The chat form is visible but new chat messages are not displayed.**

If this is happening, and/or if you are receiving a "Failed opening required" error message, most likely your site's `wp-load.php` file is not located in the usual default location (i.e., it has been moved to a custom location). If this is the case, you will need to edit the paths in `/simple-ajax-chat-core.php` (line 4) and `/resources/sac.php` (line 10). At some point I will be revamping the plugin so that this modification won't be necessary.


**How do I fix weird characters displayed in the chat box?**

If you are seeing question marks or other weird characters or symbols in chat messages, you can try one of the following solutions:

* Uninstall (delete) the plugin, and then re-install. Note that this technique resets all settings and deletes all chat messages.
* Or, if you don't want to lose any settings or chat messages, you can run the following SQL command: `ALTER TABLE wp_ajax_chat CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;`

Either of these techniques should resolve any weird character issues. Note that the SQL command assumes you are using the default database prefix, `wp_`. So make sure to edit that part of the command if you are using a custom database prefix.


**How do I customize the login-required message?**

By default, the login-required message is "You must be a registered user to participate in this chat." To customize this message, check out [this forum post](https://wordpress.org/support/topic/better-integration-with-buddypress/#post-9368504).


**Chat Box not working in certain browsers (e.g., Chrome)?**

Certain plugins (e.g., Shield Security) may implement security headers that prevent SAC from working properly. To resolve this issue, visit the "HTTP Headers" tab and go to "Security Headers tab" (or similar depending on which plugin you are using). There you can set the "Referrer Policy" to "Same Origin" and then save changes. SAC immediately should start working properly, but you also may need to clear the browser cache and hard reload the page.


**Got a question?**

Send any questions or feedback via my [contact form](https://perishablepress.com/contact/)



== Support development of this plugin ==

I develop and maintain this free plugin with love for the WordPress community. To show support, you can [make a donation](https://monzillamedia.com/donate.html) or purchase one of my books: 

* [The Tao of WordPress](https://wp-tao.com/)
* [Digging into WordPress](https://digwp.com/)
* [.htaccess made easy](https://htaccessbook.com/)
* [WordPress Themes In Depth](https://wp-tao.com/wordpress-themes-book/)

And/or purchase one of my premium WordPress plugins:

* [BBQ Pro](https://plugin-planet.com/bbq-pro/) - Super fast WordPress firewall
* [Blackhole Pro](https://plugin-planet.com/blackhole-pro/) - Automatically block bad bots
* [Banhammer Pro](https://plugin-planet.com/banhammer-pro/) - Monitor traffic and ban the bad guys
* [GA Google Analytics Pro](https://plugin-planet.com/ga-google-analytics-pro/) - Connect your WordPress to Google Analytics
* [USP Pro](https://plugin-planet.com/usp-pro/) - Unlimited front-end forms

Links, tweets and likes also appreciated. Thanks! :)



== Changelog ==

If you like Simple Ajax Chat, please take a moment to [give a 5-star rating](https://wordpress.org/support/plugin/simple-ajax-chat/reviews/?rate=5#new-post). It helps to keep development and support going strong. Thank you!


**20191105**

* Updates styles for plugin settings page
* Tests on WordPress 5.3

**20190903**

* Fixes PHP Warning: `stristr()`: Empty needle warning
* Tests on WordPress 5.3 (alpha)

**20190902**

* Improves loading of scripts and core files
* Improves logic of `sac_enqueue_scripts()`
* Updates some links to https
* Tests on WordPress 5.3 (alpha)

**20190429**

* Bumps [minimum PHP version](https://codex.wordpress.org/Template:Server_requirements) to 5.6.20
* Tweaks plugin settings screen content
* Updates default translation template
* Tests on WordPress 5.2

**20190308**

* Updates `sac_plugin_action_links()`
* Adds check for admin user for settings shortcut link
* Tweaks plugin settings screen UI
* Generates new default translation template
* Tests on WordPress 5.1 and 5.2 (alpha)

**20190220**

* Tests on WordPress 5.1

**20181114**

* Adds homepage link to Plugins screen
* Updates default translation template
* Tests on WordPress 5.0

**20181009**

* Fixes PHP Deprecated notice, "The each() function is deprecated"
* Further tests on WP versions 4.9 and 5.0 (alpha)

**20180820**

* Refines some details on the plugin settings page
* Replaces `wp_filter_nohtml_kses` with `wp_strip_all_tags` for custom CSS
* Adds `rel="noopener noreferrer"` to all [blank-target links](https://perishablepress.com/wordpress-blank-target-vulnerability/)
* Updates GDPR blurb and donate link
* Further tests on WP versions 4.9 and 5.0 (alpha)

**20180508**

* Adds option to disable collection of IP address information
* Adds `rel="noopener noreferrer"` to relevant `_blank` target links
* Increases max number of characters per chat (from 200 to 1000)
* Escapes some attributes and markup in the plugin settings
* Bugfix: Display Mode should not apply to logged-in users
* Removes text shadows and borders on chat-date tooltips
* Updates Show Support panel
* Tweaks settings page UI
* Generates new translation template
* Updates plugin image files
* Tests on WordPress 5.0 (alpha)

**20171106**

* Response code changed to 200 for "JavaScript not enabled" errors
* Improves functionality of `simple-ajax-chat-core.php`

**20171105**

* To help stop spam on public chat forums, SAC now requires JavaScript
* Tests on WordPress 4.9

**20171104**

* Removes extra `manage_options` check for settings validation
* Tests on WordPress 4.9

**20171103**

* Adds further support for customizing logged username
* Fixes bug with non-JavaScript chat submission
* Tests on WordPress 4.9

**20171023**

* Adds "Export Chats" feature via plugin settings screen
* Adds tooltips to display the date/time of chat messages
* Adds "Display Mode" setting to display the chat messages as "read-only"
* Changes `id` attribute for login-required message: `#sac-panel` is now `#sac-output`
* Adds filter hooks, `sac_chat_time`, `sac_time_since`, `sac_logged_username`
* Updates default CSS for the setting, "Custom CSS styles"
* Renames span class from `name` to `sac-chat-name` in chat list
* Adds extra `manage_options` capability check to modify settings
* Replaces `target="_blank"` attributes with `rel="external"`
* Changes default URL value from `http://` to `https://`
* Improves SAC database creation functionality
* Streamlines Support panel in plugin settings
* Tests on WordPress 4.9

**20170731**

* Adds filter hook `sac_require_login_message`
* Fixes HTML for chat messages on plugin settings page
* Tests on WordPress 4.9 (alpha)

**820170325**

* Tweaked readme.txt :)

**820170324**

* Updates alert panel functionality
* Removes colons `:` from chat form labels
* Adds another layer of security against spam
* Tweaks styles on plugin settings page
* Adds class `sac-online` to chat messages of online users
* Removes extraneous div when user is logged out and login is required
* Improves styles for logged out users when login is required
* Updates database creation script
* Refines display of settings panels
* Updates show support panel in plugin settings
* Replaces global `$wp_version` with `get_bloginfo('version')`
* Fixes some incorrect translation domains
* Generates new default translation template
* Tests on WordPress version 4.8

**20161116**

* Fixed session already started notice
* Fixed call to undefined function error
* Relocated `session_unset()` function
* Added function `sac_is_session_started()`
* Improved security of session cookies
* Updated plugin author URL
* Changed stable tag from trunk to latest version
* Refactored `add_sac_links()` function
* Updated URL for rate this plugin links
* Improved default style for abbr tags
* Regenerated default language template
* Tests on WordPress version 4.7 (beta)

**20160811**

* Streamlined and optimized plugin settings page
* Replaced `_e()` with `esc_html_e()` or `esc_attr_e()`
* Replaced `__()` with `esc_html__()` or `esc_attr__()`
* Added plugin icons and larger banner image
* Renamed text-domain from "sac" to "simple-ajax-chat"
* Removed local translations in favor of [GlotPress](https://make.wordpress.org/polyglots/handbook/tools/glotpress-translate-wordpress-org/)
* Added sixty-minute interval for auto-clearing chats
* Fixed bug with targeted URLs including parameters
* Added `sac_filter_user_url` hook to enable filtering of user URL
* Added more attributes to allowed tags for custom content
* Renamed `sac_process_chat_action` to `sac_process_chat`
* Removed `sac_process_chat_filter` hook
* Added `sac_process_chat_name` filter hook
* Added `sac_process_chat_text` filter hook
* Added `sac_process_chat_url` filter hook
* Generated new translation template
* Improved translation support
* Tested on WordPress 4.6

**20160408**

__Important!__ Two plugin files have changed names in this version. So DEACTIVATE the plugin BEFORE performing the update. Then after upgrading, reactivate the plugin and you're good to go.

* Refactored plugin JavaScript for better performance
* Swapped names of core plugin and chat process files
* Added more granular control over script loading
* Further testing on WordPress version 4.5 beta

**20160401**

* Refactored simple-ajax-chat-core.php
* Replaced sac_add_to_head() with sac_enqueue_scripts()
* Removed unnecessary $user_ID and get_currentuserinfo() in simple_ajax_chat()
* Removed unnecessary $user_ID, $user_identity, and get_currentuserinfo() in sac_happens()
* Refactored uninstall.php
* Refactored simple-ajax-chat.php
* Optimized nonce handling
* Refactored simple-ajax-chat-form.php
* Restyled default chat/form display
* Removed redundant default options
* Tweaked simple-ajax-chat-admin.php
* Added `sac_process_chat_action` hook
* Added `sac_process_chat_filter` hook
* Added auto-clear chats cron functionality
* Added sac_truncate_chats_action hook
* sac_truncate_chats_interval_filter hook
* Added more chat alert sound files
* Removed player.swf file (not used)
* Changed the default alert sound
* Removed redundant esc_sql() from edit chat and delete chat functions
* Added stripslashes() to name display on form, and to edit/add chat functions
* Removed stripslashes() from plugin settings screen
* Added Slovak translation (thanks to lulu108)
* Increased size of manage chat buttons
* sac.php now includes WP the same way as simple-ajax-chat.php
* Replaced icon with retina version
* Added screenshot to readme/docs
* Added retina version of banner
* Reorganized and refreshed readme.txt
* Tested on WordPress version 4.5 beta

**20151110**

* Updated heading hierarchy in plugin settings
* Added missing get_currentuserinfo() where applicable
* Updated some i18n code and added French translation (Thanks to alysko)
* Added Russian translation (Thanks to arniarni)
* Improved logic of database query in sac_shout_edit()
* Added esc_url() to sac_add_to_head()
* Updated default translation template
* Updated minimum version requirement
* Tested on WordPress 4.4 beta

**20150808**

* Tested on WordPress 4.3
* Updated minimum version requirement
* Fixed 404/500 error for certain setups

**20150507**

* Tested with WP 4.2 + 4.3 (alpha)
* Changed a few "http" links to "https"
* Fixed XSS vulnerability with add_query_arg()
* Added primary key flag to create database function
* Bugfix: form not submitting when JavaScript disabled
* Improved logic in simple-ajax-chat.php
* Added nonce security to chat form
* Added support for SSL/https
* Added sac_censor_replace filter to customize censored words
* Added isset() to stop PHP warning

**20150316**

* Tested with latest version of WP (4.1)
* Increased minimum version to WP 3.8
* Added $sac_wp_vers for version check
* Added Text Domain and Domain Path to file header
* Removed deprecated screen_icon()
* Added alert notice for donations
* Streamline/fine-tune plugin code
* Replaced time() with current_time() throughout plugin
* Added timestamp for each chat via data-time attribute
* Replace $user_level and $sac_admin_user_level with current_user_can()
* New feature: option to set max number of allowed chats
* New feature: option to set max number of characters per chat
* New feature: option to set max number of characters in username
* Replaced hard-coded values for max chats/chars/name with options
* Revamped chat-order functionality (Thanks to MartinW2)
* Added line breaks to initJavaScript()
* Added rows="5" cols="50" to chat message textarea
* Updated auto-link regex, fixes backslash appended to URL
* Think I fixed the backslash-before-apostrophes issue, let me know!
* Replaced default .mo/.po templates with .pot template

**20140923**

* Tested on latest version of WordPress (4.0)
* Increased minimum version requirement to WP 3.7
* Added conditional check to min-version function
* Added option to display logged-in username as chat name
* Improved logic of simple_ajax_chat()
* Improved logic of sac_addData()
* Improved logic in core and admin files
* Increased default username max-length
* Fine-tuned plugin settings page
* Removed vestigial killswitch variable
* Fixed issue where special characters were not displaying correctly
* Replaced hardcoded paths with WP tags (e.g., wp-content directory)
* Replaced $user_nickname global with wp_get_current_user()
* Minified portions of the SAC JavaScript file for better performance
* Added conditional check for $sac_lastID is numeric
* Now using sanitize_text_field() for IPs
* Replaced htmlspecialchars() with sanitize_text_field()
* Replaced sac_special_chars() with esc_url() for user URL
* Replaced htmlentities(), stripslashes(), sac_clean() with sanitize_text_field()
* Replaced PHP tags with WP tags in sac_special_chars()
* Updated mo/po translation files

**20140305**

* New feature: added setting to display chats in ascending or descending order (beta)
* Improved logic for creating chat db table, fixes "mysql_list_tables" deprecated error
* Added various CSS selectors to chat messages for custom styling
* Added support for localization/translation

**20140123**

* Tested with latest WordPress (3.8)
* Added trailing slash to load_plugin_textdomain()
* Fixed 3 incorrect _e() tags in simple-sjax-chat-admin.php
* Edited setting description for "Require log in?" for accuracy

**20131107**

* Removed `delete_option('sac_delete');` from uninstall.php
* Replaced `application/x-javascript` with `` in sac.php
* Replaced `add_plugin_links` with `add_sac_links` in simple-ajax-core.php

**20131106**

* Replaced original header codes and WP includes in sac.php

**20131105**

* Removed 3x "&Delta;" from die() for better security
* Added "rate this plugin" link on Plugins and SAC settings screens
* Replaced 3x "wpdb->escape" with "esc_sql" in simple-ajax-chat-core.php
* Filter server variables with built-in simple-ajax-chat-admin.php (lines 65/66)
* Improved security when submitted chat fails (simple-ajax-chat.php)
* Specified no border for smileys in filter_smilies()
* Added localized timestamp of last chat to span.name in sac.php
* Localized "ago" in sac-admin, sac-core, and sac-form
* Localized sac_time_since() in simple-ajax-core.php
* Improved header codes and WP includes in sac.php
* Fixed bug where chats don't work if audio is disabled
* Added uninstall.php to remove options and chat table upon uninstall
* Enhanced functionality of plugin settings page
* Tested with latest version of WordPress (3.7)
* General code maintenance and cleanup
* Added support for localization

**20130725**

* Tightened form security
* Tightened plugin security
* Updated deprecated functions
* Resolved some PHP Notices

**20130713**

* Improved localization support
* Replaced some deprecated template tags

**20130712**

* Reorganized file/directory structure
* Separated Ajax stuff from core plugin
* Implemented strong anti-spam measures
* Many functions rewritten to maximize native WP functionality
* Improved audio support for chat alerts, fixed Safari bug
* Fixed: case-insensitive banned phrases
* Fixed: default options not working on install
* Fixed: a bunch of annoying PHP Notices
* Added .sac-reg-req for registration message div#sac-panel
* Updated CSS skeleton with new selector (@ "/resources/sac.css")
* Fixed: enable/disable links for usernames now works properly
* General code check n clean
* added comments to the .htaccess file (no active rules are included)

**20130104**

* Added JavaScript to set up sound-alerts (fixes undefined variable error)

**20130103**

* Added margins to submit buttons (now required in WP 3.5)
* Added "div#sac-panel p {}" to default CSS
* Added links to demo in readme.txt file
* Updated all instances of $wpdb->prepare with new syntax
* Added option for sound to play for new chat messages (note: chat-sound technique is borrowed from "Pierre's Wordspew")

**20121206**

* Edited line 217 to define variable and fix "timeout" error
* Enhanced markup for custom content
* Custom content may be added before and/or after the chat form and/or the list of chat messages

**20121119**

* Fixed PHP Warning: [function.stristr]: Empty delimiter (line 282)
* Removed fieldset border in default form styles (plugin settings)
* Added placeholders for name, URL, and chat message

**20121110**

* Initial release.


