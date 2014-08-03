<?php
/**
 * @package Red_Alert
 * @version 1.6
 */
/*
Plugin Name: Red Alert
Plugin URI: http://wordpress.org/plugins/red-alert/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in two words sung most famously by Louis Armstrong: Hello, Dolly. When activated you will randomly see a lyric from <cite>Hello, Dolly</cite> in the upper right of your admin screen on every page.
Author: Matt Mullenweg
Version: 1.6
Author URI: http://ma.tt/
*/
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define('RED_ALERT_FOLDER',  plugin_dir_path(__FILE__));
define('RED_ALERT_URL',  plugin_dir_url(__FILE__));
require_once RED_ALERT_FOLDER.'classes.php';
RedAlert::run();
