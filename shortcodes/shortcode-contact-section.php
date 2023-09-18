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
        <?php
            $args = array(
                'post_parent' => '21249',
                'post_type' => 'page',
                'orderby' => 'menu_order'
            );

            $index = 1;
            $child_query = new WP_Query( $args );
            ?>

            <?php while ( $child_query->have_posts() ) : $child_query->the_post(); 
                $title          = get_field('carte_contact_titre');
                $description    = get_field('carte_contact_description');
                $image          = get_field('carte_contact_image');
                ?>

                <div class="contact-section-card card-<?= $index ?>">
                    <div class="contact-section-card-img-container">
                        <img class="contact-section-card-img" src="<?= $image ?>" alt="Image d'illustration Showroom"/>
                    </div>
                    <div class="contact-section-card-content">
                        <h3 class="contact-section-card-title"><?= $title ?></h3>
                        <p class="contact-section-card-paragraphe"><?= $description ?></p>
                        <a href="<?= the_permalink() ?>" class="contact-section-card-link cta-primary ">Prendre rendez-vous</a>
                    </div>
                </div>

            <?php 
            $index++;
            endwhile; ?>

        <?php
        wp_reset_postdata();?>
        </div>

    </section>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-contact-section', 'SHORTCODE_contact_section');
