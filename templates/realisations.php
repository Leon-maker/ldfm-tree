<?php
/**
 * Template Name: Template Réalisation Page
 */
?>

<?php get_header(); ?>

<?php 
$img_bkg = wp_get_attachment_image_src(21434, 'full')[0];
$title_page = 'Nos Réalisations';
$description_page = "Lorem ipsum dolor sit amet.";
$alternate = false; 
echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'"]'); 

?>

<section class="section-archive-all-realisations">
    <?php
    $args = array(
        'post_type' => 'realisation',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
            $alternate = !$alternate;
            echo do_shortcode('[shortcode-realisation-card alternate="' . $alternate . '"]');
        endwhile; 
    endif; ?>
</section>

<?php echo do_shortcode('[shortcode-contact-section]'); ?>




<?php get_footer(); ?>
