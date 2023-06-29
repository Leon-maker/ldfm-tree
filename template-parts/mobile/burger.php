<?php
$header_color = $args['header-color'];
$header_id    = $args['header-id'];
?>

<div class="wrap burger">

    <div id="burger-menu<?php echo '-' . $header_id; ?>" class="burger-menu">
        <div class="burger-menu-wrapper">
            <div class="principal-menu-burger">
                <?php get_template_part( 'template-parts/navigation/nav'); ?>
            </div>
            <?php if ( has_nav_menu( 'burger-end' ) ) : ?>
                <div class="social-media-menu">
                    <div class="wrap">
                        <?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
                    </div><!-- .wrap -->
                </div><!-- .navigation-social -->
            <?php endif; ?>
        </div>
    </div>

    <div class="burger-header">
        <div class="logo">
            <div class="wrap">
                <?php the_custom_logo(); ?>
            </div>
        </div>
        <div class="close">
            <div class="close-button-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 23 23">
                    <g id="Groupe_17577" data-name="Groupe 17577" transform="translate(-1357.826 -96.141)">
                        <line id="Ligne_316" data-name="Ligne 316" x2="18" y2="18" transform="translate(1358.533 96.848)" fill="none" stroke="#1c1c1c" stroke-width="2"/>
                        <line id="Ligne_317" data-name="Ligne 317" x1="18" y2="18" transform="translate(1358.533 96.848)" fill="none" stroke="#1c1c1c" stroke-width="2"/>
                    </g>
                </svg>
            </div>
        </div>
        <div class="menu">
            <span class="long-line"></span>
            <span class="short-line"></span>
            <span class="long-line"></span>
        </div>
    </div>
</div>
<?php
$image_url_black = wp_get_attachment_image_src(21399, 'full')[0];
$image_url_white = wp_get_attachment_image_src(21398, 'full')[0];
?>
<script>
     jQuery(document).ready(function($) {
        $('.menu').click(function() {
            const logoElement = $('.logo');
            const header = $('.burger');
            const imageUrl = "<?php echo $image_url_black; ?>";
            const logoImage = logoElement.find('.custom-logo');
            logoImage.attr('src', imageUrl);
            header.addClass('menu-clicked'); // Ajouter la classe "menu-clicked" à l'élément "head"

        });
        $('.close').click(function() {
            const logoElement = $('.logo');
            const head = $('.site-header');
            const header = $('.burger');
            if (head.hasClass('top-reached')) {
                const imageUrl = "<?php echo $image_url_white; ?>";
                const logoImage = logoElement.find('.custom-logo');
                logoImage.attr('src', imageUrl);
            } 
            header.removeClass('menu-clicked'); // Ajouter la classe "menu-clicked" à l'élément "head"
        });
    });
</script>
