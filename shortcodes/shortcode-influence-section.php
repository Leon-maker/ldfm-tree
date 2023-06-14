<?php
function SHORTCODE_Influence_section()
{
    ob_start();
    $args = array(
        'post_type' => 'influence',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :?>

        <section class="influence-section-container">
            <div class="influence-section-header-title">
                <p>Inspirations</p>
                <h2>Nos influences</h2>
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
