<?php
/**
 * Template Name: Template Bureau Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21548, 'full')[0];
$title_page = 'RDV BUREAU D’ÉTUDES';
$ArianeTitle = "Prendre rendez-vous au bureau d’études";
$ArianeLink1 = "https://influence-by-m.thrive-production.fr/contact/rdv-bureau-detudes/";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Prendre rendez-vous au bureau d’études";
$id_form = 5;

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');

get_footer();
?>