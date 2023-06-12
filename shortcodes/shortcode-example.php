<?php
// Shortcode d'exemple. Lors de la création d'un shortcode, il faut créer un fichier dans le dossier shortcodes, et ajouter le chemin du fichier dans le fichier config/shortcode-manager.php
function SHORTCODE_Example($arguments)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        'example_argument' => "Donnez une valeur par défaut à l'argument, si aucun n'est fourni. S'il n'y a pas besoin d'avoir une valeur par défaut, laisser le string vide.",
    ), $arguments );

    ?>

    <div class="shortcode-example">
        <p>Voici un exemple de shortcode.</p>
        <p>Voici la valeur de l'argument "example_argument": <?php echo $arguments_array['example_argument']; ?></p>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-example', 'EXAMPLE_Shortcode');
