<?php
/**
 * Template Name: Template Confirmation formulaire de showroom
 */
get_header(); ?>
<div class="confirm-form">
    <h1>Votre demande a bien été envoyée</h1>
</div>
<script>
    document.querySelector('header').classList.remove('top-reached');
    document.querySelector('header .site-branding img').src = '/wp-content/uploads/2023/06/logo-noir-1.svg';
    setTimeout(function() {
        window.location.href = "/";
    }, 2000);
</script>

<?php get_footer(); ?>