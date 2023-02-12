<?php

/**
 * Plugin Name: Elementor for Soccer teams dt
 * Description: Custom Elementor addon.
 * Plugin URI:  
 * Version:     1.0.0
 * Author:      Roman
 * Author URI:  
 * Text Domain: soccer-teams-elementor
 * 
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */


if (
   !defined('ABSPATH')
) {
   exit; // Exit if accessed directly.
}

function soccer_teams_elementor()
{


   // Load plugin file
   require_once(__DIR__ . '/includes/plugin.php');

   // Run the plugin
   \elementor_soccer_teams_dt_widgets\Plugin::instance();
}
add_action('plugins_loaded', 'soccer_teams_elementor');
