<?php
/**
 * Template Name: Template Pages légales
 */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
    get_header( '', array( 'header-color' => $header_color) ); 
} else {
    get_header();
}
?>

<section class="bkg-wrapper breadcrumb-container bkg-white">
    <?php echo do_shortcode('[shortcode-fil-ariane type="black"]'); ?>
</section>

<section class="legal-section lateral-margin">
    <div class="columns-wrapper bkg-white">
        <?php the_content(); ?>
    </div>
</section>

<?php
get_footer();
?>