<?php

get_header(); ?>

<div class="wraper">

   <?php
   if (have_posts()) {


      while (have_posts()) {
         the_post();


   ?>

   <?php }

      // Pagination

   } else {
      echo '<p>' . esc_html__('No sosser teams', 'soccer-teams-dt') . '<p>';
   }

   ?>
</div>

<?php get_footer(); ?>