<?php
function SHORTCODE_HistoireSection()
{
    ob_start();

    $img_bkg = wp_get_attachment_image_src(21496, 'full')[0];

    ?>
    <div class="fade-section">

    <section class="padding-histoire" style="background-image: url('<?php echo $img_bkg; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
        <div class="text-center white">
            <h2 class="uppercase">
                Notre histoire
            </h2>
            <h3>
                Le mariage de deux univers.
            </h3>
            <div class="header-button boldy">
                <a class="cta-secondary white" href="/lagence">En savoir plus</a>
            </div>
        </div>
    </section>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-histoire-section', 'SHORTCODE_HistoireSection');
