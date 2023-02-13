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

function
register_soccer_teams_dt_widget($widgets_manager)
{

   // Load plugin file
   require_once(__DIR__ . '/widgets/soccer_teams_dt_widgets.php');

   // Run the plugin
   $widgets_manager->register(new Elementor_Soccer_teams_dt_Widgets());
}
add_action('elementor/widgets/register', 'register_soccer_teams_dt_widget');
