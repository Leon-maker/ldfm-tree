<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
	get_header( '', array( 'header-color' => $header_color) ); 
} else {
	get_header();
}

$img_bkg = wp_get_attachment_image_src(21412, 'full')[0];
$title_page = 'Boutique';
$description_page = "Découvrez l’ensemble de nos produits.";
$button1_page = "Catalogue indoor";
$button2_page = "Catalogue indoor";


$header_section_slug = 'home-page-header';
$args = array(
  'post_type'   => 'sections',
  'name'        => $header_section_slug,
  'post_status' => 'publish',
  'numberposts' => 1
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $title = get_the_title();
    $section_id = get_the_ID();
    if (has_post_thumbnail()) {
        $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
        $thumbnail_url = $thumbnail_data[0]; 
    }
    $slider = get_field('slider');
    $slide_repeater = $slider['slide'];
}

?>

<?php echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" button1="'. $button1_page .'" button2="'. $button2_page .'"]'); ?>

<section class="header-bkg header-slider no-margin-top no-margin-bottom">
    <div class="header-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($slide_repeater as $slide) {
                    ?>
                    <!--<div class="swiper-slide img-container product-image" style="background-image: url('<?php //echo $slide['slide_image']; ?>');" role="img" aria-label="Image d'illustration d'accueil du site web <?php //the_title(); ?>" style="width: 100%;">-->
                    <div class="swiper-slide img-container product-image">
                        <img class="img-container product-image cover" src="<?php echo $slide['image_de_la_slide']; ?>" alt="Image d'illustration d'accueil du site web <?php the_title(); ?>" style="width: 100%;"/>
                        <div class="left-container">
                            <div class="title-and-slogan">
                                <h2 class="large">
                                    <?php echo $slide['titre_de_la_slide']; ?>
                                </h2>
                                <p class="description"><?php echo $slide['sous-titre_de_la_slide']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-container left">
                <div class="swiper-button-prev cta-primary"></div>
                <div class="swiper-button-next cta-primary"></div>
            </div>
        </div>
    </div>
</section>

<?php get_footer() ?>

