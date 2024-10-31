<?php

/**
 * @package OneClickMaintenanceMode
 */
/*
Plugin Name: One Click Maintenance Mode
Plugin URI: https://www.techrbun.com/plugins/one-click-maintenance-mode
Description: Turn on maintenance mode.
Version: 1.0.4
Author: Anirban Roy
Author URI: https://www.techrbun.com/author/anirban/
Text Domain: one-click-maintenance-mode
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

function one_click_maintenance_mode()
{
    $title = get_bloginfo('name') . ' Is Under Maintenance';
    $message = '<h1>Under Maintenance</h1><br />' . get_bloginfo('name') . ' is under planned maintenance. Please check back later.';
    if (!current_user_can('administrator') || !is_user_logged_in()) {
        wp_die($message, $title);
    }
}
add_action('get_header', 'one_click_maintenance_mode');

function add_custom_meta_links($meta_fields, $file){
    //add a donate link to https://www.buymeacoffee.com/anirbanroy2002
    if ( plugin_basename(__FILE__) == $file ) {
        $meta_fields[]="<a style='color:green;' href='https://www.buymeacoffee.com/anirbanroy2002' target='_blank'>Donate (Buy Me A Coffee)</a>";
    }
    return $meta_fields;
    }
    add_filter( 'plugin_row_meta', 'add_custom_meta_links', 10, 2 );

    function custom_action_links( $links, $file ) {
        if ( plugin_basename(__FILE__) == $file ) {
            //add donate link
            $links[] = '<a style="color:green;" href="https://www.buymeacoffee.com/anirbanroy2002" target="_blank">Donate (Buy Me A Coffee)</a>';
        }
        return $links;
    }
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'custom_action_links', 10, 2 );

?>