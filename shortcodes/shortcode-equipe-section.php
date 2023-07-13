<?php
function SHORTCODE_Equipe_section()
{
    ob_start();
    $args = array(
        'post_type' => 'equipe',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts() ) :
        $query->the_post();
        $employes = get_field('employe');
    ?>
    <div class="fade-section">
        <section class="cpt-section-container equipe-section-container">
            <div class="cpt-section-header-title">
                <p>PROFILS</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2>Notre équipe</h2> 
                    <a href="/contact" class="cta-secondary">Rejoindre l'équipe</a>
                </div>
                
            </div>
            <div class="cpt-section-card-wrapper">
                <?php 
                foreach ($employes as $em) {
                    echo do_shortcode('[shortcode-equipe-card nom="'.$em["nom"].'" prenom="'.$em["prenom"].'" photo="'.$em["photo"].'" description="'.$em["description"].'" metier="'.$em["metier"].'" ]');
                } ?>
            </div>
        </section>
    </div>
    <?php endif; 
    return ob_get_clean();
}

add_shortcode('shortcode-equipe-section', 'SHORTCODE_Equipe_section');
