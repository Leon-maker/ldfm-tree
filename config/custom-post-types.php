<?php
/** ========== CUSTOM POSTS TYPES ========== **/
// CPT EXAMPLE, REMPLACER <NOM DU CPT> PAR LE NOM DU CPT
//function thrive_register_post_types_<NOMDUCPT>() {
//
//    $labels = array(
//        'name' => '<NOM DU CPT>',
//        'all_items' => 'Toutes les <NOM DES CPTs>',
//        'singular_name' => '<NOM DU CPT>',
//        'add_new_item' => 'Ajouter une <NOM DU CPT>',
//        'add_new' => 'Ajouter une <NOM DU CPT>',
//        'edit_item' => 'Modifier la <NOM DU CPT>',
//        'menu_name' => '<NOM DES CPTs>'
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'show_in_rest' => true,
//        'has_archive' => true,
//        'supports' => array('title', 'custom-fields'),
//        'menu_position' => 5,
//        'menu_icon' => 'dashicons-admin-customizer',
//        'show_in_menu' => true
//    );
//    register_post_type('<NOM DU CPT>', $args);
//
//}
//add_action( 'init', 'thrive_register_post_types_<NOM DU CPT>' );


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
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
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
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
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
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
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
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
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
        'menu_position' => 5,
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
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'show_in_menu' => true
    );
    register_post_type('equipe', $args);

}
add_action( 'init', 'thrive_register_post_types_EQUIPE' );