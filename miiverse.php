<?php
/*
Plugin Name: Miiverse oEmbed
Plugin URI: https://github.com/marcusds/miiverse-ombed
Description: Registers Nintendo Miiverse as an oEmbed in WordPress.
Version: 1.0
Author: marcusds
Author URI: https://github.com/marcusds
License: GPL2
*/

wp_embed_register_handler( 'miiverse', '#https://miiverse\.nintendo\.net/posts/((?:[a-z][a-z]*[0-9]+[a-z0-9]*))#i', 'wp_embed_handler_miiverse' );

function wp_embed_handler_miiverse( $matches, $attr, $url, $rawattr ) {
	
	$embed = sprintf(
			'<div class="miiverse-post" lang="en" data-miiverse-cite="https://miiverse.nintendo.net/posts/%1$s" data-miiverse-embedded-version="1"><noscript>You must have JavaScript enabled on your device to view Miiverse posts that have been embedded in a website. <a class="miiverse-post-link" href="https://miiverse.nintendo.net/posts/%1$s">View post in Miiverse.</a></noscript></div><script async src="https://miiverse.nintendo.net/js/embedded.min.js" charset="utf-8"></script>',
			esc_attr($matches[1])
			);

	return apply_filters( 'embed_miiverse', $embed, $matches, $attr, $url, $rawattr );
}

?>