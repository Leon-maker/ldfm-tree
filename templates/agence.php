<?php
/**
 * Template Name: Template Agence Page
 */
$title_page = get_the_title(); ?> 

<?php 
$slug = "lagence";
echo do_shortcode('[shortcode-header-section slug-section="'. $slug .'"]'); 

$args = array(
    'post_type'   => 'page',
    'name'        => $slug,
    'post_status' => 'publish',
    'numberposts' => 1
    );
$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $description1 = get_field('description_1');
    $description2 = get_field('description_2');
}
?>
<div class="agence-main-section">
    <div class="agence-description-container">
        <div class="agence-side-description-container">
            <?php echo $description1 ?>
        </div>
        <div class="agence-side-description-container">
            <?php echo $description2 ?>
        </div>
    </div>
</div>
<?php
$showroom_slug = "rdv-showroom";
$args = array(
    'post_type'   => 'page',
    'name'        => $showroom_slug,
    'post_status' => 'publish',
    'numberposts' => 1
    );
$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $info_pratique_showroom = get_field('carte_contact');
    $title_showroom = $info_pratique_showroom['titre'];
    $description_showroom = $info_pratique_showroom['description'];
    $image_showroom = $info_pratique_showroom['image'];
}
?>

<?php
$button_title="Prendre-rendez-vous";
$link="/rdv-showroom";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_showroom.'" title="'.$title_showroom.'" description="'.$description_showroom.'"  button_title="'.$button_title.'" link="'.$link.'" alternate="1"]');

$bureau_slug = "rdv-bureau-detudes";
$args = array(
    'post_type'   => 'page',
    'name'        => $bureau_slug,
    'post_status' => 'publish',
    'numberposts' => 1
    );
$query = new WP_Query($args);

if ($query->have_posts()) {
    $query->the_post();
    // Variables
    $info_pratique_bureau = get_field('carte_contact');
    $title_bureau = $info_pratique_bureau['titre'];
    $description_bureau = $info_pratique_bureau['description'];
    $image_bureau = $info_pratique_bureau['image'];
}
$button_title="Prendre-rendez-vous";
$link="/rdv-bureau-detudes";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_bureau.'" title="'.$title_bureau.'" description="'.$description_bureau.'"  button_title="'.$button_title.'" link="'.$link.'" alternate="0"]');

echo do_shortcode('[shortcode-equipe-section]'); 

echo do_shortcode('[shortcode-contact-section]'); 

get_footer();
