<?php
/**
 * Template Name: Template Marques Page
 */
?>

<?php 
$slug = "nos-marques";
echo do_shortcode('[shortcode-header-section slug-section = "'.$slug.'"]'); 

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