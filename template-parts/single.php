<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main' ); ?> role="main">
	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">

		<?php if ( is_single() ) { 
			if (has_post_thumbnail()) {
				$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full');
				$thumbnail_url = $thumbnail_data[0]; ?>
			<?php } ?>
			<div class="header container-block" style="max-width: 100%">
				<div class="swiper-container images-slider" id="home-page-swiper">
					<input class="thumbnail-tab" type="radio" name="tabs-state" id="slide-one">
					<input class="thumbnail-tab" type="radio" name="tabs-state" id="slide-two">
					<div class="swiper-wrapper boxGroup image-holder">
						<div class="swiper-slide image-content-slide" id="slide-one-image" style="background-image:url('<?php echo $thumbnail_url ?>')" <?php post_class('container-fluid'); ?> >
							<div>
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>

		</header>
	<?php endif; ?>
	<div class="page-content">
		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

	<?php
	/**
	* --------------------------------------------------------------------------------------------------------------
	*                                                  SOCIAL SHARE BUTTONS
	* --------------------------------------------------------------------------------------------------------------
	*/
	/**/
	?>

	<section class="section-social-share">

		<?php $CurPageURL = urlencode( get_permalink() ); ?>

		<p>PARTAGER L'ARTICLE</p>
		<div class="social-share-grid">
		
			<!-- Facebook -->
			<a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $CurPageURL; ?>" target="_blank">
				<span class="share-btn-icon"><i class="fab fa-facebook" aria-hidden="true"></i></span>
				<span class="share-btn-text">FaceBook</span>
			</a>

			<!-- Twitter -->
			<a class="twitter" href="http://twitter.com/share?url=<?php echo $CurPageURL; ?>&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank">
				<span class="share-btn-icon"><i class="fab fa-twitter" aria-hidden="true"></i></span>
				<span class="share-btn-text">Twitter</span>
			</a>

			<!-- LinkedIn -->
			<a class="linkedIn" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $CurPageURL; ?>" target="_blank">
				<span class="share-btn-icon"><i class="fab fa-linkedin" aria-hidden="true"></i></span>
				<span class="share-btn-text">LinkedIn</span>
			</a>

			<!-- Email -->
			<!--<a class="Email" href="mailto:?Subject=Simple Share Buttons&Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php //echo $CurPageURL; ?>">Email</a>-->

		</div>

	</section>

	<?php
	/**
	* --------------------------------------------------------------------------------------------------------------
	*                                                  NOS DERNIÈRES ACTUALITÉS
	* --------------------------------------------------------------------------------------------------------------
	*/
	/**/
	echo do_shortcode('[thriveHPSection2]'); ?>

	<?php // comments_template(); ?>

</main>

	<?php
endwhile;
