<?php
/**
 * Plugin Name:       H5P.com Block
 * Description:       Block for embedding H5P.com content
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.3
 * Author:            Tim Lindgren
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       h5p-block
 *
 * @package           h5pblock
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function h5pblock_h5p_block_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'h5pblock_h5p_block_block_init' );

// Add the H5P Resize script
function enqueue_h5p_resizer() {
    wp_enqueue_script(
        'custom-block-script',
        'https://bc.h5p.com/js/h5p-resizer.js',
        array(),  // Add any dependencies here if needed
        '1.0',    // Specify a version number
        true      // Load the script in the footer
    );
}
add_action('enqueue_block_assets', 'enqueue_h5p_resizer');


// Plugn Update Checker
// https://github.com/YahnisElsts/plugin-update-checker/
// Plugn Update Checker
// https://github.com/YahnisElsts/plugin-update-checker/
require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/cdil-bc/h5p-block/',
	__FILE__,
	'unique-plugin-or-theme-slug'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

$myUpdateChecker->getVcsApi()->enableReleaseAssets();