<?php
function SHORTCODE_contact($atts)
{
    // Récupérer les valeurs des attributs
    $atts = shortcode_atts(array(
        'id_form' => 1,
        'subtitle' => "Envoyez nous un message",
    ), $atts);

    // Extraire les valeurs des attributs en variables distinctes
    $id_form = $atts['id_form'];
    $subtitle = $atts['subtitle'];

    // Récupérer les autres valeurs nécessaires
    $description = get_the_excerpt();
    $info_pratiques = get_field('informations_pratiques');
    $coordonees = $info_pratiques['coordonnees'];
    $telephone = $coordonees['telephone'];
    $horaire_douverture = $coordonees['horaire_douverture'];
    $acces = $info_pratiques['acces'];
    $voiture = $acces['voiture'];
    $bus = $acces['bus'];
    $tramway = $acces['tramway'];
    $gmap_adresse_depart = get_field('gmap_adresse_depart');

    ob_start();
    ?>
    <section class="section-contact little-lateral-margin">
      <div class="left-contact">
        <div class="head">
          <h2 class="uppercase">
            <?php echo $subtitle; ?>
          </h2>
          <p>
            <?php echo $description; ?>
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
                <?php echo $telephone; ?>
              </p>
            </li>
            <li class="infos">
              <p class="label">
                Horaires d’ouverture
              </p>
              <p class="value boldy">
                <?php 
                foreach ($horaire_douverture as $horaires) {
                  foreach ($horaires as $horaire) {
                    echo $horaire;
                    ?></br><?php
                  }
                }
                ?>
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
                <?php echo $voiture; ?>
              </p>
            </li>
            <li class="infos">
              <p class="label">
                Bus
              </p>
              <p class="value boldy">
                <?php echo $bus; ?>
              </p>
            </li>
            <li class="infos">
              <p class="label">
                Tramway
              </p>
              <p class="value boldy">
                <?php echo $tramway; ?>
              </p>
            </li>
          </ul>
      </div>
      </div>
      <div class="right-contact bkg-grey ">
        <?php echo do_shortcode('[gravityform id="'.$id_form.'" title="false"]'); ?>
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

    return ob_get_clean();
}

add_shortcode('shortcode-contact', 'SHORTCODE_contact');

