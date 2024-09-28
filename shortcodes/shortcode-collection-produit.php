<?php
function SHORTCODE_collection_produit()
{

    ob_start();
    ?>
    <section class="collection-produit">
        <h2 class="uppercase">Nos Collections</h2>
        <img class="img-bg first" src="<?php echo wp_get_attachment_image_src(5, 'full')[0]; ?>" alt="Image de couverture de la page <?php echo get_the_title(); ?>" />
        <img class="img-bg second" src="<?php echo wp_get_attachment_image_src(5, 'full')[0]; ?>" alt="Image de couverture de la page <?php echo get_the_title(); ?>" />
        <div class="product-categories">
            <?php
            // Récupérer les catégories de produits
            $categories = get_terms(array(
                'taxonomy' => 'product_cat', // Taxonomie des catégories de produits WooCommerce
                'hide_empty' => false, // Afficher même si elles sont vides
            ));

            // Afficher les catégories avec miniatures
            foreach ($categories as $category) {
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image = wp_get_attachment_image_src($thumbnail_id, 'full')[0];

                ?>
                <div class="product-category">
                    <a href="<?php echo get_term_link($category); ?>">
                        <?php if ($image) : ?>
                            <img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>" />
                        <?php endif; ?>
                        <span class="category-name uppercase"><?php echo $category->name; ?></span>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-collection-produit', 'SHORTCODE_collection_produit');

