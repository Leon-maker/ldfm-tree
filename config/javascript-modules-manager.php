<?php

// Handle managing the javascript modules
function thrive_register_javascript_modules() {
    /** Swiper CDN **/
    wp_register_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
        array(),
        '1.0'
    );
    wp_enqueue_script('swiper');

    // CSS
    wp_register_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
        array(),
        '1.0'
    );
    wp_enqueue_style('swiper');

    /**
     * GSAP
     */
    wp_register_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script('gsap');

    /**
     * Isotope
     */
    wp_register_script(
        'isotope',
        'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js',
        array(),
        '1.0',
        true
    );
    wp_enqueue_script('isotope');

}
add_action( 'wp_enqueue_scripts', 'thrive_register_javascript_modules' );
