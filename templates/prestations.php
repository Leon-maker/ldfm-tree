<?php
/**
 * Template Name: Template Prestations Page
 */
?>

<?php 
$img_bkg = wp_get_attachment_image_src(21556, 'full')[0];
$title_page = 'Nos Prestations';
$description_page = "Lorem ipsum dolor sit amet.";
$ArianeTitle = "Nos prestations";
$ArianeLink1 = "https://influence-by-m.thrive-production.fr/nos-marques/";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 


$image_id = 21538;
$title = "Rêver";
$description = "INFLUENCES by M, c’est d’abord une rencontre, un échange. Nous visitons avec vous le lieu de votre projet pour récolter toutes les informations nécessaires à sa préparation. Photos, côtes, circulations, accès, ouvertures détails techniques et architecturaux.
Nous réalisons ensuite ensemble un cahier des charges pour définir vos goûts, styles, impératifs, la faisabilité, les contraintes techniques, le délai et le budget global.";
$button_title = "Découvrir nos marques";
$link = "/nos-marques/";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="1" button_title="'.$button_title.'" link="'.$link.'"]');

$image_id = 21538;
$title = "Penser";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
$button_title = "Découvrir nos marques";
$link = "/nos-marques/";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="0" button_title="'.$button_title.'" link="'.$link.'"]');

$image_id = 21538;
$title = "Influencer";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="1"]');

$image_id = 21538;
$title = "Créer";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="0"]');
