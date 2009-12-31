=== Random Post Link ===
Contributors: scribu
Donate link: http://scribu.net/paypal
Tags: button, redirect
Requires at least: 2.8
Tested up to: 2.9
Stable tag: trunk

Generates a link that takes a visitor to a random post, but never the same as before.

== Description ==

Unlike the [Random Redirect](http://wordpress.org/extend/plugins/random-redirect/) plugin, this plugin ensures that a user will not see the same post twice.

It does this by keeping a list of single posts that the user has seen and then checking that list when redirecting.

= Usage =

Just put this line anywhere in your theme where you want the link to appear.

`<?php random_post_link(); ?>`

You can specify the text you want on the link like so:

`<?php random_post_link('Feeling lucky'); ?>`

== Installation ==

You can either install it automatically from the WordPress admin, or do it manually:

1. Unzip "random-post-link" archive and put the folder into your plugins folder (/wp-content/plugins/).
1. Activate the plugin from the Plugins menu.

== Changelog ==

= 1.0 =
* initial release
* [more info](http://scribu.net/wordpress/random-post-link/rpl-1-0.html)
