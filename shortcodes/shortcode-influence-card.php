<?php
function SHORTCODE_Influence_card()
{
    ob_start();
    $choixGroup = get_field('image_ou_video');
    $choix = $choixGroup['choix'];
    $terms = get_the_terms(get_the_ID(), 'influence-categorie'); ?>
    <div class="influence influence-category-<?php echo $terms[0]->term_id; ?>">
        
        <div class="influence-card">
            <?php
            if ($choix=='video'){ ?>
                <video class="influence-card-img" playsinline autoplay muted loop>
                    <source src="<?php echo $choixGroup["video"] ?>">
                </video> <?php
            } 
            if ($choix=='image'){ ?>
                <img class="influence-card-img" src="<?= wp_get_attachment_image_src($choixGroup["image"] , 'full')[0];  ?>" alt="Image d'illustration influence"/> <?php
            } ?>
            <p class="influence-card-categorie"><?= $terms[0]->name; ?></p>
            <div class="influence-card-content">
                <h3 class="influence-card-title"><?= get_the_title()?></h3>
                <p class="influence-card-text"><?= wp_trim_words(get_field('contenu'), 20, '...'); ?> </p>
                <a href="<?=  get_permalink(); ?>" class=" all-card-link influence-section-card-link cta-primary ">En savoir plus</a>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-influence-card', 'SHORTCODE_Influence_card');
