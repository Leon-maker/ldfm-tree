<?php
/**
 * The template for displaying footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>


<footer id="site-footer" class="site-footer bkg-green" role="contentinfo">
	<div class="wrap">
		<!-- FOOTER CUSTOM -->

		<div class="left-content">
			<section class="nav">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} elseif ( $site_name ) { ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'thrive-custom-theme' ); ?>" rel="home">
								<?php echo esc_html( $site_name ); ?>
							</a>
						</h1>
					<?php } ?>
				</div>

				<div class="site-navigation">
					<?php if ( (has_nav_menu( 'bottom' ))) : ?>
						<div class="navigation navigation-two footer-navigation">
							<div class="wrap">
								<nav id="site-navigation-two" class="secondary-navigation" role="navigation">
									<?php wp_nav_menu(array('theme_location' => 'bottom', 'menu_id' => 'menu-two' , 'link_class' => 'default-link-hover')); ?>
								</nav>
							</div>
						</div>
					<?php endif; ?>
				</div>
					<?php if ( (has_nav_menu( 'bottom-end' ))) : ?>
						<div class="footer-navigation ">
							<div class="wrap-legal">
								<nav id="site-navigation-two" class="secondary-navigation" role="navigation">
									<?php wp_nav_menu(array('theme_location' => 'bottom-end', 'menu_id' => 'menu-two' , 'link_class' => 'default-link-hover')); ?>
								</nav>
								<p>@influencesbym2023</p>
							</div>
						</div>
					<?php endif; ?>

			</section>

		</div>

	</div>
    
</footer>

<?php
$influence_categories = get_terms(array(
  'taxonomy' => 'influence-categorie',
  'hide_empty' => false,
));
$args = array(
    'post_type' => 'realisation',
    'orderby' => 'date',
    'order' => 'DESC'
);
$argsPrestation = array(
    'post_type' => 'prestation',
    'orderby' => 'date',
    'order' => 'DESC'
);
$realisationslink = get_posts($args); // Récupérer les réalisations avec les arguments $args
$realisations_links = array();

foreach ($realisationslink as $realisation) {
    $realisations_links[] = get_permalink($realisation->ID); // Obtenir le lien de chaque réalisation et l'ajouter au tableau
}
$realisations_links_json = json_encode($realisations_links); // Convertir le tableau en JSON

// Convertir les données en JSON
$categories_json = json_encode($influence_categories);
?>
<script>
	var realisations_links = <?= $realisations_links_json ?>;
  function createMenuItems(title, elements) {
    var parentElement = null;

    // Recherche de l'élément correspondant dans le footer
    var footerElements = document.getElementsByTagName('footer');
    var footerElement = footerElements[0]; // Supposons que le footer est le premier élément <footer> de la page

    if (footerElement) {
      var elementsA = footerElement.getElementsByTagName('a');
      for (var i = 0; i < elementsA.length; i++) {
        if (elementsA[i].textContent === title) {
          var elementHref = elementsA[i]["href"];
          parentElement = elementsA[i].parentNode;
          break;
        }
      }
    }

    if (parentElement) {
      var ulElement = document.createElement('ul');
      ulElement.setAttribute('class', 'sub-menu panel');
      parentElement.appendChild(ulElement);

      for (var i = 0; i < elements.length; i++) {
        if (i >= 4) {
          // Ajouter un bouton "Voir plus" si plus de 4 éléments
          var liElementExtra = document.createElement('li');
          liElementExtra.setAttribute('class', 'menu-item menu-item-type-custom menu-item-object-custom');
          var aElementExtra = document.createElement('a');
          aElementExtra.setAttribute('href', '#');
          aElementExtra.setAttribute('class', 'default-link-hover');
          aElementExtra.textContent = 'Voir tout';
          aElementExtra.setAttribute('href', elementHref);
          liElementExtra.appendChild(aElementExtra);
          ulElement.appendChild(liElementExtra);
          break;
        }
        var element = elements[i];

        var liElement = document.createElement('li');
        liElement.setAttribute('class', 'menu-item menu-item-type-custom menu-item-object-custom');
        var aElement = document.createElement('a');
        aElement.setAttribute('class', 'default-link-hover');

        if (title === 'Nos influences') {
          aElement.textContent = element['name'];
          aElement.setAttribute('href', elementHref + '?filter='+element['slug']); // Utiliser le lien de réalisation correspondant à l'index i
          //<a href="lien_de_votre_page_influence?filter=nom_de_la_categorie">Nom de la catégorie</a>
        } else {
          aElement.textContent = element.post_title;
          
          if (title === 'Réalisations') {
            aElement.setAttribute('href', realisations_links[i]); // Utiliser le lien de réalisation correspondant à l'index i
          }
          if (title === 'Prestations') {
            aElement.setAttribute('href', elementHref + '/#'+element['post_name']); // Utiliser le lien de réalisation correspondant à l'index i
          }
        }
        liElement.appendChild(aElement);
        ulElement.appendChild(liElement);
      }
    }
  }

  var categories = <?= $categories_json ?>;
var realisations = <?php echo json_encode(get_posts($args)); ?>;
var prestations = <?php echo json_encode(get_posts($argsPrestation)); ?>;

// Ajouter la propriété "link" à chaque élément "realisation" du tableau "realisations"
realisations.forEach(function(realisation) {
    realisation.link = '<?php echo get_permalink("' + realisation.ID + '"); ?>';
});

createMenuItems('Nos influences', categories);
createMenuItems('Réalisations', realisations);
createMenuItems('Prestations', prestations);
</script>

