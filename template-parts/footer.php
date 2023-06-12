<?php
/**
 * The template for displaying footer.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
} ?>
<section class="no-margin-bottom bkg-green instagram-feed">
	<p> au besoin rajouter l'instagram feed au footer ici</p>
	<?php //echo do_shortcode('[instagram-feed feed=1]'); ?>
</section>

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

				<?php get_template_part( 'template-parts/navigation/nav'); ?>
			</section>

		</div>

		<div class="right-content">

			<div class="formulaire newsletter">
				<p>
					<span class="seo-span">RESTE INFORMÉ !</span>
				</p>
				<p>Retrouve toutes nos nouveautés et nos actualités en t'inscrivant à notre newsletter !</p>
				<?php echo do_shortcode('[gravityform id="2"]'); ?>
			</div>

			<div class="contact-menu bkg-green">
				<ul>
					<li>
						<a href="/contact">
						<p>
							<span class="seo-span">NOUS CONTACTER</span>
						</p>
						</a>
					</li>
					<li>
						<a href="tel:0611182430">06 07 08 09 10</a>
					</li>
					<li>
						<a href="mailto:hello@thrive.fr">hello@thrive.fr</a>
					</li>
				</ul>
			</div>

			<?php if ( has_nav_menu( 'bottomn' ) ) : ?>
				<div class="social-media-menu bkg-green">
					<div class="wrap">
						<?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
					</div><!-- .wrap -->
				</div><!-- .navigation-social -->
			<?php endif; ?>

			<?php if ( has_nav_menu( 'bottom-end' ) ) : ?>
				<div class="legals-menu">
					<div class="wrap">
						<?php get_template_part( 'template-parts/navigation/nav', 'legals' ); ?>
					</div><!-- .wrap -->
				</div><!-- .navigation-legals -->
			<?php endif; ?>
		</div>

	</div>
    
</footer>
