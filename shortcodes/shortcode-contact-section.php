<?php
function SHORTCODE_contact_section()
{
    ob_start();
    $img_showroom = wp_get_attachment_image_src(21538, 'full')[0];
    $img_bureau_etudes = wp_get_attachment_image_src(21548, 'full')[0];
    ?>
    <div class="fade-section">
    <section class="contact-section-container">
       <div class="contact-section-header-title uppercase">
            <p>Contact</p>
            <h2>Nous contacter</h2>
       </div>
       <div class="contact-section-card-wrapper">
            <div class="contact-section-card showroom-card">
                <div class="contact-section-card-img-container">
                    <img class="contact-section-card-img" src="<?= $img_showroom ?>" alt="Image d'illustration Showroom"/>
                </div>
                <div class="contact-section-card-content">
                    <h3 class="contact-section-card-title">Prendre rendez-vous au showroom</h3>
                    <p class="contact-section-card-paragraphe">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                    <a href="/rdv-showroom" class="contact-section-card-link cta-primary ">Prendre rendez-vous</a>
                </div>
            </div>
            <div class="contact-section-card bureau-etude-card">
                <div class="contact-section-card-img-container">
                    <img class="contact-section-card-img" src=" <?= $img_bureau_etudes ?>" alt="Image d'illustration Showroom"/>
                </div>
                <div class="contact-section-card-content">
                    <h3 class="contact-section-card-title">Prendre rendez-vous au bureau d'études</h3>
                    <p class="contact-section-card-paragraphe">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore.</p>
                    <a href="/rdv-bureau-detudes" class="contact-section-card-link cta-primary ">Prendre rendez-vous</a>
                </div>
            </div>
       </div>
    </section>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-contact-section', 'SHORTCODE_contact_section');
