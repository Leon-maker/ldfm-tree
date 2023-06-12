<?php 
/**
 * Template Name: Template Démo Sections
 */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
    get_header( '', array( 'header-color' => $header_color) ); 
} else {
    get_header();
}

$header_section_slug = 'home-page-header';
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
    $slider = get_field('slider');
    $slide_repeater = $slider['slide'];
}

$title_page = get_the_title(); ?> 

<section class="section-single nom-de-la-section bkg-white">
	<?php
	if(!isMobile()){ ?>
		<div class="section-title">
			<h1 class="text-center"><?php echo $title_page; ?></h1>
		</div>
	<?php } ?>

    <div class="columns-wrapper">
        <?php if(isMobile()){ ?>
			<div class="section-title">
				<h1><?php echo $title_page; ?></h1>
			</div>
		<?php } ?>

        <div class="left-container">
		</div>
    </div>
</section>

<section class="section-half section-demo bkg-blue">
	<?php if(!isMobile()){ ?>
		<div class="section-title text-center">
			<h2>SECTION 2 COLONNES<?php echo $title; ?></h2>
		</div>
	<?php } ?>
    <div class="columns-wrapper bkg-wrapper">
        <?php if(isMobile()){ ?>
			<div class="section-title text-center ">
				<h2>TITRE DE LA SECTION<?php echo $title; ?></h2>
			</div>
		<?php } ?>
        <div class="left-container">
      		<h3>Container de gauche</h3>
		</div>
        <div class="right-container">
      		<h3>Container de droite</h3>
		</div>
    </div>
</section>


<?php get_footer() ?>

