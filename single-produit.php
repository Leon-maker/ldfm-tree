<?php

/**
 * Template Name: Single Produit
 * Template Post Type: produit
 */

get_header();

$title_page = get_the_title();
$marque = get_field('marque');

$reference = get_field('reference'); 
$caracteristiques = get_field('caracteristiques');
$dimensions = $caracteristiques['dimensions'];
$utilisation_exterieur = $caracteristiques['utilisation_exterieur'];
$filtre = $caracteristiques['filtre'];
$description = get_field('description'); 
$images_produit = get_field('images_produit'); 
$produits_similaires = get_field('produits_similaires'); 

$product_id = get_the_ID(); // ID du produit

// Récupérer les catégories du produit
$categories = wp_get_post_terms($product_id, 'category');

// Afficher les catégories et leur parent dans une div
if (!empty($categories)) {
        
    foreach ($categories as $category) {
        $category_id = $category->term_id;
        $category_name = $category->name;

        // Récupérer les informations du parent de la catégorie
        $parent_category = get_term($category->parent, 'category');
        $parent_category_name = ($parent_category && !is_wp_error($parent_category)) ? $parent_category->name : '';

        if (!empty($parent_category_name)) {
            
            // Vérifier si la catégorie parent est égale à "Matière"
            if ($parent_category_name === 'Matière') {
                // Ajouter l'élément correspondant dans le tableau
                $materiaireElements[] = $category_name;
            }
            
            // Vérifier si l'élément parent a lui-même un élément parent
            if ($parent_category && !is_wp_error($parent_category)) {
                $grandparent_category = get_term($parent_category->parent, 'category');
                $grandparent_category_name = ($grandparent_category && !is_wp_error($grandparent_category)) ? $grandparent_category->name : '';
                
                if (!empty($grandparent_category_name)) {                    
                    // Vérifier si le grand-parent est égal à "Catégories"
                    if ($grandparent_category_name === 'Catégories') {
                        // Ajouter l'élément correspondant dans le tableau
                        $categoriesParent = $parent_category_name;
                        $categoriesElements = $category_name;
                    }
                }
            }
        }
    }
}

?>
<div class="product">
    <?php if (isMobile()){
        echo do_shortcode('[shortcode-fil-ariane type="black"]'); 
    }?>
    <div class="right-container">
        <div class="container-gallery-top">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($images_produit as $img) {
                        ?>
                        <img class="swiper-slide img-container product-image cover" src="<?php echo wp_get_attachment_image_src($img['image'], 'full')[0]; ?>" alt="Image illustrative du produit" style="width: 100%;"/>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="container-gallery-thumbs">
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($images_produit as $img) {
                        ?>
                        <img class="swiper-slide img-container product-image cover" src="<?php echo wp_get_attachment_image_src($img['image'], 'full')[0]; ?>" alt="Image illustrative du produit &quot;<?php echo $title; ?>&quot;" style="width: 100%;"/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="left-container">
        <?php if (!isMobile()){
            echo do_shortcode('[shortcode-fil-ariane type="black"]'); 
        }?>
        <div class="info">
            <h1><?php
                echo $title_page;?>
            </h1>
            <?php if (!empty($marque)) { ?>
                <p class="marque"><span>Marque: </span><span class="value"><?= $marque[0]->post_title ?></span></p>
            <?php } if (!empty($reference)) {?>
            <p class="ref"><span>Référence: </span><span class="value"><?= $reference ?></span></p>
            <?php } ?>
            <p class="description"><?php
                echo $description;?>
            </p>
            <p class="plus">
                Pour connaitre toutes les finitions possibles et les détails sur ce produit, contactez notre équipe !
            </p>
            <?php if (!empty($caracteristiques)){?>
            <div class="caracteristiques">
                <h3>
                    Caractéristiques techniques
                </h3>
                <ul class="infos-container list-in-rows-border">
                    <?php if (!empty($dimensions)){?>
                        <li class="infos">
                        <p class="label">
                            Dimensions
                        </p>
                        <p class="value boldy">
                            <?php
                            foreach ($dimensions as $dim) { 
                                echo $dim['dimension']; ?>
                                <br>
                                <?php
                            }?>
                        </p>
                        </li>
                    <?php }?>
                    <?php if (!empty($materiaireElements)) { ?>
                        <li class="infos">
                        <p class="label">
                            Matière
                        </p>
                        <p class="value boldy">
                            <?php echo implode(', ', $materiaireElements); ?>
                        </p>
                    </li>
                    <?php }?>
                    <?php if (!empty($categoriesElements)) { ?>
                        <li class="infos">
                            <p class="label">
                                Type de <?php echo $categoriesParent; ?>
                            </p>
                            <p class="value boldy">
                                <?php echo $categoriesElements; ?>
                            </p>
                        </li>
                    <?php } ?>
                    <li class="infos">
                    <p class="label">
                        Utilisation extérieure
                    </p>
                    <p class="value boldy capital">
                        <?php echo $utilisation_exterieur; ?>
                    </p>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<?php
foreach($produits_similaires as $produit) {
    //echo $produit;
}

echo do_shortcode('[shortcode-produit-realisation-section produit="fiche"]');



echo do_shortcode('[shortcode-contact-section]'); 

?>


<?php
get_footer();
?>
<?php if (!isMobile()){
    $slide = 4.3; 
} else {
    $slide = 3.4; 
}?>


<script type="module">
            
    import Swiper from 'https://unpkg.com/swiper@8/swiper-bundle.esm.browser.min.js'

    jQuery(function () {
        var galleryThumbs = new Swiper(".gallery-thumbs", {
            centeredSlides: true,
            centeredSlidesBounds: true, 
            direction: "horizontal",
            spaceBetween: 5,
            slidesPerView: <?= $slide ?>,
            freeMode: false,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            watchOverflow: true,

        });
        var galleryTop = new Swiper(".gallery-top", {
            direction: "horizontal",
            spaceBetween: 0,
            thumbs: {
                swiper: galleryThumbs
            },
            slidesPerView: 0.99,
        });

        // Make the next and previous buttons change the active slide and not the pagination
        galleryTop.on("slideChangeTransitionStart", function () {
            galleryThumbs.slideTo(galleryTop.activeIndex);
        });
    });
    
</script>