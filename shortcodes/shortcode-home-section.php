<?php

function SHORTCODE_HomeSection()
{
    ob_start();

    $header_section_slug = 'accueil';
    $args = array(
    'post_type'   => 'page',
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
        $title_seo = $slider['titre_seo'];
    }
    get_header();
    ?>

    <section class="home-section header-bkg header-slider no-margin-top no-margin-bottom">
        <h1 class="hidden"><?= $title_seo ?></h1>
        <div class="header-wrapper">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($slide_repeater as $slide) {
                        ?> 
                        <section class="padding-top-header swiper-slide" style="background-image: url('<?php echo $slide['image_de_la_slide']; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
                            <div class="bkg-filter">
                                <div class="text-center white">
                                    <h2 class="copyH1">
                                        <?php echo $slide['titre_de_la_slide']; ?>
                                    </h2>
                                    <?php if (!empty($slide['sous-titre_de_la_slide'])) { ?>
                                        <h3>
                                            <?php echo $slide['sous-titre_de_la_slide']; ?> 
                                        </h3>
                                    <?php } ?>
                                    <div class="header-button boldy">
                                        <?php if (!empty($slide['bouton'])) { ?>
                                            <a class="cta-secondary white" href="<?php echo $slide['bouton']['lien_bouton']; ?>"><?php echo $slide['bouton']['titre_bouton']; ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                </div>
                <div class="swiper-button-container left">
                    <div class="swiper-button-prev cta-swiper-first"></div>
                    <div class="swiper-button-next cta-swiper-first"></div>
                </div>
                <div class="mouse-div">
                    <a class="cta-mouse white">
                        <span class="arrow">
                        </span>
                    </a>
                </div> 
                <div class="pagination-container"></div>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-home-section', 'SHORTCODE_HomeSection');