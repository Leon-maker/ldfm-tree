<?php
function SHORTCODE_descriptionContact($atts)
{
    // Récupérer les attributs passés au shortcode
    $atts = shortcode_atts(array(
        'image_id' => '', // ID de l'image
        'title' => '', // Titre
        'description' => '', // Description
        'button_title' => '', // Description
        'link' => '', // Description
        'alternate' => null,
    ), $atts);

    ob_start();
    $attsId = strtolower($atts['title']);
    $attsId = iconv('UTF-8', 'ASCII//TRANSLIT', $attsId);
    ?>
    <div class="fade-section">
    <div  id="<?= $attsId; ?>" class="realisation-card card-mobile-<?= $atts["alternate"]==="1" ? "1" : "0" ?>">
    <?php if($atts["alternate"]!==null && $atts["alternate"]==="1"){ ?>
            <img class="realisation-card-img" src="<?= $atts['image_id'];  ?>" alt="Image d'illustration contact"/>
            <div class="realisation-card-content-container">
                <div class="realisation-card-content">
                    <h2><?= $atts['title']; ?></h2>
                    <?php echo $atts['description']; ?>
                    <?php if (!empty($atts['button_title'])) { ?>
                        <a href="<?php echo $atts['link']; ?>" class="cta-secondary all-card-link realisation-card-link"><?php echo $atts['button_title']; ?></a> <?php
                    } ?>
                </div>
            </div>
        <?php } else{ ?>
            <div class="realisation-card-content-container">
                <div class="realisation-card-content">
                    <h2><?= $atts['title']; ?></h2>
                    <p class="realisation-card-description"><?= $atts['description']; ?></p>
                    <?php if (!empty($atts['button_title'])) { ?>
                        <a href="<?php echo $atts['link']; ?>" class="cta-secondary all-card-link realisation-card-link"><?php echo $atts['button_title']; ?></a> <?php
                    } ?>
                </div>            
            </div>
            <img class="realisation-card-img" src="<?= $atts['image_id'];  ?>" alt="Image d'illustration contact"/>
        <?php } ?>
    </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-description-contact', 'SHORTCODE_descriptionContact');

/*

*/