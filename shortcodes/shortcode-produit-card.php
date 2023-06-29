<?php
function SHORTCODE_produit_card()
{
    ob_start();
    $images_produit = get_field('images_produit');
    if ($images_produit) {
        $premiere_image = wp_get_attachment_image_src($images_produit[0]["image"], 'full')[0];
        $deuxieme_image = wp_get_attachment_image_src($images_produit[1]["image"], 'full')[0];
    }
    ?>

    <style>
        .produit-card-img {
            transition: opacity 0.3s ease-in-out;
        }
    </style>

    <div class="produit-card">
        <img class="produit-card-img produit-card-hover" src="<?= $premiere_image; ?>" alt="Image d'illustration"/>
        <div class="prduit-card-content">
            <h3 class="produit-card-title"><?= the_title(); ?></h3>
            <a href="<?php the_permalink(); ?>" class="all-card-link cta-primary">Voir le produit</a>
        </div>
    </div>

    <script>
        var produits = document.querySelectorAll('.produit-card');

        produits.forEach(function(produit) {
            var imgHover = produit.querySelector('.produit-card-hover');
            var imgSrc = imgHover.getAttribute('src');
            var imgHoverSrc = '<?= $deuxieme_image; ?>';

            imgHover.addEventListener('mouseover', function() {
                imgHover.style.opacity = 0;
                setTimeout(function() {
                    imgHover.setAttribute('src', imgHoverSrc);
                    imgHover.style.opacity = 1;
                }, 300);
            });

            imgHover.addEventListener('mouseout', function() {
                imgHover.style.opacity = 0;
                setTimeout(function() {
                    imgHover.setAttribute('src', imgSrc);
                    imgHover.style.opacity = 1;
                }, 300);
            });
        });
    </script>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-produit-card', 'SHORTCODE_produit_card');



?>