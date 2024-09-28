<?php
/**
 * Template Name: Template Famille Page
 */

echo do_shortcode('[shortcode-home-section]'); 

// Paramètres de requête pour récupérer les publications du type de publication personnalisée "gt-tree"
$args = array(
    'post_type' => 'gt-tree',
    'posts_per_page' => -1, // Récupérer tous les éléments
);

// Requête WP_Query pour récupérer les publications du type de publication personnalisée "gt-tree"
$query = new WP_Query( $args );

// Tableau pour stocker les publications triées par lettre initiale du titre
$sorted_posts = array();

// Vérifier si des publications ont été trouvées
if ( $query->have_posts() ) {
    // Boucle sur les publications et les trier par lettre initiale du titre
    while ( $query->have_posts() ) {
        $query->the_post();
        $id = get_the_ID();
        $title = get_the_title();
        // Supprimer le texte "Family Tree -" avant chaque nom// Vérifier si le titre contient "Family Tree"
        $title = str_replace('Family Tree &#8211; ', '', "$title");
        $letter = strtoupper( substr( $title, 0, 1 ) ); // Récupérer la première lettre du titre et la convertir en majuscule
        $sorted_posts[ $letter ][] = array(
            'id' => $id,
            'title' => $title
        );
    }    
    // Réinitialiser les données de publication
    wp_reset_postdata();
    
    // Trier les publications par lettre initiale du titre
    ksort( $sorted_posts );
    
    // Afficher les publications triées par lettre initiale du titre
    ?>
    <div class="family">
    <?php
    foreach ( $sorted_posts as $letter => $posts ) {
        ?>
        <h2><?php echo $letter; ?></h2>
        <?php
        // Trier les publications par titre (ordre alphabétique)
        usort($posts, function($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        
        // Afficher les publications triées par titre
        foreach ($posts as $post) {
            ?>
            <a href="<?php echo esc_url(home_url('/detail-famille/?id=' . $post['id'])); ?>"><?php echo $post['title']; ?></a>
            <?php
        }
    }
    ?>
    </div>
    <?php
} else {
    // Si aucune publication n'a été trouvée
    echo '<p>Aucune publication trouvée pour le type de publication personnalisée "gt-tree".</p>';
}
