<?php

require_once get_template_directory() . '/vendor/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'thrive_starter_register_required_plugins' );

function thrive_starter_register_required_plugins() {

	$plugins = array(
		array(
			'name'             => 'WordPress SEO by Yoast',
			'slug'             => 'wordpress-seo',
			'required'         => true,
			'force_activation' => false,
			'is_callable'      => 'wpseo_init',
		),
		array(
			'name'             => 'WP-PageNavi',
			'slug'             => 'wp-pagenavi',
			'required'         => true,
			'force_activation' => false,
		),
		array(
			'name'             => 'Imagify – Optimize Images & Convert WebP',
			'slug'             => 'imagify',
			'required'         => true,
		),
		array(
			'name'             => 'SecuPress Free — Sécurité WordPress',
			'slug'             => 'secupress',
			'required'         => true,
		),
		array(
			'name'             => 'Elementor Website Builder',
			'slug'             => 'elementor',
			'required'         => true,
		),
		array(
			'name'             => 'Duplicate Page',
			'slug'             => 'duplicate-page',
			'required'         => true,
		),
		array(
			'name'             => 'Easy Google Fonts',
			'slug'             => 'easy-google-fonts',
			'required'         => true,
		),
		array(
			'name'             => 'Redirection',
			'slug'             => 'redirection',
			'required'         => true,
		),
		array(
			'name'             => 'WP Super Cache',
			'slug'             => 'wp-super-cache',
			'required'         => true,
		),
		array(
			'name'             => 'Really Simple SSL',
			'slug'             => 'really-simple-ssl',
			'required'         => true,
		),
		array(
			'name'             => 'Contact Form 7 Database Addon – CFDB7',
			'slug'             => 'contact-form-cfdb7',
			'required'         => true,
		),
		array(
			'name'             => 'Contact form 7',
			'slug'             => 'contact-form-7',
			'required'         => true,
		),
		array(
			'name'             => 'WP Mail SMTP',
			'slug'             => 'wp-mail-smtp',
			'required'         => true,
		),
		array(
			'name'             => 'Loco Translate',
			'slug'             => 'loco-translate',
			'required'         => false,
		),
		array(
			'name'             => 'Custom Post Type UI',
			'slug'             => 'custom-post-type-ui',
			'required'         => false,
		),
		array(
			'name'             => 'ACF Advanced Custom Fields',
			'slug'             => 'advanced-custom-fields',
			'required'         => false,
		),
		array(
			'name'             => 'ElementsKit Lite',
			'slug'             => 'elementskit-lite',
			'required'         => false,
		),
		array(
			'name'             => 'Anywhere Elementor',
			'slug'             => 'anywhere-elementor',
			'required'         => false,
		),
		array(
			'name'             => 'Ultimate Carousel For Elementor',
			'slug'             => 'ultimate-carousel-for-elementor',
			'required'         => false,
		),
		array(
			'name'             => 'a3 Lazy Load',
			'slug'             => 'a3-lazy-load',
			'required'         => false,
		),
		array(
			'name'             => 'All-in-One WP Migration',
			'slug'             => 'all-in-one-wp-migration',
			'required'         => false,
		),
		array(
			'name'             => 'Lingotek Traduction',
			'slug'             => 'lingotek-translation',
			'required'         => false,
		)
	);

	$config = array(
		'id'           => 'thrive_starter',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => 'dismissable',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => 'fin ',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
