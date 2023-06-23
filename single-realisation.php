<?php

/**
 * Template Name: Single Realisation
 * Template Post Type: realisation
 */

get_header();

$img_bkg = wp_get_attachment_image_src(get_field("image_principale"), 'full')[0];
$title_page = get_the_title();
$images = get_field('details_realisation')["selection_dimages"]; 

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

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
    <?php 
    if (!empty($images)){
        $nbImg = count($images);
        $images = array_filter($images, function($img) {
            if (isset($img["image"]) && $img["image"] === false) {
                return false;
            }
            else return true;
        });
     ?>
    <div class="single-realisation-img-container single-realisation-img-container-<?=count($images);?>  ">
       <?php 
       $counter=0;
       foreach ($images as $img) { $counter++?>
        <div class="test nb-image-<?php if($counter === count($images)) echo $counter ?>">
            <img src="<?= $img["image"]["url"] ?>" alt="<?= $img["image"]["alt"] ?>">
        </div>
       <?php } ?>
    </div>
    <?php
    }
       ?>
</section>


<?php echo do_shortcode('[shortcode-produit-realisation-section]');

$realisation_title = "Voir aussi ces réalisations";
echo do_shortcode('[shortcode-realisation-section titre="'.$realisation_title.'"]'); 

echo do_shortcode('[shortcode-contact-section]'); ?>


<?php
get_footer();
?>
