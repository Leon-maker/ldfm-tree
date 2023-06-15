<?php

/**
 * Template Name: Single Realisation
 * Template Post Type: realisation
 */

get_header();

$img_bkg = wp_get_attachment_image_src(get_field("image_principale"), 'full')[0];
$title_page = get_the_title();

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '"]'); 

?>

<section class="single-realisation-main-section">

    <div class="single-realisation-description-container">
        <div class="single-realisation-side-description-container">
            <p class="single-realisation-side-description"> <?= get_field('details_realisation')['description_1']?></p>
        </div>
        <div class="single-realisation-side-description-container">
            <p class="single-realisation-side-description"> <?= get_field('details_realisation')['description_2'] ?></p>
        </div>
    </div>

    <div class="single-realisation-img-container">

    </div>
</section>


<?php echo do_shortcode('[shortcode-contact-section]'); ?>
<?php echo do_shortcode('[shortcode-realisation-section]'); ?>

<?php
get_footer();
?>
