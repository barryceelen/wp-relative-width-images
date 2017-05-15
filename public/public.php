<?php
/**
 * Contains public functions
 *
 * @package   Relative_Width_Images
 * @author    Barry Ceelen <b@rryceelen.com>
 * @license   GPL-3.0+
 * @link      https://github.com/barryceelen/wp-fluid-images
 * @copyright 2017 Barry Ceelen
 */

/**
 * Enqueue public stylesheet.
 *
 * @since 1.0.0
 */
function relative_width_images_enqueue_styles() {

	/**
	 * Filters whether to enqueue the plugin stylesheet.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $enqueue_style Default true if {@see is_singular()}.
	 */
	$enqueue_style = apply_filters( 'relative_width_images_enqueue_styles', is_singular() );

	if ( $enqueue_style ) {

		wp_enqueue_style(
			'relative-width-images',
			plugins_url( 'css/style.css', __DIR__ ),
			array(),
			'1.0.0',
			'all'
		);
	}
}
