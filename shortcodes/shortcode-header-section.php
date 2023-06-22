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
        "title1" => "",
        "link1" => "",
        "title2" => "",
        "link2" => "",
        "title3" => "",
        "link3" => "",
    ), $arguments );

    $img_bkg = $arguments_array['img-bkg']; // Récupération de la valeur de l'image
    $title = $arguments_array['title']; // Récupération de la valeur du titre
    $description = $arguments_array['description']; // Récupération de la valeur de la description
    $button1 = $arguments_array['button1']; // Récupération de la valeur du bouton
    $button2 = $arguments_array['button2']; // Récupération de la valeur du bouton

    // Nouvel argument pour stocker les valeurs de arianeTitle1, link1, arianeTitle2, link2, arianeTitle3 et link3
    $fil_ariane_arguments = array(
        'title2' => $arguments_array['title1'],
        'link2' => $arguments_array['link1'],
        'title3' => $arguments_array['title2'],
        'link3' => $arguments_array['link2'],
        'title4' => $arguments_array['title3'],
        'link4' => $arguments_array['link3']
    );
        get_header();
    ?>

    <section class="padding-top-header-section" style="background-image: url('<?php echo $img_bkg; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
        <div class="bkg-filter">
            <?php echo do_shortcode('[shortcode-fil-ariane type="white" ' . implode(' ', array_map(function ($key, $value) {
                return $key . '="' . $value . '"';
            }, array_keys($fil_ariane_arguments), $fil_ariane_arguments)) . ']');  ?>    
            <div class="text-center white">
                <h1 class="uppercase">
                    <?php echo $title; ?>
                </h1>
                <?php if (!empty($description)) { ?>
                    <h3>
                        <?php echo $description; ?> 
                    </h3>
                <?php } ?>
                <div class="header-button">
                    <?php if (!empty($button1)) { ?>
                        <a class="cta-third" href=""><?php echo $button1; ?></a>
                    <?php } ?>
                    <?php if (!empty($button2)) { ?>
                        <a class="cta-third" href=""><?php echo $button2; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>   
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-header-section', 'SHORTCODE_SectionHeader');
