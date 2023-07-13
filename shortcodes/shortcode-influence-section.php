<?php
function SHORTCODE_Influence_section()
{
    ob_start();
    $args = array(
        'post_type' => 'influence',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>
    <div class="fade-section">
        <section class="cpt-section-container influence-section-container">
            <div class="cpt-section-header-title">
                <p>Inspirations</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2 class="uppercase">Nos influences</h2> 
                    <a href="/nos-influences" class="cta-secondary">Toutes nos influences</a>
                </div>
                
            </div>
            <div class="cpt-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    echo do_shortcode('[shortcode-influence-card]');
                endwhile; ?>
            </div>
        </section>
    </div>
    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-influence-section', 'SHORTCODE_Influence_section');
