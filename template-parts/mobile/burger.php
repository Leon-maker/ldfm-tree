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
            <div class="secondary-menu-burger">
                <ul>
                    <li>
                        <h3>COORDONNÉES</h3>
                    </li>
                    <li>
                        <a href="tel:0611182430">06 07 08 09 10</a>
                    </li>
                    <li>
                        <a href="mailto:hello@escapethecity.fr">wordpress@agencethrive.fr</a>
                    </li>
                </ul>
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

    <div class="burger-header" style="background-color: <?php //echo $header_color; ?>">
        <div class="logo">
            <div class="wrap">
                <?php the_custom_logo(); ?>
            </div>
        </div>
        <div class="close">
            <div class="close-button-box">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23">
                    <g id="Groupe_17577" data-name="Groupe 17577" transform="translate(-1357.826 -96.141)">
                        <line id="Ligne_316" data-name="Ligne 316" x2="18" y2="18" transform="translate(1358.533 96.848)" fill="none" stroke="#1c1c1c" stroke-width="3"/>
                        <line id="Ligne_317" data-name="Ligne 317" x1="18" y2="18" transform="translate(1358.533 96.848)" fill="none" stroke="#1c1c1c" stroke-width="3"/>
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

<style>
    /*.header.open {
        background-color: <?php //echo $header_color; ?>;
    }*/
</style>
