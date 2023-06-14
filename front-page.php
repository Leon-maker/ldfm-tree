<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
	get_header( '', array( 'header-color' => $header_color) ); 
} else {
	get_header();
}

$img_bkg = wp_get_attachment_image_src(21412, 'full')[0];
$title_page = 'Boutique';
$description_page = "Découvrez l’ensemble de nos produits.";
$button1_page = "Catalogue indoor";
$button2_page = "Catalogue indoor";


$header_section_slug = 'home-page-header';

?>

<?php echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" button1="'. $button1_page .'" button2="'. $button2_page .'"]'); ?>

<?php get_footer() ?>

