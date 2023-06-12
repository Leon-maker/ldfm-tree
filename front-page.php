<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
	get_header( '', array( 'header-color' => $header_color) ); 
} else {
	get_header();
}

$header_section_slug = 'home-page-header';

$title_page = 'ACCUEIL';
?>

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
      		<a href="thrive_wp/read-me" class="block text-center">README</a>
		</div>
    </div>
</section>

<?php get_footer() ?>

