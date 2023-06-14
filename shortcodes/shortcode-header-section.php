<?php
function SHORTCODE_SectionHeader($arguments)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        "img-bkg" => "",
        "title" => "",
        "description" => "",
        "button1" => "",
        "button2" => "",
        "title3" => "",
        "link3" => "",
        "title4" => "",
        "link4" => "",
    ), $arguments );

    $img_bkg = $arguments_array['img-bkg']; // Récupération de la valeur de l'image
    $title = $arguments_array['title']; // Récupération de la valeur du titre
    $description = $arguments_array['description']; // Récupération de la valeur de la description
    $button1 = $arguments_array['button1']; // Récupération de la valeur du bouton
    $button2 = $arguments_array['button2']; // Récupération de la valeur du bouton

    ?>

    <section class="padding-top-header little-lateral-padding" style="background-image: url('<?php echo $img_bkg; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
        <?php echo do_shortcode('[shortcode-fil_ariane title2="Boutique"]'); ?>
        <div class="text-center white">
            <h1>
                <?php echo $title; ?>
            </h1>
            <h3>
                <?php echo $description; ?> 
            </h3>
            <div class="header-button">
                <a class="cta-third" href=""><?php echo $button1; ?></a>
                <a class="cta-third" href=""><?php echo $button2; ?></a>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-header-section', 'SHORTCODE_SectionHeader');
