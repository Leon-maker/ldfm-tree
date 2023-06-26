<?php
/**
 * The template for displaying header.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-principal',
	'fallback_cb' => false,
	'echo' => false,
] ); 

$arguments_array = shortcode_atts( array(
        'filter' => "",
    ), $arguments );

// If the header needs to change a specific color from any template, then get it :
$header_color = $args['header-color']; 
// Else define its main color
if (empty($header_color)) {
    $header_color = 'transparent';
}
?>

<!--<div class="top-header">
	Placez ici votre top header si besoin 
</div>-->

<header id="overlay-header" class="site-header top-reached" role="banner" style="background-color: transparent">

	<div class="wrap">
		<?php //if (!isMobile()) { ?>
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
					<p class="site-description">
						<?php
						if ( $tagline ) {
							echo esc_html( $tagline );
						}
						?>
					</p>
				<?php } ?>
			</div>
			<?php get_template_part( 'template-parts/navigation/nav'); ?>
	</div>
	<?php
		get_template_part(
			'template-parts/mobile/burger',
			null,
			array(
				'header-color' => $args['header-color'],
				'header-id'    => 'overlay'
			)
		); 
	?>
	
</header>

<?php
$image_url_black = wp_get_attachment_image_src(21399, 'full')[0];
$image_url_white = wp_get_attachment_image_src(21398, 'full')[0];
?>

<script>
var tempScrollTop = 0;

jQuery(window).scroll(example);
function example() {
    tempScrollTop = jQuery(window).scrollTop();
}

var classPagesRecherche = ["page-template-legals", "single-produit"]; // Remplacez les classes de pages par celles que vous souhaitez cibler

if (classPagesRecherche.some(className => document.activeElement.classList.contains(className))) {
    const elements = document.querySelectorAll('header .custom-logo');
    const imageUrl = "<?php echo $image_url_black; ?>";
    jQuery(".site-header").removeClass("top-reached"); // Utilisation de jQuery pour supprimer la classe
    elements.forEach(element => {
        element.src = imageUrl;
    });
} else {
    jQuery(".site-header").mouseenter(function () {
        const elements = document.querySelectorAll('header .custom-logo');
        const imageUrl = "<?php echo $image_url_black; ?>";
        jQuery(".site-header").removeClass("top-reached"); // Utilisation de jQuery pour supprimer la classe
        elements.forEach(element => {
            element.src = imageUrl;
        });
    });

    jQuery(".site-header").mouseleave(function () {
        const elements = document.querySelectorAll('header .custom-logo');
        if (tempScrollTop == 0) {
            const imageUrl = "<?php echo $image_url_white; ?>";
            jQuery(".site-header").addClass("top-reached"); // Utilisation de jQuery pour ajouter la classe
            elements.forEach(element => {
                element.src = imageUrl;
            });
        } else {
            const imageUrl = "<?php echo $image_url_black; ?>";
            elements.forEach(element => {
                element.src = imageUrl;
            });
        }
    });

    jQuery(window).scroll(function () {
        var st = jQuery(window).scrollTop();
        if (st == 0) {
            jQuery(".site-header").addClass("top-reached");
            const imageUrl = "<?php echo $image_url_white; ?>";
            const elements = document.querySelectorAll('header .custom-logo');
            elements.forEach(element => {
                element.src = imageUrl;
            });
        } else {
            jQuery(".site-header").removeClass("top-reached");
            const imageUrl = "<?php echo $image_url_black; ?>";
            const elements = document.querySelectorAll('header .custom-logo');
            elements.forEach(element => {
                element.src = imageUrl;
            });
        }
    });
}
</script>
