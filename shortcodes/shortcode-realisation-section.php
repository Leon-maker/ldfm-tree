<?php
function SHORTCODE_realisation_section()
{
    ob_start();
    $args = array(
        'post_type' => 'realisation',
        'posts_per_page' => 3,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    $alternate = false; 
    if ($query->have_posts()) :?>

        <section class="cpt-section-container realisation-section-container">
            <div class="cpt-section-header-title">
                <p>Projets</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2>Voir aussi nos réalisations</h2> 
                    <a href="" class="cta-secondary">Voir nos réalisations</a>
                </div>
                
            </div>
            <div class="cpt-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    $alternate = !$alternate;
                    echo do_shortcode('[shortcode-realisation-card alternate="' . $alternate . '"]');
                endwhile; ?>
            </div>
        </section>

    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-realisation-section', 'SHORTCODE_realisation_section');
