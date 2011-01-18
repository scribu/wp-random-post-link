=== Random Post Link ===
Contributors: scribu
Donate link: http://scribu.net/paypal
Tags: button, redirect
Requires at least: 2.8
Tested up to: 3.0
Stable tag: trunk

Generates a link that takes a visitor to a random post, but never the same as before.

== Description ==

Unlike the [Random Redirect](http://wordpress.org/extend/plugins/random-redirect/) plugin, this plugin makes sure that a user will not see the same post twice.

It does this by storing a cookie containing a list of single posts that the user has seen. It then checks that list before redirecting.

= Usage =

Just put this line anywhere in your theme where you want the link to appear.

`<?php random_post_link(); ?>`

You can specify the text you want on the link like so:

`<?php random_post_link('Feeling lucky'); ?>`

Links: [Plugin News](http://scribu.net/wordpress/random-post-link) | [Author's Site](http://scribu.net)

== Frequently Asked Questions ==

= "Parse error: syntax error, unexpected T_CLASS..." Help! =

Make sure your host is running PHP 5. Add this line to wp-config.php to check:

`var_dump(PHP_VERSION);`

= What happens when there are no more posts? =

If a user has seen all the available posts, the plugin will clear the list and redirect to a random post.


== Changelog ==

= 1.0.1 =
* handle case when a user has seen all posts

= 1.0 =
* initial release
* [more info](http://scribu.net/wordpress/random-post-link/rpl-1-0.html)

