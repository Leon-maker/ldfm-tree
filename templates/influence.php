<?php
/**
 * Template Name: Template Influence Page
 */
?>

<?php get_header(); ?>

<?php 
$slug = "nos-influences";
echo do_shortcode('[shortcode-header-section slug-section="'. $slug .'"]'); 
?>
<?php
    $args = array(
        'post_type' => 'influence',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        // Récupérer toutes les catégories d'influences
        $influence_categories = get_terms(array(
            'taxonomy' => 'influence-categorie',
            'hide_empty' => false,
        ));
    endif;
?>

<section class="blog-container lateral-margin no-margin-top">
    <div class="heading-wrapper">
        <section class="tab-filters" id="id-filters">
            <div class="menu desktop-only ">
                <div class="tabs tri_afficher-container filter-inline tab button-group filter-button-group champs">
                    <button id="all-posts" class="subtitle afficher-select tab tablinks filters-select active" data-filter="*" data-sort-value="original-order">Tout voir</button>
                    <?php
                        foreach ($influence_categories as $category) { ?>
                            <button class="subtitle afficher-select tab tablinks filters-select" data-filter="<?php echo '.' . $category->slug; ?>" data-sort-value="original-order"><?php echo $category->name; ?></button>
                    <?php 
                    } ?>
                </div>
            </div>
            <div class="mobile-menu mobile-only">
                <div id="filter-select" class="tab button-group sort-by-button-group container-button-filter">
                    <select id="filters-list" class="filters-select uppercase subtitle" value="Tout">
                        <option value="*" data-sort-value="original-order">Tout voir</option>
                        <?php
                        foreach ($influence_categories as $category) { ?>
                            <option class="uppercase subtitle afficher-select tab tablinks filters-select" value="<?php echo '.' . $category->slug; ?>" data-sort-value="original-order"><?php echo $category->name; ?></option>
                        <?php 
                        } ?>
                    </select>
                </div>
            </div>
        </section>
    </div>
    <div class="columns-wrapper">
        <div class="main-container">
            <div class="wrapper-container blog-isotope">
                <?php if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $link = get_the_permalink();

                        // Get Actualité custom fields
                        $terms = get_the_terms(get_the_ID(), 'influence-categorie'); ?>
                        <div class="card-item article-item-container isotope-item blog-item <?php echo $terms[0]->slug; ?>">
                            <?php echo do_shortcode('[shortcode-influence-card influence-class="influence-category-' . $terms[0]->term_id . '"]');?>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
                ?>

            </div>
        </div>
    </div>
</section>


<?php echo do_shortcode('[shortcode-contact-section]'); ?>


<?php get_footer(); ?>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<script>
// Version desktop
const desktopButtons = document.querySelectorAll('.desktop-only .tablinks');
desktopButtons.forEach(button => {
  button.addEventListener('click', function() {
    const mobileSelect = document.querySelector('.mobile-only #filters-list');
    const selectedValue = this.getAttribute('data-filter');
    mobileSelect.value = selectedValue;
  });
});

// Version mobile
const mobileSelect = document.querySelector('.mobile-only #filters-list');
mobileSelect.addEventListener('change', function() {
  const desktopButton = document.querySelector('.desktop-only .tablinks[data-filter="' + this.value + '"]');
  desktopButton.click();
});

document.addEventListener('DOMContentLoaded', function() {
  // Sélectionner tous les liens <a> à l'intérieur de la pagination
  var paginationLinks = document.querySelectorAll('.isotope-pagination-container a');

    var urlParams = new URLSearchParams(window.location.search);
    var filter = urlParams.get('filter');
    if (filter) {
        // Trouver le bouton de filtre correspondant
        var filterButton = document.querySelector('.filters-select[data-filter=".' + filter + '"]');

        if (filterButton) {
        // Simuler le clic sur le bouton de filtre
            setTimeout(function() {
                filterButton.click();

            }, 200);
        }
    }
});


</script>



