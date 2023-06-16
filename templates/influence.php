<?php
/**
 * Template Name: Template Influence Page
 */
?>

<?php get_header(); ?>

<?php 
$img_bkg = wp_get_attachment_image_src(21556, 'full')[0];
$title_page = 'Nos Influences';
$description_page = "Lorem ipsum dolor sit amet.";
$ArianeTitle = "Nos Influences";
$ArianeLink1 = "/nos-influences/";
$alternate = false; 
echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

?>

<?php echo do_shortcode('[shortcode-contact-section]'); ?>



<section class="section-archive-all-influences">
    <?php
    $args = array(
        'post_type' => 'influence',
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

<?php get_footer(); ?>
