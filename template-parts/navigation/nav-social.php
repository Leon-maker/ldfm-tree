<?php ?>			
<nav id="site-navigation-social" class="social-navigation" role="navigation">
    <?php if (!isMobile()) { 
        wp_nav_menu(array('theme_location' => 'burger-end', 'menu_id' => 'menu-social'));
    } else if (isMobile()) { 
        wp_nav_menu(array('theme_location' => 'burger-end', 'menu_id' => 'menu-social')); 
    }?>
</nav><!-- #site-navigation -->