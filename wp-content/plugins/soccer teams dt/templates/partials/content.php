<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php echo get_the_post_thumbnail(get_the_id(), 'large'); ?>
   <h1><?php echo esc_html__(get_post_meta(get_the_id(), 'soccer_team_name', true)); ?> </h1>
   <h2><?php echo esc_html__(get_post_meta(get_the_id(), 'soccer_team_nickname', true)); ?> </h2>
   <h3><?php $leagues = get_the_terms(get_the_id(), 'league');


         foreach ($leagues as $league) {
            $image_id = get_term_meta($league->term_id, '_thumbnail_id', 1);
            $image_url = wp_get_attachment_image_url($image_id, 'full');

            echo '<img src="' . $image_url . '" alt="' . esc_html__($league->name) . ' logo" />';
            echo esc_html__($league->name);
         }

         // echo "<pre>";
         // print_r($leagues);
         // echo "</pre>";




         ?>




   </h3>


   <span class="history text-style"> <?php echo esc_html__(get_post_meta(get_the_id(), 'soccer_team_history', true)); ?></span>
</article>