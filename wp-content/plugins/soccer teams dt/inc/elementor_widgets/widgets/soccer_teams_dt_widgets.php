<?php

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


class Elementor_Soccer_teams_dt_Widgets extends Elementor\Widget_Base
{
   protected $soccer_teams_Template;
   protected $arr_Leagues = array();

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
      $temp_league = get_terms('league');
      foreach ($temp_league as $league) {
         $this->arr_Leagues[$league->term_id] = $league->name;
      }

      $this->start_controls_section(
         'section_title',
         [
            'label' => esc_html__('Soccer teams', 'soccer-teams-dt'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $this->add_control(
         'leagues',
         [
            'label' => esc_html__('Select league', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' =>  $this->arr_Leagues,
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

      $args = array(
         'post_type' => 'soccer-team',
         'post_per_page' => '-1',
         'meta_query' => array('relation' => 'AND'),
         'tax_query' => array('relation' => 'AND'),
      );

      echo "<pre>";
      print_r($settings['leagues']);
      echo "</pre>";

      if (isset($settings['leagues']) && $settings['leagues'] != '') {
         array_push($args['tax_query'], array(
            'taxonomy' => 'league',
            'terms' => $settings['leagues'],
         ));
      }

      $obj_teams = new WP_Query($args);

      $this->soccer_teams_Template =  new Soccer_Teams_dt_Template_loader();

      if ($obj_teams->have_posts()) {

         while ($obj_teams->have_posts()) {
            $obj_teams->the_post();

            $this->soccer_teams_Template->get_template_part('partials\content');
         }
      }
      wp_reset_postdata();
   }
}
