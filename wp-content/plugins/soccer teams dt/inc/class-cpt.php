<?php

if (!class_exists('SocTeamCpt')) {

   class SocTeamCpt
   {
      public function register()
      {
         add_action('init', [$this, 'custom_post_type']);
         add_action('add_meta_boxes', [$this, 'add_metabox_soccer_team']);
         add_action('save_post', [$this, 'save_metabox'], 10, 2);
      }

      public function custom_post_type()
      {

         $labels_soccer_team = array(
            'name'              => esc_html_x('Soccer Teams', 'taxonomy general name', 'soccer-teams-dt'),
            'singular_name'     => esc_html_x('Soccer Team', 'taxonomy singular name', 'soccer-teams-dt'),
            'search_items'      => esc_html__('Search Soccer Teams', 'soccer-teams-dt'),
            'all_items'         => esc_html__('All Soccer Teams', 'soccer-teams-dt'),
            'parent_item'       => esc_html__('Parent Soccer Team', 'soccer-teams-dt'),
            'parent_item_colon' => esc_html__('Parent Soccer Team:', 'soccer-teams-dt'),
            'edit_item'         => esc_html__('Edit Soccer Team', 'soccer-teams-dt'),
            'update_item'       => esc_html__('Update Soccer Teams', 'soccer-teams-dt'),
            'add_new_item'      => esc_html__('Add New Soccer Teams', 'soccer-teams-dt'),
            'new_item_name'     => esc_html__('New Soccer Team Name', 'soccer-teams-dt'),
            'menu_name'         => esc_html__('Soccer Team', 'soccer-teams-dt'),
         );

         register_post_type(
            'soccer-team',
            array(
               'public' => true,
               'has_archive' => true,
               'rewrite' => array('slug' => 'soccer-teams'),
               'label' => esc_html__('Soccer Team', ' soccer-teams-dt'),  // add array labels
               'supports' => array('title', 'thumbnail'),
               'labels' => $labels_soccer_team,
            )
         );

         $labels_league = array(
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
            'labels' => $labels_league,
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

         wp_nonce_field('metabox_soccer_team', '_soccer_team_dt');


         echo '
            <p>
               <label for="soccer_team_name">' . esc_html__('Name', ' soccer-teams-dt') . '</label>
               <input type="text" id="soccer_team_name" name="soccer_team_name" value="' . esc_attr__($soccer_team_name) . '">
            </p>
            <p>
               <label for="soccer_team_nickname">' . esc_html__('Nickname', ' soccer-teams-dt') . '</label>
               <input type="text" id="soccer_team_nickname" name="soccer_team_nickname" value="' . esc_attr__($soccer_team_nickname) . '">
            </p>         
            <p>
               <label for="soccer_team_history">' . esc_html__('History', ' soccer-teams-dt') . '</label>
               <textarea type="textarea" id="soccer_team_history" name="soccer_team_history">' . esc_attr__($soccer_team_history) . '</textarea>
            </p>         
         ';
      }

      public function save_metabox($post_id, $post)
      {

         if (!isset($_POST['_soccer_team_dt']) || !wp_verify_nonce($_POST['_soccer_team_dt'], 'metabox_soccer_team')) {
            return $post_id;
         }

         if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
         }

         if ($post->post_type != 'soccer-team') {
            return $post_id;
         }

         $post_type = get_post_type_object($post->post_type);
         if (!current_user_can($post_type->cap->edit_post, $post_id)) {
            return $post_id;
         }

         if (is_null($_POST['soccer_team_name'])) {
            delete_post_meta($post_id, 'soccer_team_name');
         } else {
            update_post_meta($post_id, 'soccer_team_name', sanitize_text_field($_POST['soccer_team_name']));
         };
         if (is_null($_POST['soccer_team_nickname'])) {
            delete_post_meta($post_id, 'soccer_team_nickname');
         } else {
            update_post_meta($post_id, 'soccer_team_nickname', sanitize_text_field($_POST['soccer_team_nickname']));
         };
         if (is_null($_POST['soccer_team_history'])) {
            delete_post_meta($post_id, 'soccer_team_history');
         } else {
            update_post_meta($post_id, 'soccer_team_history', sanitize_textarea_field($_POST['soccer_team_history']));
         };
      }
   }
}

if (class_exists('SocTeamCpt')) {
   $socTeamCpt = new SocTeamCpt();
   $socTeamCpt->register();
}
