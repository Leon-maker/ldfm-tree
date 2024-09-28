<?php

function SHORTCODE_HomeSection()
{
    ob_start();
    // $header_section_slug = 'accueil';
    // $image = get_field('image');
    // $title = get_field('titre');
    // $subtitle = get_field('subtitle');
    // $bouton = get_field('bouton');
    // $description = get_field('description');
    get_header();
    ?>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-home-section', 'SHORTCODE_HomeSection');