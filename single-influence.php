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
        <p>Auteur : <?=get_field('auteur'); ?></p>
        <p> <?= get_the_date('d.m.y');?></p>
    </div>
</section>
<div cl></div>

<?php
get_footer();
?>
