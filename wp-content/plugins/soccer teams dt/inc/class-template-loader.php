<?php


class Soccer_Teams_dt_Template_Loader extends Gamajo_Template_Loader
{

   protected $filter_prefix = 'soccer_teams_dt';
   protected $theme_template_directory = 'soccer_teams_dt';
   protected $plugin_directory = SOCCERTEAMSDT_PATH;
   protected $plugin_template_directory = 'templates';

   function __construct()
   {
      add_filter('template_include', [$this, 'soccer_teams_dt_templates']);
   }

   public function soccer_teams_dt_templates($template)
   {

      if (is_post_type_archive('soccer-team')) {
         $theme_files = ['archive-soccer-team.php', 'soccer-team/archive-soccer-team.php'];
         $exist = locate_template($theme_files, false);
         if ($exist != '') {
            return $exist;
         } else {
            return plugin_dir_path(__FILE__) . 'templates/archive-soccer-team.php';
         }
      }

      return $template;
   }
}
