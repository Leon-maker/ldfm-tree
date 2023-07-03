<?php
/**
 * Template Name: Template Bureau Page
 */
$title_page = get_the_title(); 
?>
<?php 
$img_bkg = wp_get_attachment_image_src(21548, 'full')[0];
$title_page = 'RDV BUREAU D’ÉTUDES';
$ArianeTitle = "Prendre rendez-vous au bureau d’études";
$ArianeLink1 = get_the_permalink()  ;

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Prendre rendez-vous au bureau d’études";
$id_form = 5;

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');

$bureau_slug = "rdv-bureau-detudes";
$args = array(
    'post_type'   => 'page',
    'name'        => $bureau_slug,
    'post_status' => 'publish',
    'numberposts' => 1
    );
$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $info_pratique_bureau = get_field('carte_contact');
    $title_bureau = $info_pratique_bureau['titre'];
    $description_bureau = $info_pratique_bureau['description'];
    $image_bureau = $info_pratique_bureau['image'];
}

echo do_shortcode('[shortcode-description-contact image_id="'.$image_bureau.'" title="'.$title_bureau.'" description="'.$description_bureau.'" alternate="1"]');

get_footer();
?>
