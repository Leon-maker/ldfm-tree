<?php
/**
 * Template Name: Template Showroom Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21537, 'full')[0];
$title_page = 'RDV SHOWROOM';
$ArianeTitle = "Prendre rendez-vous au showroom";
$ArianeLink1 = get_the_permalink();

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Prendre rendez-vous au showroom";
$id_form = 4;

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');

$showroom_slug = "rdv-showroom";
$args = array(
    'post_type'   => 'page',
    'name'        => $showroom_slug,
    'post_status' => 'publish',
    'numberposts' => 1
    );
$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $info_pratique_showroom = get_field('carte_contact');
    $title_showroom = $info_pratique_showroom['titre'];
    $description_showroom = $info_pratique_showroom['description'];
    $image_showroom = $info_pratique_showroom['image'];
}

echo do_shortcode('[shortcode-description-contact image_id="'.$image_showroom.'" title="'.$title_showroom.'" description="'.$description_showroom.'" alternate="1"]');


get_footer();
?>