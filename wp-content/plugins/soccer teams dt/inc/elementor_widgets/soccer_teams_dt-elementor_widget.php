<?php
class Elementor_Soccer_teams_dt extends \Elementor\Widget_Base
{

   public function get_name()
   {
      return 'soccer teams ';
   }

   public function get_title()
   {
      return esc_html__('Get soccer teams dt', 'soccer-teams-dt');
   }

   public function get_icon()
   {
      return 'fa fa-futbol-o';          //select icon
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
            'label' => esc_html__('Title', 'soccer-teams-dt'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => esc_html__('Title', 'soccer-teams-dt'),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => esc_html__('Hello world', 'soccer-teams-dt'),
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
?>

      <p class="hello-world">
         <?php echo $settings['title']; ?>
      </p>

<?php
   }
}
