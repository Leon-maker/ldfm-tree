<?php
/**
 * The template for displaying header.
 */ 
?>

<header id="overlay-header" class="site-headerr bkg-color-beige" role="banner">
    <div class="site-branding">
        <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        }?>
    </div>
    <?php
    $menu_id = 22; 

    wp_nav_menu(array(
        'menu' => $menu_id,
    ));
    ?>
</header>


