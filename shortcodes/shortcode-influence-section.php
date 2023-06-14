<?php
function SHORTCODE_Influence_section()
{
    ob_start();
    $args = array(
        'post_type' => 'influence',
        'posts_per_page' => 3,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>

        <section class="influence-section-container">
            <div class="influence-section-header-title">
                <p>Inspirations</p>
                <div class="influence-section-header-sub-content-container">
                    <h2>Nos influences</h2> 
                    <a href="" class="cta-secondary">Toutes nos influences</a>
                </div>
                
            </div>
            <div class="influence-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    echo do_shortcode('[shortcode-influence-card]');
                endwhile; ?>
            </div>
        </section>

    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-influence-section', 'SHORTCODE_Influence_section');
