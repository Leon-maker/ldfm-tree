<?php
function SHORTCODE_Marque_section()
{
    ob_start();
    $args = array(
        'post_type' => 'marque',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>
    <div class="fade-section">
        <section class="cpt-section-container marque-section-container">
            <div class="cpt-section-header-title">
                <p>MARQUES</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2>Decouvrir nos marques</h2> 
                    <a href="/nos-marques" class="cta-secondary">Toutes nos marques</a>
                </div>
                
            </div>
            <div class="cpt-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    echo do_shortcode('[shortcode-marque-card]');
                endwhile; ?>
            </div>
        </section>
    </div>
    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-marque-section', 'SHORTCODE_Marque_section');
