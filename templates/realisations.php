<?php
/**
 * Template Name: Template Réalisation Page
 */
?>

<?php 
$slug = "nos-realisations";
$alternate = false; 
echo do_shortcode('[shortcode-header-section slug-section="'. $slug .'"]'); 
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
