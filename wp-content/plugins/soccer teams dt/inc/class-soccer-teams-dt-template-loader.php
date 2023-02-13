<?php


class Soccer_Teams_dt_Template_loader extends Gamajo_Template_Loader
{

   protected $filter_prefix = 'soccer-teams-dt';
   protected $theme_template_directory = 'soccer-teams-dt';
   protected $plugin_directory = SOCCERTEAMSDT_PATH;
   protected $plugin_template_directory = 'templates';

   public function register(){
      add_filter('template_include',[$this, 'soccer_teams_dt_template']);
   }

   public function soccer_teams_dt_template($template){
 
      if(is_post_type_archive('soccer-team')){
         $theme_files = ['archive-soccer_teams_dt.php', 'soccer_teams_dt/archive-soccer_teams_dt.php'];
         $exist = locate_template($theme_files, false);
         if($exist != ''){
            return $exist;
         }else{
            return plugin_dir_path(__FILE__.'templates/archive-soccer_teams_dt.php')
         }
      }

      return $template;
   }

}

$soccer_teams_dt_template_loader = new Soccer_Teams_dt_Template_loader();
$soccer_teams_dt_template_loader ->register(); 