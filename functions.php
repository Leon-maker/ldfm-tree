<?php


// Installation des extensions
//require_once get_template_directory() . '/App/plugins_require.php';

// Configuration du thème
require_once get_template_directory() . '/config/config.php';

// Installation modules Javascript
require_once get_template_directory() . '/config/javascript-modules-manager.php';

// Custom posts
require_once get_template_directory() . '/config/custom-post-types.php';

// Shortcode component manager
require_once get_template_directory() . '/config/shortcode-manager.php';
