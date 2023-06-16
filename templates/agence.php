<?php
/**
 * Template Name: Template Agence Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21548, 'full')[0];
$title_page = 'L\'AGENCE';
$ArianeTitle = "L'agence";
$ArianeLink1 = "/lagence/";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 
?>
<div class="agence-main-section">
    <div class="agence-description-container">
        <div class="agence-side-description-container">
            <p class="agence-side-description">INFLUENCES by M, c’est le mariage de deux univers, celui de Virginie MAGREZ, alliant ses talents de créatrice en décoration et aménagement d’intérieur, à celui de Cédric MAGREZ, spécialiste de l’ameublement et développeur de projets innovants… De cette rencontre, est née INFLUENCES by M.<p>
        </div>
        <div class="agence-side-description-container">
            <p class="agence-side-description">Une nouvelle vision de votre intérieur… Ensemble, ils décident d’allier leurs compétences pour créer notre agence Influences by M. Celle-ci veut proposer un service haut de gamme et clés en mains pour rêver, penser, influencer et créer votre intérieur. Son principe, le respect de vos goûts et l’influence des tendances pour trouver l’accord parfait pour votre projet.</p>
        </div>
    </div>
</div>


<?php
echo do_shortcode('[shortcode-equipe-section]'); 

echo do_shortcode('[shortcode-contact-section]'); 


get_footer();
?>