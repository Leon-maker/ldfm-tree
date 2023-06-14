<?php
function SHORTCODE_SectionHeader()
{
    ob_start();
    ?>

    <section class="margin-top-header little-lateral-margin">
        <?php echo do_shortcode('[shortcode-fil_ariane title2="Page inconnue"]'); ?>
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-header-section', 'SHORTCODE_SectionHeader');