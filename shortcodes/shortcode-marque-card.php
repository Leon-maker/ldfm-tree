<?php
function SHORTCODE_nos_marques_card()
{
    ob_start();
    ?>

    <div class="marque-card">
        <img class="marque-card-img" src="<?= wp_get_attachment_image_src(get_field('image_principale') , 'full')[0];  ?>" alt="Image d'illustration marque"/>
        <div class="marque-card-content-container">
            <h3 class="marque-card-title"><?= get_the_title()?></h3>
            <div class="marque-card-container-paragraphe">
                <p class="marque-card-paragraphe"><?= get_field('description'); ?></p>
            </div>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-marque-card', 'SHORTCODE_nos_marques_card');



?>