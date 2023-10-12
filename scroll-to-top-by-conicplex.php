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
define('SSTCP_VERSION', '1.0.0');


/*
* include public class
*/
require_once(plugin_dir_path( __FILE__ ) .'public/class-sttcp-public.php');

// Create public class object
$sstcp_public = new SSTCP_PUBLIC();

// Include Script & Style
add_action('wp_enqueue_scripts', [$sstcp_public,'sttcp_enqueue_scripts_callback']);

/* Footer hook */
add_action('wp_footer', [$sstcp_public,'sttcp_scroll_to_top_callback']);

/*
* include admin class
*/
require_once(plugin_dir_path( __FILE__ ) .'admin/class-sttcp-admin.php');

// Create admin class object
$sstcp_admin = new SSTCP_ADMIN();

// Hook for admin menu
add_action( 'admin_menu', [$sstcp_admin, 'admin_menu']);