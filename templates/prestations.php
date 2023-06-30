<?php
/**
 * Template Name: Template Prestations Page
 */
?>

<?php 
$slug = "prestations";
echo do_shortcode('[shortcode-header-section slug-section="'. $slug .'"]'); 

$args = array(
    'post_type' => 'prestation',
    'posts_per_page' => 4   ,
    'orderby' => 'date',
    'order' => 'DESC'
);
$query = new WP_Query($args);
$alternate = false; 
if ($query->have_posts()) { ?>
    <section class="section-archive-all-realisations">
    <?php 
    while ($query->have_posts()) : $query->the_post(); 
        $alternate = !$alternate;
        $title = get_the_title();
        $prestation = get_field('prestation');
        $image_url = $prestation['image'];
        $description = $prestation['description'];
        $button_title = $prestation['titre_bouton'];
        $link = $prestation['lien_bouton'];
        echo do_shortcode('[shortcode-description-contact image_id="'.$image_url.'" title="'.$title.'" description="'.$description.'" alternate="'.$alternate.'" button_title="'.$button_title.'" link="'.$link.'"]');
    endwhile; ?>
    </section> <?php
}

echo do_shortcode('[shortcode-contact-section]'); 

get_footer();

