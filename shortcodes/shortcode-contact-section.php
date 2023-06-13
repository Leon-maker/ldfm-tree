<?php
function SHORTCODE_contact_section()
{
    ob_start();
    ?>

    <section class="contact-section-container">
       <div class="contact-section-header-title">
            <p>Contact</p>
            <h2>Nous contacter</h2>
       </div>
       <div class="contact-section-card-wrapper">
            <div class="contact-section-card showroom-card">

            </div>
            <div class="contact-section-card bureau-etude-card">
                
            </div>
       </div>
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-contact-section', 'SHORTCODE_contact_section');
