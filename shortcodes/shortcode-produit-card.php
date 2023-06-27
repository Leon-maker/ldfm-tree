<?php
function SHORTCODE_produit_card()
{
    ob_start();
    $images_produit = get_field('images_produit');
    if ($images_produit) $premiere_image = wp_get_attachment_image_src($images_produit[0]["image"], 'full')[0];
    ?>

    <div class="produit-card">
        <img class="produit-card-img" src="<?= $premiere_image;  ?>" alt="Image d'illustration "/>
        <div class="prduit-card-content">
            <h3 class="produit-card-title"><?= the_title(); ?></h3>
            <a href="<?php the_permalink(); ?>" class="all-card-link cta-primary">Voir le produit</a>
        </div>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-produit-card', 'SHORTCODE_produit_card');



?>