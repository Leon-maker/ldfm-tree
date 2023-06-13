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
