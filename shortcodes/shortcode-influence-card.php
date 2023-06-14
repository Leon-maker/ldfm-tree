<?php
function SHORTCODE_Influence_card()
{
    ob_start();
    $terms = get_the_terms(get_the_ID(), 'influence-categorie'); ?>
   
    <div class="influence-card">
        <img class="influence-card-img" src="<?= wp_get_attachment_image_src(get_field('image_principale') , 'full')[0];  ?>" alt="Image d'illustration influence"/>
        <p class="influence-card-categorie"><?= $terms[0]->name; ?></p>
        <div class="influence-card-content">
            <h3 class="influence-card-title"><?= get_the_title()?></h3>
            <p class="influence-card-text"><?= wp_trim_words(get_field('contenu'), 20, '...'); ?> </p>
            <a href="" class="influence-section-card-link cta-primary ">En savoir plus</a>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-influence-card', 'SHORTCODE_Influence_card');
