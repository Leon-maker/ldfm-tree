<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
	get_header( '', array( 'header-color' => $header_color) ); 
} else {
	get_header();
}

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

<section class="home-section header-bkg header-slider no-margin-top no-margin-bottom">
    <div class="header-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($slide_repeater as $slide) {
                    ?> 
                    <section class="padding-top-header swiper-slide" style="background-image: url('<?php echo $slide['image_de_la_slide']; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
                        <div class="text-center white">
                            <h1>
                                <?php echo $slide['titre_de_la_slide']; ?>
                            </h1>
                            <?php if (!empty($slide['sous-titre_de_la_slide'])) { ?>
                                <h3>
                                    <?php echo $slide['sous-titre_de_la_slide']; ?> 
                                </h3>
                            <?php } ?>
                            <div class="header-button">
                                <?php if (!empty($slide['bouton'])) { ?>
                                    <a class="cta-secondary white" href="<?php echo $slide['bouton']['lien_bouton']; ?>"><?php echo $slide['bouton']['titre_bouton']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </section>
                <?php } ?>
            </div>
            <div class="swiper-button-container left">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="mouse-div">
                <a class="cta-mouse white" href="">
                    <span class="arrow">
                    </span>
                </a>
            </div>   
        </div>
    </div>
</section>

<?php get_footer() ?>


<!-- <?php
// $img_bkg = wp_get_attachment_image_src(21412, 'full')[0];
// $title_page = 'Boutique';
// $description_page = "Découvrez l’ensemble de nos produits.";
// $button1_page = "Catalogue indoor";
// $button2_page = "Catalogue indoor";

// echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" button1="'. $button1_page .'" button2="'. $button2_page .'"]'); 
?> -->
