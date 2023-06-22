<?php
function SHORTCODE_equipe_card($args)
{
    ob_start();
    $atts = shortcode_atts( array(
        'nom' => null,
        'prenom' => null,
        'photo' => null,
        'description' => null,
        'metier' => null,

    ), $args );

    $photo = $atts['photo'];
    $nom = $atts['nom'];
    $prenom = $atts['prenom'];
    $description = $atts['description'];
    $metier = $atts['metier'];

    ?>

    <div class="equipe-card">
        <div class="equipe-card-content-container">
            <img class="equipe-card-img" src="<?= $photo ?? " " ?>" alt="Image d'illustration marque"/>
            <?php if (isMobile()) {?>
                <div class="equipe-card-footer">
                    <h3 class="equipe-card-title"><?= $prenom ?? " " ?> <span><?= $nom ?? " " ?></span></h3>
                    <p class="equipe-card-metier"><?= $metier ?? " " ?></p>
                </div><?php
            }
            ?>
            <div class="equipe-card-container-paragraphe">
                <p class="equipe-card-paragraphe"><?= $description ?? " " ?></p>
            </div>
        </div>
        <?php
        if (!isMobile()) { ?>
            <div class="equipe-card-footer">
            <h3 class="equipe-card-title"><?= $prenom ?? " " ?> <span><?= $nom ?? " " ?></span></h3>
            <p class="equipe-card-metier"><?= $metier ?? " " ?></p>
            </div><?php
        }
        ?>
        
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-equipe-card', 'SHORTCODE_equipe_card');



?>