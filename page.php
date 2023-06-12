<?php
get_header();

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

<?php

the_content();

get_footer();
?>
