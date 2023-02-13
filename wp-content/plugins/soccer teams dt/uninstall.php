<?php

$arr_soccer_teams = get_post(array('post_type' => 'Soccer Team', 'numberposts' => -1));
foreach ($arr_soccer_teams as $soccer_team) {
   wp_delete_post($soccer_team->ID, true);
}
