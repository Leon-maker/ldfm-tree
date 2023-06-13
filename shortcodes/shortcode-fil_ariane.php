<?php
function SHORTCODE_FilAriane($arguments)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        "type" => "black",
        "title1" => "Accueil",
        "link1" => "/",
        "title2" => "",
        "link2" => "",
        "title3" => "",
        "link3" => "",
        "title4" => "",
        "link4" => "",
    ), $arguments );

    $arrow_svg = wp_get_attachment_image_src(21228, 'full')[0];
    $white_class="  ";
    if($arguments_array['type'] === "white")$white_class="whited-filariane";
    ?>

    <nav class="fil-ariane-wrapper <?= $white_class ?>">
        <ul class="fil-ariane-container list-in-row">
            <?php
            $nb_filled_arguments = 0;

            // On compte le nombre d'arguments remplis
            for ($i = 1; $i <= count($arguments_array) / 2; $i++) {
                $title = $arguments_array['title' . $i];
                $link = $arguments_array['link' . $i];

                if ($title !== "") {
                    $nb_filled_arguments++;
                }
            }

            for ($i = 1; $i <= count($arguments_array) / 2; $i++) {
                $title = $arguments_array['title' . $i];
                $link = $arguments_array['link' . $i];

                if ($title !== "") {
                    ?>
                    <li class="fil-ariane-item">
                        <a href="<?php echo $link; ?>" class="fil-ariane-link uppercase">
                            <?php echo $title; ?>
                        </a>
                        <?php
                        // Si ce n'est pas le dernier élément du fil d'ariane, on affiche la flèche
                        if ($i !== $nb_filled_arguments) {
                            ?>
                            <p class="dot-filariane"></p>
                            <?php
                        }
                        ?>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </nav>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-fil_ariane', 'SHORTCODE_FilAriane');
