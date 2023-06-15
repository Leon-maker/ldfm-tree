<?php
function SHORTCODE_HistoireSection()
{
    ob_start();
    ?>

    <section class="padding-top-header" style="background-image: url('<?php echo $img_bkg; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
        <?php echo do_shortcode('[shortcode-fil_ariane type="white" title2="Boutique"]'); ?>
        <div class="text-center white">
            <h2>
                Notre histoire
            </h2>
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
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-histoire-section', 'SHORTCODE_HistoireSection');
