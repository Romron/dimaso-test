<?php



function register_soccer_teams_elementor_widgets($widgets_manager)
{

   // require_once(__DIR__ . '/widgets/widget-1.php');
   // require_once(__DIR__ . '/widgets/widget-2.php');

   // $widgets_manager->register(new \Elementor_Widget_1());
   // $widgets_manager->register(new \Elementor_Widget_2());
}
add_action('elementor/widgets/register', 'register_soccer_teams_elementor_widgets');
