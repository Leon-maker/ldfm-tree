<?php

/**
 * Template Name: Single Influence
 * Template Post Type: influence
 */

get_header();
?>

<section class="single-influence-main-section">    
    <div class="single-influence-content-container"> <?= get_field('contenu');?></div>
    <div class="single-influence-end-section">
        <p>Auteur : <span><?=get_field('auteur'); ?> </span></p>
        <p> <?= get_the_date('d.m.y');?></p>
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
