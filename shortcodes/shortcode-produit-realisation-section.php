<?php
function SHORTCODE_Produit_Realisation_section()
{
    ob_start();
    $produits = get_field("details_realisation")["produits_association"];
    if ($produits!=null) {
        $args = array(
            'post_type' => 'produit',
            'post__in' => $produits,
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);  
        
        if ($query->have_posts()){?> 
        
        <section class="cpt-section-container detail-realisation-slider produit-realisation-section-container">
            <div class="cpt-section-header-title">
                <p>BOUTIQUE</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2>PRODUITS UTILISÉS POUR CE PROJET</h2> 
                    <a href="" class="cta-secondary">Parcourir la boutique</a>
                </div>
            </div>
            <div class="swiper-container ">
                <div class="swiper-button-container">
                    <div class="cta-swiper-first swiper-button-prev"></div>
                    <div class=" cta-swiper-first swiper-button-next"></div>
                </div>
                <div class="cpt-section-card-wrapper swiper-wrapper">
                    <?php 
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <?php echo do_shortcode('[shortcode-produit-card]');?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
   <?php  } }
    return ob_get_clean();
}

add_shortcode('shortcode-produit-realisation-section', 'SHORTCODE_Produit_Realisation_section');
