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
    <?php
    /* SECTION GALLERIE IMAGES */
    if (get_field('gallerie_dimage')) :
        $gallery_images = get_field('gallerie_dimage_fichiers');
        $gallery_title = get_field('gallerie_dimage_titre_de_la_gallerie');
        if( $gallery_images ): ?>
        <section class="section-post">
            <h2><?= $gallery_title ?></h2>
            <?php 
                get_template_part(
                    'template-parts/swiper-images',
                    'article',
                    array(
                        /* Custom Datas : Sidebar swiper Le centre en images */
                        'galleryArray'			=> $gallery_images, // ACF Queries*/
                    )
                ); 
            ?>
        </section>

    <?php endif;
    endif;
    ?>
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
