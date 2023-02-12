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
Domaine Path: /lang
*/


if (!defined('ABSPATH')) {
   die;
}

define('SOCCERTEAMSDT_PATH', plugin_dir_path(__FILE__));

if (!class_exists('SocTeamCpt')) {
   require  SOCCERTEAMSDT_PATH . 'inc/class-cpt.php';
}

require  SOCCERTEAMSDT_PATH . 'inc/class_soccer_teams_dt-elementor.php';


class Soccer_teams_dt
{


   public function register()
   {
      add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
      add_action('wp_enqueue_scripts', [$this, 'enqueue_front']);
      add_action('plugins_loaded', [$this, 'load_text_domain']);
   }


   public function load_text_domain()
   {
      load_plugin_textdomain('soccer-teams-dt', false, dirname(plugin_basename(__FILE__)) . '/lang');
   }

   public function enqueue_admin()
   {
      wp_enqueue_style('soccer_teams_dt_style_admin', plugins_url('/assets/css/admin/stule.css', __FILE__), array(), '1.0');
      wp_enqueue_script('soccer_teams_dt_script_admin', plugins_url('/assets/js/admin/scripts.js', __FILE__), array('jquery'), '1.0', true);
   }
   public function enqueue_front()
   {
      wp_enqueue_style('soccer_teams_dt_style', plugins_url('/assets/css/front/stule.css', __FILE__), array(), '1.0');
      wp_enqueue_script('soccer_teams_dt_script', plugins_url('/assets/js/front/scripts.js', __FILE__), array('jquery'), '1.0', true);
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
