<?php
/*
Plugin Name: Random Post Link
Description: Generates a link that takes a user to a random post, but never the same as before.
Version: 1.0.1
Author: scribu
Author URI: http://scribu.net/
Plugin URI: http://scribu.net/wordpress/random-post-link


Copyright (C) 2010 Cristi Burcă (mail@scribu.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

function random_post_link($text = 'Random Post') {
	printf('<a href="%s">%s</a>', get_random_post_url(), $text);
}

function get_random_post_url() {
	return trailingslashit(get_bloginfo('url')) . '?' . Random_Post_Link::query_var;
}


class Random_Post_Link {
	const query_var = 'random';
	const name = 'wp_random_posts';

	function init() {
		add_action('init', array(__CLASS__, 'jump'));

		// Fire just after post selection
		add_action('wp', array(__CLASS__, 'manage_cookie'));
	}

	// Jump to a random post
	function jump() {
		if ( ! isset($_GET[self::query_var]) )
			return;

		$args = apply_filters('random_post_args', array(
			'post__not_in' => self::read_cookie(),
		));

		$args = array_merge($args, array(
			'orderby' => 'rand',
			'showposts' => 1,
		));

		$posts = get_posts($args);

		if ( empty($posts) ) {
			self::update_cookie(array());
			unset($args['post__not_in']);

			$posts = get_posts($args);
		}

		if ( empty($posts) )
			wp_redirect(get_bloginfo('url'));

		$id = $posts[0]->ID;

		wp_redirect(get_permalink($id));
		die;
	}

	// Collect post ids that the user has already seen
	function manage_cookie() {
		if ( ! is_single() )
			return;

		$ids = self::read_cookie();
		$id = $GLOBALS['posts'][0]->ID;

		if ( count($ids) > 200 )
			$ids = array($id);
		elseif ( ! in_array($id, $ids) )
			$ids[] = $id;

		self::update_cookie($ids);
	}

	private function read_cookie() {
		return explode(' ', @$_COOKIE[self::name]);
	}

	private function update_cookie($ids) {
		setcookie(self::name, trim(implode(' ', $ids)), 0, '/');
	}
}

Random_Post_Link::init();

