<?php
/**
 * Template Name: Template Boutique Page
 */
$current_url = home_url(add_query_arg(array(),$wp->request));
$parsed_url = wp_parse_url($current_url);
$path = trim($parsed_url['path'], '/');
$segments = explode('/', $path);
$last_segment = end($segments);
$button1_page = "Catalogue indoor";
$button2_page = "Catalogue outdoor";
if ($last_segment === "boutique"){
    echo do_shortcode('[shortcode-header-section slug-section="' . $last_segment . '" button1="'. $button1_page .'" button2="'. $button2_page .'"]'); 

    $args = array(
        'post_type' => 'produit',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        // Récupérer toutes les catégories d'influences
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'parent' => 0, // Récupérer uniquement les catégories parentes        
        ));
    endif;
}
if ($last_segment === "boutique-indoor"){
    echo do_shortcode('[shortcode-header-section slug-section="' . $last_segment . '" button2="'. $button2_page .'"]'); 

    $args = array(
        'post_type' => 'produit',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'produits-interieur',
                'include_children' => false, // Ne pas inclure les produits des sous-catégories
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        // Récupérer toutes les catégories d'influences
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'parent' => 0, // Récupérer uniquement les catégories parentes        
        ));
    endif;
}
if ($last_segment === "boutique-outdoor"){
    echo do_shortcode('[shortcode-header-section slug-section="' . $last_segment . '" button1="'. $button1_page .'"]'); 

    $args = array(
        'post_type' => 'produit',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'produits-exterieur',
                'include_children' => false, // Ne pas inclure les produits des sous-catégories
            ),
        ),
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        // Récupérer toutes les catégories d'influences
        $categories = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'parent' => 0, // Récupérer uniquement les catégories parentes        
        ));
    endif;
}
?>
<div class="filter-container">
    <div class="bkg-opacity">
        <div class="tab-filters" id="id-filters">
            <div class="header-filtre">
                <h3>Filtrer par</h3>
                <i class="fa fa-times" aria-hidden="true" onclick="hideOverlay()"></i>
            </div>
            <div class="bkg-bottom-opacity">
                <div id="categories-section" class="tabs tri_afficher-container filter-inline tab button-group filter-button-group champs">
                    <?php
                    // Récupérer toutes les catégories
                    $categories = get_categories();

                    // Tableaux pour les catégories parentes et enfants
                    $parent_categories = array();
                    $child_categories = array();

                    // Organiser les catégories dans les tableaux correspondants
                    foreach ($categories as $category) {
                        if ($category->parent == 0) {
                            // Catégorie parente
                            $parent_categories[] = $category;
                        } else {
                            // Catégorie enfant
                            $child_categories[$category->parent][] = $category;
                        }
                    }

                    // Fonction de comparaison pour trier les catégories parentes par ordre alphabétique
                    function compareCategories($category1, $category2) {
                        return strcasecmp($category1->name, $category2->name);
                    }

                    // Trier les catégories parentes par ordre alphabétique
                    usort($parent_categories, 'compareCategories');

                    // Afficher les catégories parentes suivies de leurs catégories enfants
                    foreach ($parent_categories as $parent_category) {
                        if (sanitize_title($parent_category->name)!="non-classe"){
                            echo '<div class="category-div">';
                    
                            $parent_category_id = 'category-parent-' . sanitize_title($parent_category->name); // ID de la catégorie parente
                            $child_category_class = 'category-child-' . sanitize_title($parent_category->name); // Classe pour les catégories enfants du parent correspondant
                        
                            echo '<label class="category-label parent '.sanitize_title($parent_category->name).'" onclick="toggleCategory(\'' . $parent_category_id . '\', \'' . $child_category_class . '\')">';
                            echo '<span id="' . $parent_category_id . '" class="subtitle afficher-select tab tablinks filters-select parent-category">' . $parent_category->name . '</span>';
                            echo '<i id="toggle-icon-' . $parent_category_id . '" class="fa-solid fa-plus"></i>';
                            echo '</label>';

                            echo '<div class="category-div-child">';

                            if (isset($child_categories[$parent_category->term_id])) {
                                foreach ($child_categories[$parent_category->term_id] as $child_category) {
                                    $child_category_id = 'category-child-' . sanitize_title($child_category->name); // ID de la catégorie enfant
                                    echo '<label class="category-label child ' . $child_category_class . '">';
                                    echo '<input type="checkbox" class="category-checkbox"  data-category="' . $child_category->slug . '">';
                                    echo '<span id="' . $child_category_id . '" class="subtitle afficher-select tab tablinks filters-select" data-filter="' . '.' . $child_category->slug . '" data-sort-value="original-order">' . $child_category->name . '</span>';
                                    echo '</label>';
                                }
                            }
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="totalProduct">
                <button onclick=hideOverlay()>
                    <?php $count = $query->found_posts; ?>
                    Voir les resultats <span class="resultat">(<?php echo $count ?>)</span>
                </button>
            </div>
        </div>
    </div>
</div>


<section class="boutique-container lateral-margin no-margin-top">
    <div class="link-category-button">
        <div class="others-filters">
            <?php
            $categories = get_categories();

            // Filtrer les catégories parentes
            $categories_parentes = array_filter($categories, function($categorie) {
                return $categorie->parent == 0;
            });
            
            // Parcourir les catégories parentes et les afficher sous forme de boutons
            foreach ($categories_parentes as $categorie) {
                $lien_categorie = get_category_link($categorie->term_id); // Lien vers la catégorie correspondante
                $parsed_url_categorie = wp_parse_url($lien_categorie);
                $path_categorie = trim($parsed_url_categorie['path'], '/');
                $segments_categorie = explode('/', $path_categorie);
                $last_segment_categorie = end($segments_categorie);
                if (sanitize_title($categorie->name)!="non-classe"){
                    echo '<a class="category-button ' . sanitize_title($categorie->name) . '" onclick="showOverlay(this); event.stopPropagation();">' . $categorie->name . '</a>';   
                }
            } ?>
        </div>
        <div class="all-filters">
            <a class="category-button" onclick="showOverlay(); event.stopPropagation();">Tous les filtres</a>
        </div>
    </div>
    <div class="product-list blog-isotope">
        <?php if ($query->have_posts()) {
            $parent_slugs = array(); // Tableau pour stocker les slugs des grands-parents

            while ($query->have_posts()) {
                $query->the_post();
                $link = get_the_permalink();
            
                // Get Actualité custom fields
                $terms = get_the_terms(get_the_ID(), 'category');
            
                if (!empty($terms)) {
                    $category_classes = '';
            
                    foreach ($terms as $term) {
                        $ancestors = get_ancestors($term->term_id, 'category');
            
                        // Vérifier si la catégorie a des grands-parents
                        if (count($ancestors) > 1) {
                            $parent = get_term($ancestors[0], 'category');
                            $parent_slug = $parent->slug;
            
                            // Vérifier si le grand-parent est déjà ajouté
                            if (!in_array($parent_slug, $parent_slugs)) {
                                $category_classes .= $parent_slug . ' ';
                                $parent_slugs[] = $parent_slug; // Ajouter le slug du grand-parent au tableau
                            }
                        }
            
                        $category_classes .= $term->slug . ' ';
                    }
                }
                ?>
            
                <div class="card-item article-item-container blog-item" data-category="<?php echo $category_classes; ?>">
                    <?php echo do_shortcode('[shortcode-produit-card]'); ?>
                </div>
                <?php
            }                                                     
        } else {?>
            <h2>Aucun produit trouvé.</h2>
        <?php } ?>
    </div>
    <div class="isotope-pagination-container">
        <a href="#isotope-grid" type="button" class="isotope-pagination-item isotope-pagination-item-prev disabled">
            <img class="img-arrow left" src="/wp-content/uploads/2023/06/right-arrow.png">
        </a>
        <div class="isotope-pagination-item numbers-of-page-container">
        </div>
        <a href="#isotope-grid" type="button" class="isotope-pagination-item isotope-pagination-item-next">
            <img class="img-arrow right" src="/wp-content/uploads/2023/06/right-arrow.png">
        </a>
    </div>
</section>

<?php echo do_shortcode('[shortcode-marque-section]'); ?>

<?php echo do_shortcode('[shortcode-contact-section]'); ?>


<?php get_footer(); ?>

<script>
function hideOverlay() {
    var overlay = document.getElementsByClassName('bkg-opacity')[0];
    if (overlay) {
        overlay.style.display = 'none';
        closeAllParentCategories();
    }
}

function showOverlay(clickedElement) {
    var overlay = document.getElementsByClassName('bkg-opacity')[0];
    if (overlay) {
        overlay.style.display = 'block';
    }
    if(clickedElement){
        parent_category_id = 'category-parent-' + clickedElement.classList[1]; // ID de la catégorie parente
        child_category_class = 'category-child-' + clickedElement.classList[1]; // Classe pour les catégories enfants du parent correspondant             
        toggleCategory(parent_category_id, child_category_class);
    }
}
function closeAllParentCategories() {
    const parentCategories = document.querySelectorAll('.category-label.parent');
    parentCategories.forEach(function (parentCategory) {
        var toggleIcon = parentCategory.querySelector('i');
        var spanCategorie = parentCategory.querySelector('span');
        var childCategorie = parentCategory.nextElementSibling;
        if (spanCategorie.classList.contains('active')) {
            spanCategorie.classList.remove('active');
            toggleIcon.classList.replace('fa-minus', 'fa-plus');
            var childCategorie = parentCategory.nextElementSibling;
            if (childCategorie) {
            var childLabels = childCategorie.querySelectorAll('.child');
            childLabels.forEach(function (childLabel) {
                childLabel.style.display = 'none';
            });
            }
        }
    });
}

window.addEventListener('click', function(e) {
    var filtersContainer = document.getElementById('id-filters');

    // Vérifier si l'élément cliqué est contenu dans l'élément avec l'ID "id-filters"
    if (filtersContainer && !filtersContainer.contains(e.target)) {
        // Cliqué en dehors de l'élément
        var overlay = document.getElementsByClassName('bkg-opacity')[0];
        var computedStyle = window.getComputedStyle(overlay);

        setTimeout(function() {
            var displayValue = computedStyle.getPropertyValue('display');
            console.log(displayValue);
            if (displayValue && displayValue === 'block') {
                hideOverlay();
            }
        }, 0);
    }
});

function toggleCategory(parentId, childClass) {
    console.log(parentId);
    console.log(childClass);
    var parentLabel = document.getElementById(parentId);
    var childLabels = document.querySelectorAll('.' + childClass);
    var toggleIcon = document.getElementById('toggle-icon-' + parentId);

    if (parentLabel.classList.contains('active')) {
        parentLabel.classList.remove('active');
        childLabels.forEach(function (childLabel) {
            childLabel.style.display = 'none';
        });
        toggleIcon.classList.replace('fa-minus', 'fa-plus');
    } else {
        parentLabel.classList.add('active');
        childLabels.forEach(function (childLabel) {
            childLabel.style.display = 'block';
        });
        toggleIcon.classList.replace('fa-plus', 'fa-minus');
    }
}

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var produitCardImages = document.querySelectorAll('.produit-card-img.produit-card-hover');

        produitCardImages.forEach(function(img) {
            var hoverImage = img.dataset.hoverImage;
            var originalImage = img.getAttribute('src');

            if (hoverImage) {
                img.addEventListener('mouseenter', function() {
                    img.style.opacity = 0; // Réduire l'opacité à 0

                    // Attendre un court délai pour permettre la transition
                    setTimeout(function() {
                        img.src = hoverImage;
                        img.style.opacity = 1; // Rétablir l'opacité à 1
                    }, 200);
                });

                img.addEventListener('mouseleave', function() {
                    img.style.opacity = 0; // Réduire l'opacité à 0

                    // Attendre un court délai pour permettre la transition
                    setTimeout(function() {
                        img.src = originalImage;
                        img.style.opacity = 1; // Rétablir l'opacité à 1
                    }, 200);
                });
            }
        });
    });
</script>

