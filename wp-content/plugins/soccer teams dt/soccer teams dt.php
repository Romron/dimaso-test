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

define('SOCCERTEAMSDT_PATH', plugin_dir_path(__FILE__));

if (!class_exists('SocTeamCpt')) {
   require  SOCCERTEAMSDT_PATH . 'inc/cpt.php';
}


class Soccer_teams_dt
{


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
}
register_activation_hook(__FILE__, array($soccer_teams_dt, 'activation'));
register_deactivation_hook(__FILE__, array($soccer_teams_dt, 'deactivation'));
