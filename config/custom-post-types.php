<?php

function thrive_register_post_types_MARQUE() {

    $labels = array(
        'name' => 'Marque',
        'all_items' => 'Toutes les marques',
        'singular_name' => 'marque',
        'add_new_item' => 'Ajouter une marque',
        'add_new' => 'Ajouter une marque',
        'edit_item' => 'Modifier la marque',
        'menu_name' => 'Marques'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 35,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'show_in_menu' => true
    );
    register_post_type('marque', $args);

}
add_action( 'init', 'thrive_register_post_types_MARQUE' );



function thrive_register_post_types_INFLUENCE() {

    $labels = array(
        'name' => 'Influence',
        'all_items' => 'Toutes les influences',
        'singular_name' => 'influence',
        'add_new_item' => 'Ajouter une influence',
        'add_new' => 'Ajouter une influence',
        'edit_item' => 'Modifier l\'influence',
        'menu_name' => 'Influences'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 34,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'show_in_menu' => true
    );
    register_post_type('influence', $args);

}
add_action( 'init', 'thrive_register_post_types_INFLUENCE' );




function thrive_register_post_types_REALISATION() {

    $labels = array(
        'name' => 'Realisation',
        'all_items' => 'Toutes les réalisations',
        'singular_name' => 'realisation',
        'add_new_item' => 'Ajouter une réalisation',
        'add_new' => 'Ajouter une réalisation',
        'edit_item' => 'Modifier la réalisation',
        'menu_name' => 'Réalisations'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 33,
        'menu_icon' => 'dashicons-hammer',
        'show_in_menu' => true
    );
    register_post_type('realisation', $args);

}
add_action( 'init', 'thrive_register_post_types_REALISATION' );

function thrive_register_post_types_PRODUIT() {

    $labels = array(
        'name' => 'Produit',
        'all_items' => 'Tous les produits',
        'singular_name' => 'produit',
        'add_new_item' => 'Ajouter un produit',
        'add_new' => 'Ajouter un produit',
        'edit_item' => 'Modifier le produit',
        'menu_name' => 'Produits'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 32,
        'menu_icon' => 'dashicons-archive',
        'show_in_menu' => true,
        'taxonomies' => array('category') // Ajout de cette ligne pour les catégories
    );

    register_post_type('produit', $args);
}
add_action( 'init', 'thrive_register_post_types_PRODUIT' );


// CPT des prestations du site
function thrive_register_post_types_Prestations() {

    $labels = array(
        'name' => 'Prestation',
        'all_items' => 'Toutes les prestations',
        'singular_name' => 'Prestation',
        'add_new_item' => 'Ajouter une prestation',
        'add_new' => 'Ajouter une prestation',
        'edit_item' => 'Modifier une prestation',
        'menu_name' => 'Prestations',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 31,
        'menu_icon' => 'dashicons-admin-customizer',
        'show_in_menu' => true
    );
    register_post_type('prestation', $args);

}
add_action( 'init', 'thrive_register_post_types_Prestations' );

function thrive_register_post_types_EQUIPE() {

    $labels = array(
        'name' => 'Equipe',
        'all_items' => 'Toutes les équipes',
        'singular_name' => 'equipe',
        'add_new_item' => 'Ajouter une equipe',
        'add_new' => 'Ajouter une equipe',
        'edit_item' => 'Modifier l\'equipe',
        'menu_name' => 'Equipe'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 30,
        'menu_icon' => 'dashicons-groups',
        'show_in_menu' => true
    );
    register_post_type('equipe', $args);

}
add_action( 'init', 'thrive_register_post_types_EQUIPE' );