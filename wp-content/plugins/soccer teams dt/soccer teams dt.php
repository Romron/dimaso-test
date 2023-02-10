<?php
/*
Plugin Name: Soccer teams dt
Plugin URI: 
Description: plugin for test 
Version: 1.0
Autor: Roman
Autor URI: 
Licene: GPLv2 or later
Tex Domain: soccer-teams-dt
*/


if (!defined('ABSPATH')) {
   die;
}

class Soccer_teams_dt
{

   public function custom_post_type()
   {
      register_post_type(
         'soccer-team',
         array(
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'soccer-teams'),
            'label' => 'Soccer Team',  // add array labels
            'supports' => array('title', 'editor', 'thumbnail'),
         )
      );

      $labels = array(
         'name'              => esc_html_x('Leagues', 'taxonomy general name', 'soccer-teams-dt'),
         'singular_name'     => esc_html_x('League', 'taxonomy singular name', 'soccer-teams-dt'),
         'search_items'      => esc_html__('Search Leagues', 'soccer-teams-dt'),
         'all_items'         => esc_html__('All Leagues', 'soccer-teams-dt'),
         'parent_item'       => esc_html__('Parent League', 'soccer-teams-dt'),
         'parent_item_colon' => esc_html__('Parent League:', 'soccer-teams-dt'),
         'edit_item'         => esc_html__('Edit League', 'soccer-teams-dt'),
         'update_item'       => esc_html__('Update Leagues', 'soccer-teams-dt'),
         'add_new_item'      => esc_html__('Add New Leagues', 'soccer-teams-dt'),
         'new_item_name'     => esc_html__('New League Name', 'soccer-teams-dt'),
         'menu_name'         => esc_html__('League', 'soccer-teams-dt'),
      );

      $args = array(
         // 'hierarchical' => true,
         'show_ui' => true,
         'show_admin_column' => true,
         'query_var' => true,
         'rewrite' => array('slug' => 'soccer-teams/league'),
         'labels' => $labels
      );
      register_taxonomy('league', 'soccer-team', $args);
   }

   public function register()
   {
      add_action('init', [$this, 'custom_post_type']);
   }

   static function activation()
   {

      flush_rewrite_rules();
   }
   static function deactivation()
   {

      flush_rewrite_rules();
   }
}

if (class_exists('Soccer_teams_dt')) {
   $soccer_teams_dt = new Soccer_teams_dt();
   $soccer_teams_dt->register();
}
register_activation_hook(__FILE__, array($soccer_teams_dt, 'activation'));
register_deactivation_hook(__FILE__, array($soccer_teams_dt, 'deactivation'));
