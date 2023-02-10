<?php
/*
Plugin Name: Soccer teams dt
Plugin URI: 
Description: plugin for test 
Version: 1.0
Autor: Roman
Autor URI: 
Licene: GPLv2 or later
Tex Domain: Soccer-teams-dt
*/


if (!defined('ABSPATH')) {
   die;
}

class Soccer_teams_dt
{

   public function custom_post_type()
   {
      register_post_type(
         'Soccer Team',
         array(
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Soccer-Teams'),
            'label' => 'Soccer Team',  // add array labels
            'supports' => array('title', 'editor', 'thumbnail'),
         )
      );
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
