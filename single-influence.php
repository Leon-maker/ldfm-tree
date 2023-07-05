<?php

/**
 * Template Name: Single Influence
 * Template Post Type: influence
 */

get_header();

$img_bkg = wp_get_attachment_image_src(get_field("image_principale"), 'full')[0];
$title_page = get_the_title();



echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '"]'); 

?>

<section class="single-influence-main-section">    
    <div class="single-influence-content-container"> <?= get_field('contenu');?></div>
    <div class="single-influence-end-section">
        <p class="auteur">Auteur : <span><?=get_field('auteur'); ?> </span></p>
        <p class="date"> <?= get_the_date('d.m.y');?></p>
    </div>
</section>
<div class="single-influence-separator">
    <div class="single-influence-separator-line"></div>
</div>
<?php echo do_shortcode('[shortcode-influence-section]'); ?>
<?php echo do_shortcode('[shortcode-contact-section]'); ?>
<?php
get_footer();
?>
