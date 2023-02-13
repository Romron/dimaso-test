<?php

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


class Elementor_Soccer_teams_dt_Widgets extends Elementor\Widget_Base
{

   public function get_name()
   {
      return 'soccer_teams_dt';
   }

   public function get_title()
   {
      return esc_html__('Get soccer teams dt', 'soccer-teams-dt');
   }

   public function get_icon()
   {
      return 'eicon-circle-o';
   }

   public function get_categories()
   {
      return ['basic'];
   }

   public function get_keywords()
   {
      return ['soccer', 'team'];
   }

   protected function register_controls()
   {
      // Content Tab Start

      $this->start_controls_section(
         'section_title',
         [
            'label' => esc_html__('Soccer teams', 'soccer-teams-dt'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ],
      );

      $this->add_control(
         'keyword',
         [
            'label' => esc_html__('keywords', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('enter keywords', 'soccer-teams-dt'),
         ]
      );

      $this->add_control(
         'number',
         [
            'label' => esc_html__('number', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('enter number', 'soccer-teams-dt'),
         ]
      );

      $this->add_control(
         'league',
         [
            'label' => esc_html__('league', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__('enter league', 'soccer-teams-dt'),
         ]
      );

      $this->end_controls_section();

      // Content Tab End


      // Style Tab Start

      $this->start_controls_section(
         'section_title_style',
         [
            'label' => esc_html__('Title', 'soccer-teams-dt'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
         ]
      );

      $this->add_control(
         'title_color',
         [
            'label' => esc_html__('Text Color', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
               '{{WRAPPER}} .hello-world' => 'color: {{VALUE}};',
            ],
         ]
      );

      $this->end_controls_section();

      // Style Tab End

   }

   protected function render()
   {
      $settings = $this->get_settings_for_display();

      $obj_teams = new WP_Query(
         array(
            'post_type' => 'soccer-team',
            'post_per_page' => '3'
         )
      );


      if ($obj_teams->have_posts()) {
         while ($obj_teams->have_posts()) {
            $obj_teams->the_post();
            the_title();
         }
      }
   }
}
