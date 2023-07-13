<?php
function SHORTCODE_realisation_section($atts)
{
    ob_start();

    $args = array(
        'post_type' => 'realisation',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    $alternate = false;

    // Récupérer l'attribut du titre
    $atts = shortcode_atts(array(
        'titre' => 'Voir aussi nos réalisations'
    ), $atts);
    $titre = $atts['titre'];

    if ($query->have_posts()) :
?>
    <div class="fade-section">
        <section class="cpt-section-container realisation-section-container">
            <div class="cpt-section-header-title">
                <p>Projets</p>
                <div class="cpt-section-header-sub-content-container">
                    <h2><?php echo $titre; ?></h2>
                    <a href="/nos-realisations" class="cta-secondary">Voir nos réalisations</a>
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
    </div>
<?php
    endif;

    return ob_get_clean();
}

add_shortcode('shortcode-realisation-section', 'SHORTCODE_realisation_section');

