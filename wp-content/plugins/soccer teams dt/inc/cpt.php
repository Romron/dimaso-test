<?php

if (!class_exists('SocTeamCpt')) {

   class SocTeamCpt
   {
      public function register()
      {
         add_action('init', [$this, 'custom_post_type']);
         add_action('add_meta_boxes', [$this, 'add_metabox_soccer_team']);
      }

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

      public function add_metabox_soccer_team()
      {
         add_meta_box(
            'soccer_team_setings',
            'Soccer team setings',
            [$this, 'add_metabox_soccer_team_html'],
            'soccer-team',
            'normal',
            'default'
         );
      }

      public function add_metabox_soccer_team_html($post)
      {
         $soccer_team_name = get_post_meta($post->ID, 'soccer_team_name', true);
         $soccer_team_nickname = get_post_meta($post->ID, 'soccer_team_nickname', true);
         $soccer_team_history = get_post_meta($post->ID, 'soccer_team_history', true);
         echo '
         
            <p>
               <label for="soccer_team_name">Name</label>
               <input type="text" id="soccer_team_name" name="soccer_team_name" value="' . esc_html($soccer_team_name) . '">
            </p>
         
            <p>
               <label for="soccer_team_nickname">Nickname</label>
               <input type="text" id="soccer_team_nickname" name="soccer_team_nickname" value="' . esc_html($soccer_team_nickname) . '">
            </p>         
            <p>
               <label for="soccer_team_history">History</label>
               <textarea type="textarea" id="soccer_team_history" name="soccer_team_history" value="' . esc_html($soccer_team_history) . '"></textarea>
            </p>         
         
         ';
      }
   }
}

if (class_exists('SocTeamCpt')) {
   $socTeamCpt = new SocTeamCpt();
   $socTeamCpt->register();
}
