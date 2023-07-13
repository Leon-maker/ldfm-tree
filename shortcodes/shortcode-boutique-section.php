<?php
function SHORTCODE_Boutique_section()
{
    ob_start();
    $args = array(
        'post_type' => 'produit',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>
    <div class="fade-section">
        <section class="cpt-section-container boutique-section-container">
            <div class="cpt-section-header-title">
                <p>BOUTIQUE</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2>NOS PRODUITS</h2> 
                    <a href="/boutique" class="cta-secondary">Parcourir la boutique</a>
                </div>
                
            </div>
            <div class="cpt-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    echo do_shortcode('[shortcode-produit-card]');
                endwhile; ?>
            </div>
        </section>
    </div>
    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-boutique-section', 'SHORTCODE_Boutique_section');
