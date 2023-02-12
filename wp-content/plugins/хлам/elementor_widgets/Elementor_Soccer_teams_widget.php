<?php
if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


class Elementor_soccer_teams_Widget extends \Elementor\Widget_Base
{

   public function get_name()
   {

      return 'soccer_teams';
   }

   public function get_title()
   {
      return esc_html__('Soccer teams', 'soccer-teams-dt');
   }

   public function get_icon()
   {
      return 'fa-futbol-o';
   }

   public function get_custom_help_url()
   {
      return ' ';
   }

   public function get_categories()
   {

      return ['bacic'];
   }

   public function get_keywords()
   {
      return ['soccer-teams', 'teams'];
   }

   protected function register_controls()
   {
      echo '+++++++++++++++';

      $this->start_controls_section(
         'content_section',
         [
            'label' => esc_html__('Title', 'soccer-teams-dt'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $this->add_control(
         'url',
         [
            'label' => esc_html__('URL to embed', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'input_type' => 'url',
            'placeholder' => esc_html__(' ', 'soccer-teams-dt'),
         ]
      );

      $this->end_controls_section();
   }

   protected function render()
   {

      $settings = $this->get_settings_for_display();
      $html = wp_oembed_get($settings['url']);

      echo '<div class="oembed-elementor-widget">';
      echo ($html) ? $html : $settings['url'];
      echo '</div>';
   }
}
