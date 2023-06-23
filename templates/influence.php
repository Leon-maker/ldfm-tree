<?php
/**
 * Template Name: Template Influence Page
 */
?>

<?php get_header(); ?>

<?php 
$img_bkg = wp_get_attachment_image_src(21556, 'full')[0];
$title_page = 'Nos Influences';
$description_page = "Lorem ipsum dolor sit amet.";
$alternate = false; 
echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" description="'. $description_page .'" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

?>

<section class="section-archive-all-influences">
    <?php
    $args = array(
        'post_type' => 'influence',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
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
        ?>
        <section class="influence-categories-section">
            <?php if (isMobile()) : ?>
                <select id="influence-categories-select">
                    <option value="all">Tout voir</option>
                    <?php foreach ($influence_categories as $category) : ?>
                        <option class="influence-category-filter" value="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <ul id="influence-categories-list">
                    <li class="influence-category-filter all-influences active" data-category-id="all">Tout voir</li>
                    <?php foreach ($influence_categories as $category) : ?>
                        <li class="influence-category-filter" data-category-id="<?php echo $category->term_id; ?>"><?php echo $category->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
        <div id="influence-container"></div>
        <section class="cpt-section-container influence-section-container">
            <div class="cpt-section-card-wrapper">
                <?php 
                while ($query->have_posts()) : $query->the_post(); 
                    echo do_shortcode('[shortcode-influence-card influence-class="influence-category-' . $terms[0]->term_id . '"]');
                endwhile; ?>
            </div>
        </section>
        <div class="pagination">
            <?php if (get_previous_posts_link()) : ?>
                <a class="pagination-link prev" href="<?php echo previous_posts(false); ?>"><i class="fas fa-chevron-left"></i></a>
            <?php else : ?>
                <span class="pagination-link prev disabled"><i class="fas fa-chevron-left"></i></span>
            <?php endif; ?>

            <span class="pagination-pages">
                <?php
                $current_page = max(1, get_query_var('paged'));
                $total_pages = $query->max_num_pages;

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<a class="pagination-page' . ($i == $current_page ? ' active' : '') . '" href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a>';
                }
                ?>
            </span>

            <?php if ($current_page < $total_pages) : ?>
                <a class="pagination-link next" href="<?php echo next_posts($query->max_num_pages, false); ?>"><i class="fas fa-chevron-right"></i></a>
            <?php else : ?>
                <span class="pagination-link next disabled"><i class="fas fa-chevron-right"></i></span>
            <?php endif; ?>
        </div>


    <?php endif; ?>
</section>


<?php echo do_shortcode('[shortcode-contact-section]'); ?>


<?php get_footer(); ?>

<script>
jQuery(function($) {
    $('.influence-category-filter').click(function() {
        var categoryID = $(this).data('category-id');

        if (typeof categoryID !== 'undefined') {
            if (categoryID === 'all') {
                // Afficher toutes les influences
                $('.influence').show();
            } else {
                // Masquer toutes les influences
                $('.influence').hide();

                // Afficher les influences de la catégorie sélectionnée
                $('.influence-category-' + categoryID).show();
            }

            // Appliquer la classe "active" à l'élément sélectionné
            $('.influence-category-filter').removeClass('active');
            $(this).addClass('active');
        }
    });

    $('#influence-categories-select').change(function() {
        var categoryID = $(this).val();

        if (typeof categoryID !== 'undefined') {
            if (categoryID === 'all') {
                // Afficher toutes les influences
                $('.influence').show();
            } else {
                // Masquer toutes les influences
                $('.influence').hide();

                // Afficher les influences de la catégorie sélectionnée
                $('.influence-category-' + categoryID).show();
            }

            // Appliquer la classe "active" à l'élément sélectionné
            $('.influence-category-filter').removeClass('active');
            $('.influence-category-filter[data-category-id="' + categoryID + '"]').addClass('active');
        }
    });
});

</script>

