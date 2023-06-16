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

$args = array(
    'post_type' => 'prestation',
    'posts_per_page' => 4   ,
    'orderby' => 'date',
    'order' => 'DESC'
);
$query = new WP_Query($args);
$alternate = false; 
if ($query->have_posts()) { ?>
    <div class="cpt-section-card-wrapper">
    <?php 
    while ($query->have_posts()) : $query->the_post(); 
        $alternate = !$alternate;
        $title = get_the_title();
        $prestation = get_field('prestation');
        $image_url = $prestation['image'];
        $image_id = attachment_url_to_postid($image_url);
        $description = $prestation['description'];
        $button_title = $prestation['titre_bouton'];
        $link = $prestation['lien_bouton'];
        echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'" alternate="'.$alternate.'" button_title="'.$button_title.'" link="'.$link.'"]');
    endwhile; ?>
    </div> <?php
}
