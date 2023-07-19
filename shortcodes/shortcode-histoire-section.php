<?php
function SHORTCODE_HistoireSection()
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
        $section_histoire = get_field('histoire_section');
        $titre_histoire = $section_histoire['titre'];
        $description_histoire = $section_histoire['description'];
        $img_bkg_histoire = $section_histoire['image'];
    }
        
    ?>
    <div class="fade-section">

    <section class="padding-histoire" style="background-image: url('<?php echo wp_get_attachment_image_src($img_bkg_histoire, 'full')[0]; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
        <section class="bkg-filter">
        <div class="text-center white">
            <h2 class="uppercase">
                <?= $titre_histoire ?>
            </h2>
            <h3>
                <?= $description_histoire ?>
            </h3>
            <div class="header-button boldy">
                <a class="cta-secondary white" href="/lagence">En savoir plus</a>
            </div>
        </div>
        </div>
    </section>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-histoire-section', 'SHORTCODE_HistoireSection');
