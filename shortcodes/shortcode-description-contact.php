<?php
function SHORTCODE_descriptionContact($atts)
{
    // Récupérer les attributs passés au shortcode
    $atts = shortcode_atts(array(
        'image_id' => '', // ID de l'image
        'title' => '', // Titre
        'description' => '', // Description
        'link' => '', // Description
        'alternate' => null,
    ), $atts);

    ob_start();
    ?>
    <div class="realisation-card">
        <?php if($atts["alternate"]!==null && $atts["alternate"]==="1"){ ?>
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
        <?php } else{ ?>
            <div class="realisation-card-content-container">
                <div class="realisation-card-content">
                    <h2><?= $atts['title']; ?></h2>
                    <p class="realisation-card-description"><?= $atts['description']; ?></p>
                    <?php if (!empty($atts['link'])) { ?>
                        <a href="<?= $atts['link']; ?>" class="cta-primary all-card-link realisation-card-link">Prendre rendez-vous</a> <?php
                    } ?>
                </div>            
            </div>
            <img class="realisation-card-img" src="<?= wp_get_attachment_image_src($atts['image_id'], 'full')[0];  ?>" alt="Image d'illustration contact"/>
        <?php } ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-description-contact', 'SHORTCODE_descriptionContact');
