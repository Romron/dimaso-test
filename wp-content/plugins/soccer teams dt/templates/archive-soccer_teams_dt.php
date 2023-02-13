<?php

get_header(); ?>

<div class="wraper">

   <?php
   if (have_posts()) {

      while (have_posts()) {
         the_post();

         $soccer_teams_dt_template_loader->get_template_part('partials\content');
      }

      // Pagination
      posts_nav_link();
   } else {
      echo '<p>' . esc_html__('No sosser teams', 'soccer-teams-dt') . '<p>';
   }

   ?>
</div>

<?php get_footer(); ?>