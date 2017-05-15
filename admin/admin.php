<?php
/**
 * Contains admin functions
 *
 * @package   Relative_Width_Images
 * @author    Barry Ceelen <b@rryceelen.com>
 * @license   GPL-3.0+
 * @link      https://github.com/barryceelen/wp-fluid-images
 * @copyright 2017 Barry Ceelen
 */

/**
 * Add editor stylesheet.
 *
 * @since 1.0.0
 * @param string $mce_css Comma-delimited list of stylesheets.
 * @return string Modified list of stylesheets.
 */
function relative_width_images_add_editor_style( $mce_css ) {

	$url = plugins_url( 'css/style.css', __DIR__ );

	if ( empty( $mce_css ) ) {
		$mce_css = $url;
	} else {
		$mce_css .= ',' . $url;
	}

	return $mce_css;
}

/**
 * Register TinyMCE plugin by filtering the array of external plugins.
 *
 * @since 1.0.0
 * @param array $external_plugins An array of external TinyMCE plugins.
 * @return array Modified array of TinyMCE plugins.
 */
function relative_width_images_filter_mce_external_plugins( $external_plugins ) {

	if ( empty( $external_plugins['relative_width_images'] ) ) {
		$external_plugins['relative_width_images'] = plugins_url( 'js/tinymce_plugin.js', __FILE__ );
	}

	return $external_plugins;
}
