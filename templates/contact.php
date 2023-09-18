<?php
/**
 * Template Name: Template Contact Page
 */
$title_page = get_the_title(); ?> 

<?php 
if ( has_post_thumbnail() ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post );
    if ( ! $post_thumbnail_id ) {
        return false;
    }
    $img_bkg = wp_get_attachment_image_url( $post_thumbnail_id, $size );
}
$title_page = 'Contactez-nous';
$ArianeTitle = "Contact";
$ArianeLink1 = get_the_permalink()  ;

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

$subtitle = "Envoyez nous un message";
$id_form = 1;

echo do_shortcode('[shortcode-contact id_form="'.$id_form.'" subtitle="'.$subtitle.'"]');


get_footer();
