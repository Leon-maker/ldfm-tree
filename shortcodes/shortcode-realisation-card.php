<?php
function SHORTCODE_realisation_card()
{
    ob_start();
    ?>

    <div class="realisation-card">
        <img class="realisation-card-img" src="<?= wp_get_attachment_image_src(get_field('image_principale') , 'full')[0];  ?>" alt="Image d'illustration réalisation"/>
        <div class="realisation-card-right-content">
            <p><?= get_the_title(); ?></p>
            <a class="cta-primary">En savoir plus</a>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-realisation-card', 'SHORTCODE_realisation_card');



?>