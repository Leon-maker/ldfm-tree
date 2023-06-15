<?php
function SHORTCODE_contact()
{
    ob_start();
    ?>

    <section class="contact-section-container">

    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-contact', 'SHORTCODE_contact');