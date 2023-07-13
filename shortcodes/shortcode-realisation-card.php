<?php
function SHORTCODE_realisation_card($atts)
{
    $args = shortcode_atts( array(
        'alternate' => null,
    ), $atts );

    ob_start();
    ?>
    <div class="fade-section">
    <div class="realisation-card card-mobile-<?= $atts["alternate"]==="1" ? "1" : "0" ?>">

        <?php if($args["alternate"]!==null && $args["alternate"]==="1"){ ?>

            <img class="realisation-card-img" src="<?= wp_get_attachment_image_src(get_field('image_principale') , 'full')[0];  ?>" alt="Image d'illustration réalisation"/>
            <div class="realisation-card-content-container">
                <div class="realisation-card-content">
                    <h3><?= get_the_title(); ?></h3>
                    <p class="realisation-card-description"> <?= wp_trim_words(get_field('details_realisation')['description_1'] , 25, '...');?></p>
                    <a href="<?= get_permalink(); ?>" class="cta-primary all-card-link realisation-card-link">En savoir plus</a>
                </div>
            </div>

            <?php } else{ ?>

                <div class="realisation-card-content-container">
                    <div class="realisation-card-content">
                        <h3><?= get_the_title(); ?></h3>
                        <p class="realisation-card-description"> <?= wp_trim_words(get_field('details_realisation')['description_1'] , 25, '...');?></p>
                        <a href="<?= get_permalink(); ?>" class="cta-primary all-card-link realisation-card-link">En savoir plus</a>
                    </div>
                </div>
                <img class="realisation-card-img" src="<?= wp_get_attachment_image_src(get_field('image_principale') , 'full')[0];  ?>" alt="Image d'illustration réalisation"/>
           
            <?php } ?>

    </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-realisation-card', 'SHORTCODE_realisation_card');



?>