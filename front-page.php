<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
	get_header( '', array( 'header-color' => $header_color) ); 
} else {
	get_header();
}

$img_bkg = wp_get_attachment_image_src(21352, 'full')[0];

$header_section_slug = 'home-page-header';

$title_page = 'ACCUEIL';
?>

<?php echo do_shortcode('[shortcode-header-section]'); ?>

<?php echo do_shortcode("[shortcode-contact-section]"); ?>


<?php get_footer() ?>

