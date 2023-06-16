<?php
/**
 * Template Name: Template Showroom Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21537, 'full')[0];
$title_page = 'RDV SHOWROOM';
$ArianeTitle = "Prendre rendez-vous au showroom";
$ArianeLink1 = "https://influence-by-m.thrive-production.fr/contact/rdv-showroom/";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Prendre rendez-vous au showroom";
$id_form = 4;

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');

$image_id = 21538;
$title = "NOTRE SHOWROOM";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="1"]');


get_footer();
?>