<?php

$img_ghost1 = wp_get_attachment_image_src(21256, 'full')[0];
$img_ghost2 = wp_get_attachment_image_src(21257, 'full')[0];

$header_section_slug = 'blog';
$args = array(
  'post_type'   => 'sections',
  'name'        => $header_section_slug,
  'post_status' => 'publish',
  'numberposts' => 1
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $title = get_the_title();
    $section_id = get_the_ID();
    if (has_post_thumbnail()) {
        $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
        $thumbnail_url = $thumbnail_data[0]; 
    }
    $edit_header = get_field('edit_header');
    $edit_header_group= $edit_header['edit_header'];
    $header_color= $edit_header_group['couleur'];
    $header_choice= $edit_header_group['image'];
    if ($header_choice=="illustration") {
        $img_ghost1 = $edit_header_group['illustration_gauche'];
        $img_ghost2 = $edit_header_group['illustration_droite'];
    }
    if ($header_choice=="photo") {
        $img_header = $edit_header_group['option_photo'];
    }
}

?>

<section class="catalogue-header section-third-bkg no-margin-top no-margin-bottom">
    <?php if($header_choice=="illustration"){ ?>
        <section class="bkg-wrapper breadcrumb-container" style="background-color: <?php echo($header_color)?>">
        <?php echo do_shortcode('[shortcode-fil-ariane title2="Blog"]'); ?>
        </section>
        <div class="columns-wrapper bkg-wrapper" style="background-color: <?php echo($header_color)?>">
            <div class="bkg-container left-container" style="background-image: url('<?php echo $img_ghost1; ?>');" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;"></div>
            <div class="content-container">
                <h1 class="main-title text-center">
                    LES ACTUALITÉS
                </h1>
                <p class="description text-center">
                    Reste informé de toutes nos actualités.
                </p>
            </div>
            <div class="bkg-container right-container"style="background-image: url('<?php echo $img_ghost2; ?>');" role="img" aria-label="Image d'illustration 2 de la première section de la page." class="illustration illu2" style="width: 100%;"></div>
        </div>
        <?php
    } else if($header_choice=="photo"){ ?>
        <section class="bkg-image" style="background-image: url('<?php echo $img_header; ?>');  background-size: cover; background-position: center; background-repeat: no-repeat;" role="img" aria-label="Image d'illustration 1 de la première section de la page." class="illustration illu1" style="width: 100%;">
            <section class="bkg-wrapper breadcrumb-container">
            <?php echo do_shortcode('[shortcode-fil-ariane title2="Blog"]'); ?>
            </section>
            <div class="columns-wrapper bkg-wrapper">
                <div class="content-container">
                    <h1 class="main-title text-center">
                    LES ACTUALITÉS
                    </h1>
                    <p class="description text-center">
                    Reste informé de toutes nos actualités.
                   </p>
                </div>
            </div>
        </section>
        <?php
    } ?>
</section>