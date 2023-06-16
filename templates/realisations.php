<?php
/**
 * Template Name: Template Réalisation Page
 */
?>

<?php get_header(); ?>

<?php 
$img_bkg = wp_get_attachment_image_src(21556, 'full')[0];
$title_page = 'Nos Réalisations';
$description_page = "Lorem ipsum dolor sit amet.";
$ArianeTitle = "Nos Réalisations";
$ArianeLink1 = "/nos-realisations/";
$alternate = false; 
echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

?>

<section class="section-archive-all-realisations">
    <?php
    $args = array(
        'post_type' => 'realisation',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
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
