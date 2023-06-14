<?php
/**
 * Template Name: Template Marques Page
 */
?>

<?php get_header(); ?>

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
            $img_marque = wp_get_attachment_image_src(get_field('image_marque'), 'full')[0]; 
    ?>
    <div class="marque-card">
        <img class="marque-card-img" src="<?= $img_marque ?>" alt="Image d'illustration marque"/>
        <h3 class="marque-card-title"><?php the_title(); ?></h3>

    </div>


    <?php endwhile; endif; ?>
</section>

<?php get_footer(); ?>