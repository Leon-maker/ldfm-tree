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
	<style>
	header .sub-menu {
		background-color: <?php echo $header_color; ?>
	}
	</style>

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
	jQuery(window).scroll(example);
        function example() {
			var tempScrollTop = jQuery(window).scrollTop();
			const elements = document.querySelectorAll('header .wrap .custom-logo');

            if (tempScrollTop == 0) {
				const imageUrl = "<?php echo $image_url_white; ?>";
				elements.forEach(element => {
					element.src = imageUrl;
				});
                	
            } else {
                const imageUrl = "<?php echo $image_url_black; ?>";
				elements.forEach(element => {
					element.src = imageUrl;
				});
            }
        };
</script>