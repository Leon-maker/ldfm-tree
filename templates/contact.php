<?php
/**
 * Template Name: Template Contact Page
 */
$title_page = get_the_title(); ?> 

<?php 
$img_bkg = wp_get_attachment_image_src(21512, 'full')[0];
$title_page = 'Contactez-nous';
$ArianeTitle = "Contact";
$ArianeLink1 = "https://influence-by-m.thrive-production.fr/contact/";

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
    <div class="informations-pratiques full-width">
      <h3>
        Coordonnées
      </h3>
      <ul class="infos-container list-in-rows-border">
        <li class="infos">
          <p class="label">
            Adresse
          </p>
          <p class="value boldy">
            24 avenue Jean Perrin 33700 Mérignac
          </p>
        </li>
        <li class="infos">
          <p class="label">
            Nous contacter
          </p>
          <p class="value boldy">
            06 80 76 69 27
          </p>
        </li>
        <li class="infos">
          <p class="label">
            Horaires d’ouverture
          </p>
          <p class="value boldy">
            Du lundi au dimanche : 10h00 - 13h00, 14h00 - 19h00
          </p>
        </li>
      </ul>
      <h3>
        Accès
      </h3>
      <ul class="infos-container list-in-rows-border">
        <li class="infos">
          <p class="label">
            Voiture
          </p>
          <p class="value boldy">
            Sortie 10 Rocade, remonter l’avenue Jean Perrin 
            direction Chemin Long
          </p>
        </li>
        <li class="infos">
          <p class="label">
            Bus
          </p>
          <p class="value boldy">
            Bas ligne 1 lianes, direction Mérignac 
            Aéroport, arrêt Kennedy
          </p>
        </li>
        <li class="infos">
          <p class="label">
            Tramway
          </p>
          <p class="value boldy">
            Prochainement
          </p>
        </li>
      </ul>
  </div>
  </div>
  <div class="right-contact bkg-grey ">
  <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
  </div>
</section>

<div class="localisation full-width">
  <h2>
      Localisation
  </h2>
  <div class="localisation-map-container">
      <div class="localisation-map borders" id="localisation-map" data-lat="<?php echo $gmap_adresse_depart['lat']; ?>" data-lng="<?php echo $gmap_adresse_depart['lng']; ?>"></div>
  </div>
</div>

<script>
    // Fonction pour cocher ou décocher la case à cocher
    function toggleCheckbox() {
        var checkbox = document.getElementById('input_1_52_1');
        var container = document.querySelector('.ginput_container_consent');
        
        if (checkbox && container) {
            checkbox.checked = !checkbox.checked;
            
            if (checkbox.checked) {
                container.classList.add('active');
            } else {
                container.classList.remove('active');
            }
        }
    }

    // Ajout d'un gestionnaire d'événement sur l'élément HTML
    var element = document.querySelector('.ginput_container_consent');
    if (element) {
        element.addEventListener('click', toggleCheckbox);
    }
</script>




<?php
get_footer();
?>