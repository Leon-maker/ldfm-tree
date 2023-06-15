<?php
/**
 * Template Name: Template Marques Page
 */
?>

<?php get_header(); ?>

<?php 
$img_bkg = wp_get_attachment_image_src(21512, 'full')[0];
$title_page = 'Nos Marques';
$description_page = "Lorem ipsum dolor sit amet.";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'"]'); 

?>

<section class="section-archive-all-marque">
    <?php
    $args = array(
        'post_type' => 'marque',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); 
        echo do_shortcode('[shortcode-marque-card]');
        endwhile; 
    endif; ?>
</section>

<?php echo do_shortcode('[shortcode-influence-section]'); ?>

<?php get_footer(); ?>