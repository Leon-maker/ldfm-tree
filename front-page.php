<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';


echo do_shortcode('[shortcode-home-section]'); 

// echo do_shortcode('[shortcode-boutique-section]');

// $realisation_title = "Nos réalisations";
// echo do_shortcode('[shortcode-histoire-section]');
// echo do_shortcode('[shortcode-realisation-section titre="'.$realisation_title.'"]');
// echo do_shortcode('[shortcode-influence-section]');
// echo do_shortcod<e('[shortcode-contact-section]');
$img_bkg = wp_get_attachment_image_src(10, 'full')[0];
$membres_famille = get_posts( array(
  'post_type' => 'membre_famille',
  'posts_per_page' => -1, 
));
?>
    <?= do_shortcode('[tree id=88]');  ?>
<?php

get_template_part(
  'template-parts/footer',
);
?>

