<?php
function SHORTCODE_fil_ariane($args)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        "type" => "white"
    ), $args );

    $arrow_svg = wp_get_attachment_image_src(21228, 'full')[0];
    $white_class = "";
    if ($arguments_array['type'] === "white") $white_class = "whited-filariane";

    $breadcrumb_items = array();

    // Ajouter l'accueil en tant que premier élément
    $breadcrumb_items[] = array(
        'title' => 'Accueil',
        'link' => home_url('/')
    );

    // Récupérer les ancêtres de la page actuelle
    $ancestors = get_post_ancestors(get_the_ID());
    $ancestors = array_reverse($ancestors);

    // Ajouter les éléments de l'arborescence des ancêtres
    foreach ($ancestors as $ancestor) {
        $breadcrumb_items[] = array(
            'title' => get_the_title($ancestor),
            'link' => get_permalink($ancestor)
        );
    }

    // Ajouter la page actuelle en tant que dernier élément
    $breadcrumb_items[] = array(
        'title' => get_the_title(),
        'link' => get_permalink()
    );

    ?>
    <div class="breadcrumb-containe">
        <nav class="fil-ariane-wrapper <?= $white_class ?>">
            <ul class="fil-ariane-container list-in-row">
                <?php
                echo get_permalink();
                foreach ($breadcrumb_items as $index => $item) {
                    ?>
                    <li class="fil-ariane-item">
                        <a href="<?php echo $item['link']; ?>" class="fil-ariane-link">
                            <?php echo $item['title']; ?>
                        </a>
                        <?php
                        // Si ce n'est pas le dernier élément du fil d'ariane, on affiche la flèche
                        if ($index !== count($breadcrumb_items) - 1) {
                            ?>
                            <p class="dot-filariane"></p>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-fil-ariane', 'SHORTCODE_fil_ariane');

