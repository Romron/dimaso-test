<?php

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}


class Elementor_Soccer_teams_dt_Widgets extends Elementor\Widget_Base
{
   protected $soccer_teams_Template;
   protected $arr_Leagues = array('' => 'Clear filter');

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
         'count',
         [
            'label' => esc_html__('Number of teams', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '3',

         ]
      );

      $this->add_control(
         'leagues',
         [
            'label' => esc_html__('Select league', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => ' ',
            'options' =>  $this->arr_Leagues,
         ]
      );

      $this->add_control(
         'search_by_keyword',
         [
            'label' => esc_html__('Search by keyword', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '',

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

      echo $settings['search_by_keyword'];


      $args = array(
         'post_type' => 'soccer-team',
         'posts_per_page' => $settings['count'],
         'meta_query' => array('relation' => 'AND'),
         'tax_query' => array('relation' => 'AND'),
         's' => '',
      );


      if (isset($settings['leagues']) && $settings['leagues'] != '') {
         array_push($args['tax_query'], array(
            'taxonomy' => 'league',
            'terms' => $settings['leagues'],
         ));
      }

      if (isset($settings['search_by_keyword']) && $settings['search_by_keyword'] != '') {
         $args['s'] = $settings['search_by_keyword'];
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
