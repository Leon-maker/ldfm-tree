<?php
/**
 * Template Name: Template Contact Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21512, 'full')[0];
$title_page = 'Contactez-nous';
$ArianeTitle = "Nos Marques";
$ArianeLink1 = "https://influence-by-m.thrive-production.fr/nos-marques/";

echo do_shortcode('[shortcode-header-section img-bkg="' . $img_bkg . '" title="' . $title_page . '" link1="'. $ArianeLink1 .'" title1="'.$ArianeTitle.'"]'); 

?>

<section class="section-contact little-lateral-margin">
  <div class="left-contact">
    <div class="head">
      <h2 class="uppercase">
        Envoyez nous un message
      </h2>
      <p>
      Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
      sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
      sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. 
      Stet clita kasd gubergren, no sea takimata sanctus.
      </p>
    </div>
  </div>
  <div class="right-contact">
  <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
	
</section>



<?php
get_footer();
?>