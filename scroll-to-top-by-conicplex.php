<?php

/*
 * Plugin Name:       Scroll to Top by ConicPlex
 * Plugin URI:        https://conicplex.com/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 4.7
 * Author:            ConicPlex
 * Author URI:        https://conicplex.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sttcp
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    die();
}

// Plugin Version
define('STTCP_VERSION', '1.0.0');

/*
* include admin class
*/
require_once(plugin_dir_path( __FILE__ ) .'admin/class-sttcp-admin.php');

// Create admin class object
$sttcp_admin = new STTCP_ADMIN();

// Hook for admin menu
add_action( 'admin_menu', [$sttcp_admin, 'admin_menu']);

// Include Admin Script & Style
add_action('admin_enqueue_scripts', [$sttcp_admin,'sttcp_enqueue_scripts_callback']);


/*
* include public class
*/
require_once(plugin_dir_path( __FILE__ ) .'public/class-sttcp-public.php');

// Create public class object
$sttcp_public = new STTCP_PUBLIC();

// Include Script & Style
add_action('wp_enqueue_scripts', [$sttcp_public,'sttcp_enqueue_scripts_callback']);

/* Footer hook */
add_action('wp_footer', [$sttcp_public,'sttcp_scroll_to_top_callback']);

