=== Head, Footer and Post Injections ===
Tags: header, footer, blog, page, single, post, head, tracking, facebook, og meta tag, open graph, ads, adsense, injections, analytics, amp, pixel
Requires at least: 3.0
Tested up to: 4.9.8
Stable tag: 3.1.2
Donate link: http://www.satollo.net/donations
Contributors: satollo

Header and Footer plugin let you to add html code to the head and footer sections of your blog... and more!

== Description ==

About WordPress SEO and Facebook Open Graph: I was very unpleased by Yoast invitation to
remove my plugin, and it's not the case. 
[Read more here](http://www.satollo.net/yoast-and-wordpress-seo-this-is-too-much-conflict-with-header-and-footer).

= Head and Footer Codes =

Why you have to install 10 plugins to add Google Analytics, Facebook Pixel, custom
tracking code, Google DFP code, Google Webmaster/Alexa/Bing/Tradedoubler verification code and so on...

With Header and Footer plugin you can just copy the code those services give you
in a centralized point to manage them all. And theme independent: you can change your theme
without loosing the code injected!

= Injection points and features =

* in the <head> page section where most if the codes are usually added
* just after the <body> tag as required by some JavaScript SDK (like Facebook)
* in the page footer (just before the </body> tag)
* recognize and execute PHP code to add logic to your injections
* distinct desktop and mobile injections

= AMP =

A new AMP dedicated section compatible with [AMP plugin](https://wordpress.org/plugins/amp) lets you to inject specific codes in
AMP pages.

= Post Top and Bottom Codes =

Do you need to inject a banner over the post content or after it? No problem. With Header and
Footer you can:

* Add codes on _top_, _bottom_ and in the _middle_ of posts and pages
* Differentiate between _mobile_ and _desktop_ (you don't display the same ad format on both, true?)
* Separate post and page configuration
* Native PHP code enabled
* Shortcodes enabled

= Special Injections =

* Just after the opening BODY tag
* In the middle of post content (using configurable rules)
* Everywhere on template (using placeholders)

= bbPress =

The specific bbPress injections are going to be removed. Switch to my
[Ads for bbPress](https://wordpress.org/ads-bbpress), which is more flexible and complete.

= Limits =

This plugin cannot change the menu or the footer layout, those features must be covered by your theme!

Official page: [Header and Footer](http://www.satollo.net/plugins/header-footer).

Other plugins by Stefano Lissa:

* [Hyper Cache](http://www.satollo.net/plugins/hyper-cache)
* [Newsletter](http://www.thenewsletterplugin.com)
* [Include Me](http://www.satollo.net/plugins/include-me)
* [Comment Plus](http://www.satollo.net/plugins/comment-plus)
* [Thumbnails](http://www.satollo.net/plugins/thumbnails)
* [PHP Text Widget](http://www.satollo.net/plugins/php-text-widget)
* [Ads for bbPress](http://www.satollo.net/plugins/ads-bbpress)

== Installation ==

1. Put the plugin folder into [wordpress_dir]/wp-content/plugins/
2. Go into the WordPress admin interface and activate the plugin
3. Optional: go to the options page and configure the plugin

== Frequently Asked Questions ==

FAQs are answered on [Header and Footer](http://www.satollo.net/plugins/header-footer) page.

== Screenshots ==

1. Configuration panel for blog HEAD and footer sections
2. Configuration panel for post content
3. Configuration panel for Facebook "og" tags
4. Configurable snippets of code to be recalled on other configurations (to save time)

== Changelog ==

= 3.1.2 =

* Fixed a debug notice

= 3.1.1 =

* Privacy section in the readme.txt

= 3.1.0 =

* Removed the Facebook setting (move to a specialized plugin to have the Facebook Open Graph Meta) 
* Removed bbPress setting (please use bbpress ads)
* Label fix
* Removed notices
* 5 post injections and 5 generic injections

= 3.0.7 =

* Added the filter "hefo_php_exec" to let a third party to disable the PHP execution 

= 3.0.6 =

* Moved the donate png inside the plugin

= 3.0.5 =

* Debug notices fix

= 3.0.4 =

* Debug notices fix

= 3.0.3 =

* Check on content length for injections "skipping" N characters
* Removed obsolete code
* Removed script handlers debugger
* Fixed notice on $post_id

= 3.0.2 =

* Version error (grrr)

= 3.0.1 =

* Fixed an error on menu
* Added the subscription box
* Fixed CSS and JS in admin panel

= 3.0.0 =

* Start adding support for amp and [amp plugin](https://wordpress.org/plugins/amp/)
* Removed the Open Graph support (it is now so complex that it became out of scope for this plugin)
* Add a notice to use Ads for bbPress
* Home page only injection fix
* Removed old code
* Little change to the name to be more descriptive
* Removed local codemirror and added the one from cdnjs

= 2.0.2 =

* Fixed generics injection tab
* Fixed mobile footer version
* Fixed few debug notices

= 2.0.1 =

* Fixed mobile detection injection

= 2.0.0 =

* CodeMirror introduced
* Better mobile code differentiation
* Admin interface fixes

= 1.7.0 =

* Reverted 1.6.9 changes which break the blog in some cases

= 1.6.9 =

* PHP execution added to the after "body tag" injection

= 1.6.8 =

* Fixed a debug notice
* Updated readme.txt

= 1.6.7 =

* Added the just after <body> tag injection

= 1.6.6 =

* Fixed few debug notices
* Fixed the top and bottom injection controls from post and page editing panels

= 1.6.5 =

* Added a web performance section to force async load of selected JavaScript files

= 1.6.4 =

* Comptibility check

= 1.6.3 =

* Added the css id removal feature for pagespeed. See [this page](http://www.satollo.net/hyper-cache-and-google-pagespeed-combine-css).

= 1.6.2 =

* Notes
* Performance improvements

= 1.6.1 =

* Code cleanup
* New notes

= 1.6.0 =

* Added options to remove some head links

= 1.5.9 =

* Sticky plugin removed
* Compatibility check with WP 4.0
* Code improvements on buffering

= 1.5.8 =

* Removed a couple of obsolete lines of code
* Added options to enable tags and categories on pages

= 1.5.7 =

* Fixed a notice for 404 page

= 1.5.6 =

* Version compatibility

= 1.5.5 =

* Added an option to use the post options for pages

= 1.5.4 =

* Fixed the "global post" variable when injections contain php

= 1.5.3 =

* Fixed a link

= 1.5.2 =

* Fixed a debug notice

= 1.5.1 =

* Fixed some debug notices
* ru_RU translation by [Eugene Zhukov](https://plus.google.com/u/0/118278852301653300773)
* Added the "thank you" panel
* Fixed the missing user agent notice

= 1.5.0 =

* Mobile detection added

= 1.4.5 =

* Full size og:image
* Improved the bbpress integration

= 1.4.4 =

* Fixed a debug warning

= 1.4.3 =

* Performance improvements

= 1.4.2 =

* Added top and bottom injection controls on single posts and pages

= 1.4.1 =

* Added global variables "hefo_page_top", "hefo_page_bottom" that, if set to false, blocks the page injection
* Added global variables "hefo_post_top", "hefo_post_bottom" that, if set to false, blocks the page injection
* Added configuration to inject code on excerpts
* Added global variable $hefo_count which counts the number of process excerpts

= 1.4.0 =

* Chaged the top bar
* Fixed some CSS

= 1.3.9 =

* Added a SEO option for noindex meta tag on page 2 and up of the home page
* Added a SEO option for canonical on home page (save you from URLs with query string parameter used by plugins)
* Added a SEO option for noindex meta tag on seach result pages

= 1.3.8 =

* Removed the init configuration, too much dangerous

= 1.3.7 =

* Added the init configuration

= 1.3.5 =

* Added notes and parked codes
* Added code snippets
* $post made global for post and page header and footer

= 1.3.4 =

* Added an important note about tabs and image selection on the facebook tab, only informative
* Added a .po file, but it is no still time to translate!

= 1.3.3 =

* Fixed the not loading CSS and sone layout problems

= 1.3.2 =

* Fixed the readme file...
* Fixed some labels
* Added the screenshots (hope they'll show up this time...)

= 1.3.1 =

* Added bbPress "compatibility" for og:image Facebook meta tag
* Administration panel tabbed
* Added Facebook og:type support
* Fix the og:image on home page when there is no default image specified
* Facebook og: tags added earlier on head section that other codes

= 1.3.0 =

* added configuration to inject code before and after pages
* small graphical changes

= 1.2.0 =

* compatibility check with WordPress 3.2.1
* updated the Facebook Open Graph image tag (og:image)
* integrated with WordPress media gallery image picker and uploader
* some CSS changes
* added the Satollo.net news iframe
* added configurations to inject code before and after posts
* added a PDF manual

= 1.0.6 =

* WP 2.7.1 compatibility check

= 1.0.5 =

* added the german translation by Ev. Jugend Schwandorf - Sebastian M???ller (http://www.ej-schwandorf.de)

= 1.0.4 =

* fixed the usage of short php tag

= 1.0.3 =

* added the "only home" header text

== Privacy and GDPR ==

This plugin does not collect or process any personal user data.