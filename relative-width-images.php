<?php
/**
 * Main plugin file
 *
 * @package   Relative_Width_Images
 * @author    Barry Ceelen <b@rryceelen.com>
 * @license   GPL-3.0+
 * @link      https://github.com/barryceelen/wp-relative-width-images
 * @copyright 2017 Barry Ceelen
 *
 * Plugin Name: Relative Width Images
 * Description: Make image widths percentage-based in the TinyMCE editor.
 * Version:     1.0.1
 * Author:      Barry Ceelen
 * Author URI:  https://github.com/barryceelen
 * Text Domain: relative-width-images
 * Domain Path: /languages
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) || die();

if ( is_admin() ) {

	require_once( 'admin/admin.php' );

	// Add editor stylesheet.
	add_filter( 'mce_css', 'relative_width_images_add_editor_style' );

	// Register TinyMCE plugin by filtering the array of external plugins.
	add_filter( 'mce_external_plugins', 'relative_width_images_filter_mce_external_plugins' );

} else {

	require_once( 'public/public.php' );

	// Enqueue public stylesheet.
	add_action( 'wp_enqueue_scripts', 'relative_width_images_enqueue_styles' );
}
