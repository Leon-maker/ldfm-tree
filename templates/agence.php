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
            <p class="agence-side-description"><?php echo $description1 ?><p>
        </div>
        <div class="agence-side-description-container">
        <p class="agence-side-description"><?php echo $description2 ?><p>
        </div>
    </div>
</div>



<?php
$image_id = 21547;
$title = "NOTRE SHOWROOM";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
$button_title="Prendre-rendez-vous";
$link="";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'"  button_title="'.$button_title.'" link="'.$link.'" alternate="1"]');

$image_id = 21538;
$title = "LE BUREAU D’ÉTUDES";
$description = "Lorem ipsum dolor sit amet, 
consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. 
At vero eos et accusam et justo duo dolores et ea rebum. duo dolores et ea rebum. 
Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.";
$button_title="Prendre-rendez-vous";
$link="";

echo do_shortcode('[shortcode-description-contact image_id="'.$image_id.'" title="'.$title.'" description="'.$description.'"  button_title="'.$button_title.'" link="'.$link.'" alternate="0"]');


echo do_shortcode('[shortcode-equipe-section]'); 

echo do_shortcode('[shortcode-contact-section]'); 


get_footer();
?>