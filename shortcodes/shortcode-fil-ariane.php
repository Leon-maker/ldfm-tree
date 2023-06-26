<?php

function SHORTCODE_fil_ariane($args)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        "type" => "white",
    ), $args );

    $arrow_svg = wp_get_attachment_image_src(21228, 'full')[0];
    $white_class = "";
    if ($arguments_array['type'] === "white") $white_class = "whited-filariane";

    $url = get_permalink();
    $segments = explode('/', trim(parse_url($url, PHP_URL_PATH), '/'));

    // Supprimer le premier segment "Accueil"
    if (isset($segments[0]) && $segments[0] === "Accueil") {
        array_shift($segments);
    }

    ?>
    <div class="breadcrumb-container">
        <nav class="fil-ariane-wrapper <?= $white_class ?>">
            <ul class="fil-ariane-container list-in-row">
                <li class="fil-ariane-item">
                    <a href="<?= home_url() ?>" class="fil-ariane-link">
                        Accueil
                    </a>
                    <p class="dot-filariane"></p>
                </li>
                <?php
                $current_url = home_url();
                $segment_count = count($segments);
                foreach ($segments as $key => $segment) {
                    $current_url .= '/' . $segment;
                    ?>
                    <li class="fil-ariane-item">
                        <a href="<?= $current_url ?>" class="fil-ariane-link">
                            <?= ucfirst(str_replace('-', ' ', $segment)) ?>
                        </a>
                        <?php if ($key !== $segment_count - 1) { ?>
                            <p class="dot-filariane"></p>
                        <?php } ?>
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
