<?php


class Soccer_Teams_dt_Template_Loader extends Gamajo_Template_Loader
{

   protected $filter_prefix = 'soccer-team';
   protected $theme_template_directory = 'soccer-team';
   protected $plugin_directory = SOCCERTEAMSDT_PATH;
   protected $plugin_template_directory = 'templates';

   function __construct()
   {


      add_filter('template_include', [$this, 'soccer_teams_dt_templates']);
   }

   public function soccer_teams_dt_templates($template)
   {

      if (is_post_type_archive('soccer-team')) {
         $theme_files = ['archive-soccer_team.php', 'soccer-team/archive-soccer_team.php'];
         $exist = locate_template($theme_files, false);
         if ($exist != '') {
            return $exist;
         } else {
            return plugin_dir_path(__DIR__) . 'templates/archive-soccer_team.php';
         }
      } elseif (is_singular('soccer-team')) {
         $theme_files = ['single-soccer_team.php', 'soccer-team/single_soccer_team.php'];
         $exist = locate_template($theme_files, false);
         if ($exist != '') {
            return $exist;
         } else {
            return plugin_dir_path(__DIR__) . 'templates/single-soccer_team.php';
         }
      }

      return $template;
   }
}
