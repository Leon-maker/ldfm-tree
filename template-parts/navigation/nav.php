
<div class="site-navigation">
    <?php if ( (has_nav_menu( 'top-left' )) || (has_nav_menu( 'bottom-left-start' )) || (has_nav_menu( 'mobile-burger-start' )) ) : ?>
        <div class="navigation navigation-one">
            <div class="wrap">
                <?php get_template_part( 'template-parts/navigation/nav', 'one' ); ?>
            </div><!-- .wrap -->
        </div><!-- .navigation-one -->
    <?php endif; ?>

    <?php if ( (has_nav_menu( 'top-right' )) || (has_nav_menu( 'bottom-left-end' )) || (has_nav_menu( 'mobile-burger-middle' )) ) : ?>
        <div class="navigation navigation-two">
            <div class="wrap">
                <?php get_template_part( 'template-parts/navigation/nav', 'two' ); ?>
            </div><!-- .wrap -->
        </div><!-- .navigation-two -->
    <?php endif; ?>
</div>