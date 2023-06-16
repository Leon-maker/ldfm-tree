<?php
function SHORTCODE_descriptionContact($atts)
{
    // Récupérer les attributs passés au shortcode
    $atts = shortcode_atts(array(
        'image_id' => '', // ID de l'image
        'title' => '', // Titre
        'description' => '', // Description
        'link' => '', // Description
    ), $atts);

    ob_start();
    ?>
    <div class="realisation-card">
        <img class="realisation-card-img" src="<?= wp_get_attachment_image_src($atts['image_id'], 'full')[0];  ?>" alt="Image d'illustration contact"/>
        <div class="realisation-card-content-container">
            <div class="realisation-card-content">
                <h2><?= $atts['title']; ?></h2>
                <p class="realisation-card-description"><?= $atts['description']; ?></p>
                <?php if (!empty($atts['link'])) { ?>
                    <a href="<?= $atts['link']; ?>" class="cta-primary all-card-link realisation-card-link">Prendre rendez-vous</a> <?php
                } ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-description-contact', 'SHORTCODE_descriptionContact');
